@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Invoice</h2>
    <p><strong>ID Transaksi:</strong> {{ $trx->id }}</p>
    <p><strong>Game:</strong> {{ $trx->product->game }}</p>
    <p><strong>Item:</strong> {{ $trx->product->item }}</p>
    <p><strong>Harga:</strong> Rp{{ $trx->total_price }}</p>
    <p><strong>ID Akun Game:</strong> {{ $trx->game_id }}</p>
    <p><strong>Waktu:</strong> {{ $trx->created_at }}</p>
</div>
@endsection
