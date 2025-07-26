@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Produk</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="game" class="form-label">Nama Game</label>
            <input type="text" name="game" id="game" class="form-control" required value="{{ old('game', $product->game) }}">
        </div>

        <div class="mb-3">
            <label for="item" class="form-label">Nama Item</label>
            <input type="text" name="item" id="item" class="form-control" required value="{{ old('item', $product->item) }}">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga (Rp)</label>
            <input type="number" name="price" id="price" class="form-control" required value="{{ old('price', $product->price) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
