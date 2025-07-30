<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Order;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class OrderController extends Controller
{
    public function __construct()
    {
        // Setup Midtrans
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function show($slug)
    {
        $game = Game::where('slug', $slug)
            ->with(['products' => function($query) {
                $query->orderBy('price', 'asc');
            }, 'servers'])
            ->firstOrFail();
            
        $paymentGroups = [
            [
                'name' => 'E-Wallet',
                'icon' => 'fas fa-wallet',
                'methods' => [
                    ['id' => 'gopay', 'name' => 'Gopay', 'code' => 'gopay', 'image' => 'gopay.png'],
                    ['id' => 'shopeepay', 'name' => 'ShopeePay', 'code' => 'shopeepay', 'image' => 'shopeepay.png'],
                ]
            ],
            [
                'name' => 'Bank Transfer',
                'icon' => 'fas fa-university',
                'methods' => [
                    ['id' => 'bca_va', 'name' => 'BCA VA', 'code' => 'bca_va', 'image' => 'bca.png'],
                    ['id' => 'bni_va', 'name' => 'BNI VA', 'code' => 'bni_va', 'image' => 'bni.png'],
                ]
            ]
        ];
        
        return view('order', compact('game', 'paymentGroups'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'server_id' => 'required',
            'player_id' => 'required',
            'variant_id' => 'required',
            'payment_id' => 'required',
            'phone' => 'required',
        ]);

        try {
            // Simpan order ke database
            $order = Order::create([
                'user_id' => auth()->id(),
                'game_id' => $request->product_id,
                'server_id' => $request->server_id,
                'variant_id' => $request->variant_id,
                'payment_method' => $request->payment_id,
                'phone' => $request->phone,
                'status' => 'pending',
                'total_amount' => $request->amount
            ]);

            // Generate Snap Token
            $params = [
                'transaction_details' => [
                    'order_id' => 'ORDER-' . $order->id . '-' . uniqid(),
                    'gross_amount' => $order->total_amount,
                ],
                'customer_details' => [
                    'first_name' => auth()->user()->name,
                    'email' => auth()->user()->email,
                    'phone' => $request->phone,
                ],
                'enabled_payments' => [$request->payment_id],
            ];

            $snapToken = Snap::getSnapToken($params);
            return view('payment.checkout', compact('snapToken', 'order'));

        } catch (\Exception $e) {
            \Log::error('Midtrans Error: ' . $e->getMessage()); // Log error
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Pembayaran gagal: ' . $e->getMessage()); // Tampilkan pesan ke user
        }
    }

    // Untuk handle notifikasi dari Midtrans
    public function handleNotification(Request $request)
    {
        try {
            $notif = new \Midtrans\Notification();
            $payload = $notif->getResponse(); // Validasi signature

            if (!$payload) {
                \Log::error('Invalid Midtrans notification: Signature mismatch');
                return response()->json(['status' => 'error', 'message' => 'Invalid signature'], 400);
            }

            $orderId = explode('-', $payload->order_id)[1]; // Ambil ID order (contoh: ORDER-123-xxx)
            $order = Order::find($orderId);

            if (!$order) {
                \Log::error('Order not found: ' . $payload->order_id);
                return response()->json(['status' => 'error', 'message' => 'Order not found'], 404);
            }

            // Update status order
            if ($payload->transaction_status == 'settlement') {
                $order->update(['status' => 'paid']);
            } elseif (in_array($payload->transaction_status, ['pending', 'expire'])) {
                $order->update(['status' => $payload->transaction_status]);
            }

            return response()->json(['status' => 'success']);

        } catch (\Exception $e) {
            \Log::error('Notification Error: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Internal server error'], 500);
        }
    }
}