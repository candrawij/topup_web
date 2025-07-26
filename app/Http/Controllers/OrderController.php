<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function process(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'player_id' => 'required',
            'zone_id' => 'nullable',
            'payment_method' => 'required|in:gopay,ovo,dana,bank_transfer'
        ]);
        
        // Proses order disini
        // Simpan ke database, dll
        
        return redirect()->route('order.success')->with('order_id', $orderId);
    }
}
