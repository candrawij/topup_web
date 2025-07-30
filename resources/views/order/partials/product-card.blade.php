<div class="card shadow mb-3 border-0" style="background-color: #343a40;">
    <div class="card-body p-3">
        <div class="text-center mb-2">
            <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded" style="max-height: 150px;">
        </div>
        <h4 class="text-center text-white mb-2">{{ $product->name }}</h4>
        <div class="text-center mb-3">
            <span class="badge bg-warning text-dark">INSTANT PROCESS</span>
        </div>
        
        <div class="bg-dark p-2 rounded mb-3">
            <h6 class="text-white font-weight-bold mb-2">Cara Order:</h6>
            <ol class="text-white pl-3 mb-0" style="font-size: 14px;">
                <li>Masukkan Game ID dan Role ID</li>
                <li>Pilih Nominal</li>
                <li>Pilih Metode Pembayaran</li>
                <li>Isi Nomor WhatsApp</li>
                <li>Klik Order Now & Bayar</li>
                <li>Tunggu proses verifikasi sistem</li>
            </ol>
        </div>
        
        <div class="text-center">
            <button class="btn btn-outline-warning btn-sm btn-block mb-2">
                <i class="fas fa-crown mr-1"></i> Upgrade Reseller (100K)
            </button>
        </div>
    </div>
</div>