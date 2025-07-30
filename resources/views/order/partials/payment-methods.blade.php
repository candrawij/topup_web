<div class="row mt-3">
    <div class="col">
        <div class="card shadow mb-3 border-0" style="background-color: #343a40;">
            <div class="card-header bg-dark">
                <h5 class="card-title text-light">Pilih Metode Pembayaran</h5>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                <b>TIPS!</b> Buat akun dan bayar pakai saldo agar lebih murah karena tidak terkena biaya transaksi payment gateway
                </div>
            <div class="area-list-payment-method">

            @include('order.partials.payment-method-group', [
                'title' => 'E-Wallet',
                'icon' => 'fas fa-wallet',
                'methods' => [
                    ['id' => 4, 'name' => 'OVO', 'image' => asset('images/payment/ovo.png')],
                    ['id' => 16, 'name' => 'DANA', 'image' => asset('images/payment/dana.png')],
                    ['id' => 17, 'name' => 'ShopeePay', 'image' => asset('images/payment/spay.png')]
                ],
                'active' => true
            ])
            
            @include('order.partials.payment-method-group', [
                'title' => 'QRIS',
                'icon' => 'fas fa-qrcode',
                'methods' => [
                    ['id' => 3, 'name' => 'QRIS', 'image' => asset('images/payment/qris.jpg')]
                ]
            ])
        </div>
    </div>
</div>

@push('styles')
    <link href="{{ asset('css/payment.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

@includeIf('order.partials.payment-script')