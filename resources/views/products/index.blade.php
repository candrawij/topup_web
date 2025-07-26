@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Produk</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">+ Tambah Produk</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Game</th>
                <th>Item</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->game }}</td>
                    <td>{{ $product->item }}</td>
                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <!-- Tombol Hapus -->
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $product->id }}">
                                Hapus
                            </button>

                            <!-- Modal Konfirmasi -->
                            <div class="modal fade" id="confirmDeleteModal{{ $product->id }}" tabindex="-1" aria-labelledby="confirmDeleteLabel{{ $product->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <div class="modal-header">
                                    <h5 class="modal-title" id="confirmDeleteLabel{{ $product->id }}">Konfirmasi Hapus</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                    </div>

                                    <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus <strong>{{ $product->item }}</strong> dari daftar?
                                    </div>

                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                            </div>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada produk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
