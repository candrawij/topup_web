@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Harga Top Up</h1>

    <div class="row">
        @forelse ($products as $product)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->game }}</h5>
                        <p class="card-text">{{ $product->item }}</p>
                        <p class="card-text"><strong>Rp {{ number_format($product->price, 0, ',', '.') }}</strong></p>
                        <a href="#" class="btn btn-primary">Beli</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Belum ada produk tersedia.</p>
        @endforelse
    </div>
</div>
@endsection
