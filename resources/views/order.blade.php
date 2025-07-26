@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="page-content px-0">
        <div class="container-fluid">
            <div class="row">
                <!-- Left Column -->
                <div class="col-lg-4 mt-2 mb-2">
                    <!-- Product Card -->
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

                    <!-- Info Card -->
                    <div class="card shadow mb-3 border-0" style="background-color: #343a40;">
                        <div class="card-body p-3">
                            <h6 class="text-white font-weight-bold mb-2">Informasi Penting:</h6>
                            <ul class="text-white pl-3 mb-0" style="font-size: 14px;">
                                <li>Proses otomatis 24 jam</li>
                                <li>E-wallet/QRIS: Verifikasi instan</li>
                                <li>Bank Transfer: 5-15 menit</li>
                                <li>CS aktif jam 08:00-22:00 WIB</li>
                                <li>Join grup WhatsApp untuk info promo</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Related Products -->
                    <div class="card shadow d-sm-none d-md-block d-none d-sm-block border-0" style="background-color: #343a40;">
                        <div class="card-header bg-dark">
                            <h5 class="card-title text-light mb-0">Produk Lainnya</h5>
                        </div>
                        <div class="card-body p-2">
                            @foreach($relatedProducts as $related)
                            <div class="col mb-2">
                                <div class="card flex-row flex-wrap bg-secondary p-1 border-0">
                                    <div class="card-header border-0 p-1">
                                        <a href="{{ route('order.show', $related->slug) }}" class="stretched-link">
                                            <img src="{{ asset('storage/'.$related->image) }}" height="40px" alt="{{ $related->name }}">
                                        </a>
                                    </div>
                                    <div class="card-body p-1">
                                        <b class="text-white" style="font-size:0.9rem;">{{ $related->name }}</b>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-lg-8 mt-2 mb-2">
                    <form id="orderForm" action="{{ route('order.process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    
                    <!-- Account Data -->
                    <div class="card shadow mb-3 border-0" style="background-color: #343a40;">
                        <div class="card-header bg-dark">
                            <h5 class="card-title text-light mb-0">Lengkapi Data</h5>
                        </div>
                        <div class="card-body p-3">
                            <div id="userData">
                                <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-2">
                                    <label class="text-light mb-1">Server/Zone ID</label>
                                    <select class="form-control form-control-sm shadow" name="server_id" id="server_id" required>
                                        <option value="">-- Pilih Server --</option>
                                        <option value="prod_official_usa">AMERICA</option>
                                        <option value="prod_official_asia">ASIA</option>
                                        <option value="prod_official_eur">EUROPE</option>
                                        <option value="prod_official_cht">TW_HK_MO</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-2">
                                    <label class="text-light mb-1">User ID</label>
                                    <input class="form-control form-control-sm shadow" placeholder="Masukkan User ID" type="text" name="player_id" id="player_id" required>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Nominal Selection -->
                    <div class="card shadow mb-3 border-0" style="background-color: #343a40;">
                        <div class="card-header bg-dark">
                            <h5 class="card-title text-light mb-0">Pilih Nominal</h5>
                        </div>
                        <div class="card-body p-3 text-center">
                            <div class="row">
                                @foreach($product->variants as $variant)
                                <div class="col-md-4 col-6 mb-3">
                                    <input type="radio" name="variant_id" id="variant-{{ $variant->id }}" value="{{ $variant->id }}" class="d-none" required>
                                    <label for="variant-{{ $variant->id }}" class="d-block p-2 bg-dark text-white" style="cursor: pointer;">
                                        <div class="font-weight-bold">{{ $variant->name }}</div>
                                        <div class="text-warning">{{ number_format($variant->price, 0, ',', '.') }} IDR</div>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <!-- Payment Method -->
                    <div class="area-list-payment-method">
                        <!-- Bank Transfer -->
                        <div class="payment-drawer shadow active">
                            <div class="payment-header d-flex justify-content-between align-items-center">
                                <div class="payment-title">
                                    <b><i class="fas fa-landmark mr-2"></i> Bank Transfer</b>
                                </div>
                                <div class="payment-arrow">
                                    <i class="fas fa-chevron-up transition-all"></i>
                                </div>
                            </div>
                            <div class="payment-content">
                                <ul class="payment-options list-unstyled mb-0">
                                    <li class="payment-option">
                                        <input type="radio" name="payment_id" id="paymentMethod13" value="13" class="d-none">
                                        <label for="paymentMethod13" class="payment-item d-block">
                                            <div class="payment-info d-flex align-items-center">
                                                <div class="payment-icon mr-3">
                                                    <img src="{{ asset('images/payment/bca.png') }}" alt="BCA">
                                                </div>
                                                <div class="payment-details">
                                                    <div class="payment-name">BCA</div>
                                                    <small class="payment-description">Bank BCA</small>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!-- Tambahkan bank lain di sini -->
                                </ul>
                            </div>
                        </div>

                        <!-- E-Wallet (Active by default) -->
                        <div class="child-box payment-drawer shadow mb-2 active">
                            <div class="header short-payment-support-info-head d-flex justify-content-between align-items-center p-3" 
                                onclick="togglePaymentDrawer(this)">
                                <div class="left">
                                    <b><i class="fas fa-wallet mr-2"></i> E-Wallet</b>
                                </div>
                                <div class="right">
                                    <i class="fas fa-chevron-up transition-all"></i>
                                </div>
                            </div>
                            <div class="button-action-payment" style="display: block; overflow: hidden;">
                                <ul class="list-unstyled mb-0">
                                    <li class="border-top">
                                        <input type="radio" name="payment_id" id="paymentMethod4" value="4" class="d-none" checked>
                                        <label for="paymentMethod4" class="payment-item d-block p-3">
                                            <div class="info-top d-flex align-items-center">
                                                <div class="mr-3">
                                                    <img src="{{ asset('images/payment/ovo.png') }}" width="40" class="img-fluid">
                                                </div>
                                                <div>
                                                    <div class="font-weight-bold">OVO</div>
                                                    <small class="text-muted">Dompet digital OVO</small>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <li class="border-top">
                                        <input type="radio" name="payment_id" id="paymentMethod16" value="16" class="d-none">
                                        <label for="paymentMethod16" class="payment-item d-block p-3">
                                            <div class="info-top d-flex align-items-center">
                                                <div class="mr-3">
                                                    <img src="{{ asset('images/payment/dana.png') }}" width="40" class="img-fluid">
                                                </div>
                                                <div>
                                                    <div class="font-weight-bold">DANA</div>
                                                    <small class="text-muted">Dompet digital DANA</small>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <li class="border-top">
                                        <input type="radio" name="payment_id" id="paymentMethod17" value="17" class="d-none">
                                        <label for="paymentMethod17" class="payment-item d-block p-3">
                                            <div class="info-top d-flex align-items-center">
                                                <div class="mr-3">
                                                    <img src="{{ asset('images/payment/spay.png') }}" width="40" class="img-fluid">
                                                </div>
                                                <div>
                                                    <div class="font-weight-bold">ShopeePay</div>
                                                    <small class="text-muted">Dompet digital ShopeePay</small>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="short-payment-support-info p-2 border-top text-center" onclick="togglePaymentDrawer(this.parentElement.querySelector('.header'))">
                                <div class="d-inline-block mx-1">
                                    <img src="{{ asset('images/payment/ovo.png') }}" width="30">
                                </div>
                                <div class="d-inline-block mx-1">
                                    <img src="{{ asset('images/payment/dana.png') }}" width="30">
                                </div>
                                <div class="d-inline-block mx-1">
                                    <img src="{{ asset('images/payment/spay.png') }}" width="30">
                                </div>
                                <a class="open-button-action-payment text-dark ml-2">
                                    <i class="fas fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>

                        <!-- QRIS -->
                        <div class="child-box payment-drawer shadow mb-2">
                            <div class="header short-payment-support-info-head d-flex justify-content-between align-items-center p-3" 
                                onclick="togglePaymentDrawer(this)">
                                <div class="left">
                                    <b><i class="fas fa-qrcode mr-2"></i> QRIS</b>
                                </div>
                                <div class="right">
                                    <i class="fas fa-chevron-down transition-all"></i>
                                </div>
                            </div>
                            <div class="button-action-payment" style="display: none; overflow: hidden;">
                                <ul class="list-unstyled mb-0">
                                    <li class="border-top">
                                        <input type="radio" name="payment_id" id="paymentMethod3" value="3" class="d-none">
                                        <label for="paymentMethod3" class="payment-item d-block p-3">
                                            <div class="info-top d-flex align-items-center">
                                                <div class="mr-3">
                                                    <img src="{{ asset('images/payment/qris.jpg') }}" width="40" class="img-fluid">
                                                </div>
                                                <div>
                                                    <div class="font-weight-bold">QRIS</div>
                                                    <small class="text-muted">Bayar dengan QRIS (Semua E-Wallet)</small>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="short-payment-support-info p-2 border-top text-center" onclick="togglePaymentDrawer(this.parentElement.querySelector('.header'))">
                                <img src="{{ asset('images/payment/qris.jpg') }}" width="30" class="mr-2">
                                <a class="open-button-action-payment text-dark">
                                    <i class="fas fa-chevron-down"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- WhatsApp Number -->
                    <div class="card shadow mb-3 border-0" style="background-color: #343a40;">
                        <div class="card-header bg-dark">
                            <h5 class="card-title text-light mb-0">Nomor WhatsApp</h5>
                        </div>
                        <div class="card-body p-3">
                            <div class="alert alert-info p-2 mb-3">
                                <b>PENTING!</b> Masukkan nomor WhatsApp yang aktif
                            </div>
                            <input class="form-control form-control-sm bg-dark text-white border-dark" 
                                   placeholder="Masukkan Nomor WhatsApp" 
                                   type="text" 
                                   name="phone" 
                                   required>
                        </div>
                    </div>
                    
                    <!-- Submit Button -->
                    <button type="button" id="submitOrderBtn" class="btn btn-warning btn-block py-2 font-weight-bold">
                        <i class="fas fa-shopping-cart mr-2"></i> ORDER SEKARANG
                    </button>

                    <!-- Modal Konfirmasi (Baru ditambahkan) -->
                    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content bg-dark text-white">
                                <div class="modal-header border-secondary">
                                    <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Pesanan</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-dark table-striped">
                                        <tbody>
                                            <tr>
                                                <td>Produk</td>
                                                <td>:</td>
                                                <td class="confirm-product">{{ $product->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Server</td>
                                                <td>:</td>
                                                <td class="confirm-server"></td>
                                            </tr>
                                            <tr>
                                                <td>User ID</td>
                                                <td>:</td>
                                                <td class="confirm-player-id"></td>
                                            </tr>
                                            <tr>
                                                <td>Nominal</td>
                                                <td>:</td>
                                                <td class="confirm-variant"></td>
                                            </tr>
                                            <tr>
                                                <td>Metode Pembayaran</td>
                                                <td>:</td>
                                                <td class="confirm-payment"></td>
                                            </tr>
                                            <tr>
                                                <td>WhatsApp</td>
                                                <td>:</td>
                                                <td class="confirm-phone"></td>
                                            </tr>
                                            <tr>
                                                <td>Total</td>
                                                <td>:</td>
                                                <td class="confirm-total text-warning fw-bold"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer border-secondary">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Lanjutkan Pembayaran</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Fungsi utama untuk toggle payment drawer
    function togglePaymentDrawer(header) {
        const drawer = header.closest('.payment-drawer');
        const content = drawer.querySelector('.button-action-payment');
        const icon = header.querySelector('.fa-chevron-down, .fa-chevron-up');
        const bottomIcon = drawer.querySelector('.short-payment-support-info .fa-chevron-down, .short-payment-support-info .fa-chevron-up');
        
        // Tutup semua drawer lainnya terlebih dahulu
        document.querySelectorAll('.payment-drawer').forEach(d => {
            if (d !== drawer && d.classList.contains('active')) {
                const otherContent = d.querySelector('.button-action-payment');
                const otherIcon = d.querySelector('.header .fa-chevron-up');
                const otherBottomIcon = d.querySelector('.short-payment-support-info .fa-chevron-up');
                
                d.classList.remove('active');
                otherContent.style.display = 'none';
                if (otherIcon) otherIcon.classList.replace('fa-chevron-up', 'fa-chevron-down');
                if (otherBottomIcon) otherBottomIcon.classList.replace('fa-chevron-up', 'fa-chevron-down');
            }
        });
        
        // Toggle drawer saat ini
        drawer.classList.toggle('active');
        
        if (drawer.classList.contains('active')) {
            content.style.display = 'block';
            icon?.classList.replace('fa-chevron-down', 'fa-chevron-up');
            bottomIcon?.classList.replace('fa-chevron-down', 'fa-chevron-up');
        } else {
            content.style.display = 'none';
            icon?.classList.replace('fa-chevron-up', 'fa-chevron-down');
            bottomIcon?.classList.replace('fa-chevron-up', 'fa-chevron-down');
        }
    }

    // Inisialisasi drawer pertama sebagai aktif
    function initializeFirstDrawer() {
        const firstDrawer = document.querySelector('.payment-drawer.active');
        if (firstDrawer) {
            const content = firstDrawer.querySelector('.button-action-payment');
            content.style.display = 'block';
        }
    }

    // Handler untuk tombol toggle di bagian bawah
    function setupBottomToggleButtons() {
        document.querySelectorAll('.short-payment-support-info').forEach(el => {
            el.addEventListener('click', function(e) {
                if (!e.target.closest('a')) {
                    const header = this.parentElement.querySelector('.header');
                    togglePaymentDrawer(header);
                }
            });
        });
    }

    // Handler untuk form submission dan modal konfirmasi
    function setupFormConfirmation() {
        const form = document.getElementById('orderForm');
        const submitBtn = document.getElementById('submitOrderBtn');
        const confirmModal = new bootstrap.Modal('#confirmModal');
        
        if (!form || !submitBtn) return;

        submitBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Validasi form
            const requiredFields = [
                { selector: 'select[name="server_id"]', message: 'Server harus dipilih' },
                { selector: 'input[name="player_id"]', message: 'User ID harus diisi' },
                { selector: 'input[name="variant_id"]:checked', message: 'Nominal harus dipilih' },
                { selector: 'input[name="payment_id"]:checked', message: 'Metode pembayaran harus dipilih' },
                { selector: 'input[name="phone"]', message: 'Nomor WhatsApp harus diisi' }
            ];

            for (const field of requiredFields) {
                const element = document.querySelector(field.selector);
                if (!element?.value) {
                    alert(field.message);
                    return;
                }
            }

            // Ambil data untuk modal konfirmasi
            const formData = {
                server: document.querySelector('select[name="server_id"] option:checked').text,
                playerId: document.querySelector('input[name="player_id"]').value,
                variant: document.querySelector('input[name="variant_id"]:checked').nextElementSibling.textContent,
                payment: document.querySelector('input[name="payment_id"]:checked').nextElementSibling.querySelector('.font-weight-bold').textContent,
                phone: document.querySelector('input[name="phone"]').value,
                productName: document.querySelector('.confirm-product').textContent
            };

            // Isi data ke modal
            document.querySelector('.confirm-server').textContent = formData.server;
            document.querySelector('.confirm-player-id').textContent = formData.playerId;
            document.querySelector('.confirm-variant').textContent = formData.variant;
            document.querySelector('.confirm-payment').textContent = formData.payment;
            document.querySelector('.confirm-phone').textContent = formData.phone;

            // Tampilkan modal
            confirmModal.show();
        });

        // Handler submit form dari modal
        form.addEventListener('submit', function(e) {
            const submitButton = this.querySelector('button[type="submit"]');
            if (submitButton) {
                submitButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...';
                submitButton.disabled = true;
            }
        });
    }

    // Inisialisasi semua fungsi
    initializeFirstDrawer();
    setupBottomToggleButtons();
    setupFormConfirmation();
});
</script>
@endsection
@endsection