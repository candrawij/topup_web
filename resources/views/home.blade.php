@extends('layouts.app')

@section('content')
<div class="container mb-5">
    <div id="bannerCarousel" class="carousel slide mt-3" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/banner-left.png') }}" class="d-block w-100" alt="Banner 1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banner-right.png') }}" class="d-block w-100" alt="Banner 2">
            </div>
        </div>
    </div>

    <div class="alert alert-warning mt-3 text-center fw-bold">
        🔥 PROMO SPESIAL: Top Up Mobile Legends Diskon 20% | Kode: MLTOPUP 🔥
    </div>

    <div class="container mt-4">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="btn-group mb-3">
                <button class="btn btn-warning" onclick="filterCategory('all')">All</button>
                <button class="btn btn-secondary" onclick="filterCategory('topup')">Top Up</button>
                <button class="btn btn-secondary" onclick="filterCategory('voucher')">Voucher</button>
                <button class="btn btn-secondary" onclick="filterCategory('ewallet')">Pulsa</button>
            </div>
            <form class="d-flex mb-3" style="max-width: 300px;">
                <input class="form-control" type="search" placeholder="Cari produk..." aria-label="Search">
                <button class="btn btn-outline-light ms-2" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>

        @php
            $sortedProducts = $products->sortBy('name');
        @endphp
        <div class="row" id="productList">
            @foreach ($sortedProducts as $product)
                <div class="col-6 col-md-4 col-lg-2 mb-4 product-item" data-category="{{ $product->category }}">
                    <div class="card bg-dark h-100">
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body text-white text-center">
                            <h6 class="card-title">{{ $product->name }}</h6>
                            <p class="card-text text-white">{{ Str::limit($product->description, 40) }}</p>
                            <!-- <p class="text-primary fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</p> -->
                            <a href="{{ route('order.show', $product->slug) }}" class="btn btn-sm btn-warning w-100">Beli</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container mt-5">
        <h4 class="text-center mb-4">Apa Kata Pelanggan Kami?</h4>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <img src="{{ asset('images/anonim.png') }}" class="rounded-circle me-2"
                            style="width: 40px; height: 40px; object-fit: cover;">
                            <span class="fw-bold">Anonimus</span>
                        </div>
                        <p class="mb-0">"Prosesnya cepat banget, ga sampai 5 menit udah masuk!"</p>
                        <div class="text-warning mt-2">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <img src="{{ asset('images/clisana.png') }}" class="rounded-circle me-2"
                            style="width: 40px; height: 40px; object-fit: cover;">
                            <span class="fw-bold">Clisana</span>
                        </div>
                        <p class="mb-0">"Harganya lebih murah dibanding tempat lain, recommended!"</p>
                        <div class="text-warning mt-2">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <img src="{{ asset('images/romy.png') }}" class="rounded-circle me-2"
                            style="width: 40px; height: 40px; object-fit: cover;">
                            <span class="fw-bold">Romy Lim</span>
                        </div>
                        <p class="mb-0">"CS-nya ramah dan membantu banget, ga nyesel beli disini"</p>
                        <div class="text-warning mt-2">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function filterCategory(category) {
        let items = document.querySelectorAll('.product-item');
        items.forEach(item => {
            if (category === 'all' || item.dataset.category === category) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });

        // Update button active state
        document.querySelectorAll('.btn-group .btn').forEach(btn => {
            if (btn.textContent.toLowerCase().includes(category) || (category === 'all' && btn.textContent === 'All')) {
                btn.classList.remove('btn-secondary');
                btn.classList.add('btn-warning');
            } else {
                btn.classList.remove('btn-warning');
                btn.classList.add('btn-secondary');
            }
        });
    }

    function filterCategory(category) {
        let items = document.querySelectorAll('.product-item');
        items.forEach(item => {
            if (category === 'all' || item.dataset.category === category) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });

        // Update button active state - PERBAIKAN DI SINI
        document.querySelectorAll('.btn-group .btn').forEach(btn => {
            // Reset semua button ke state non-aktif
            btn.classList.remove('btn-warning');
            btn.classList.add('btn-secondary');
            
            // Set button yang sesuai dengan kategori yang dipilih ke state aktif
            if ((category === 'all' && btn.textContent.trim() === 'All') ||
                (category === 'topup' && btn.textContent.trim() === 'Top Up') ||
                (category === 'voucher' && btn.textContent.trim() === 'Voucher') ||
                (category === 'ewallet' && btn.textContent.trim() === 'E-Wallet')) {
                btn.classList.remove('btn-secondary');
                btn.classList.add('btn-warning');
            }
        });
    }
</script>
@endsection