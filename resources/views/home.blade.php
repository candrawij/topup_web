@extends('layouts.app')

@section('content')
<div class="container mb-5">
    {{-- Banner Carousel --}}
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

    {{-- Kategori + Search --}}
    <div class="container mt-4">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="btn-group mb-3">
                <button class="btn btn-warning" onclick="filterCategory('all')">All</button>
                <button class="btn btn-secondary" onclick="filterCategory('topup')">Top Up</button>
                <button class="btn btn-secondary" onclick="filterCategory('voucher')">Voucher</button>
                <button class="btn btn-secondary" onclick="filterCategory('ewallet')">E-Wallet</button>
            </div>
            <form class="d-flex mb-3" style="max-width: 300px;">
                <input class="form-control" type="search" placeholder="Cari produk..." aria-label="Search">
                <button class="btn btn-outline-light ms-2" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>

        {{-- Produk --}}
        <div class="row" id="productList">
            @foreach ($products as $product)
                <div class="col-6 col-md-4 col-lg-2 mb-4 product-item" data-category="{{ $product->category }}">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body text-white">
                            <h6 class="card-title">{{ $product->name }}</h6>
                            <p class="card-text text-white">{{ Str::limit($product->description, 40) }}</p>
                            <p class="text-primary fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            <a href="/topup" class="btn btn-sm btn-warning w-100">Beli</a>
                        </div>
                    </div>
                </div>
            @endforeach
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
    }
</script>
@endsection
