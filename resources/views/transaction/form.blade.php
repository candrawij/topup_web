@extends('layouts.app')

@section('content')
<div class="container py-5 text-light">
    <div class="row justify-content-center">
        <div class="col-md-6 bg-dark p-4 rounded shadow">
            <h3 class="mb-4 text-center">Form Top Up</h3>

            <form method="POST" action="{{ route('transaction.store') }}">
                @csrf

                <!-- Pilih Produk -->
                <div class="mb-3">
                    <label for="product_id" class="form-label">Pilih Produk</label>
                    <select class="form-select" name="product_id" id="product_id" required>
                        <option value="">-- Pilih Produk --</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">
                                {{ $product->game_name }} - {{ $product->description }} (Rp{{ number_format($product->price, 0, ',', '.') }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Nickname -->
                <div class="mb-3">
                    <label for="nickname" class="form-label">Nickname</label>
                    <input type="text" class="form-control" name="nickname" id="nickname" required>
                </div>

                <!-- ID Game -->
                <div class="mb-3">
                    <label for="game_id" class="form-label">ID Akun Game</label>
                    <input type="text" class="form-control" name="game_id" id="game_id" required>
                </div>

                <!-- Submit -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Beli Sekarang</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
