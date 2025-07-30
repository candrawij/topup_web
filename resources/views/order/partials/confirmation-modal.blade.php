<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header border-secondary">
                <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Pesanan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <h6 class="text-primary">Detail Produk</h6>
                    <div class="d-flex justify-content-between">
                        <span>Nama Produk:</span>
                        <strong id="confirm-product-name">{{ $product->name }}</strong>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Nominal:</span>
                        <strong id="confirm-variant-name"></strong>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Harga:</span>
                        <strong id="confirm-variant-price" class="text-warning"></strong>
                    </div>
                </div>

                <div class="mb-3">
                    <h6 class="text-primary">Data Akun</h6>
                    <div class="d-flex justify-content-between">
                        <span>Server:</span>
                        <strong id="confirm-server"></strong>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>User ID:</span>
                        <strong id="confirm-user-id"></strong>
                    </div>
                </div>

                <div class="mb-3">
                    <h6 class="text-primary">Pembayaran</h6>
                    <div class="d-flex justify-content-between">
                        <span>Metode:</span>
                        <strong id="confirm-payment-method"></strong>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>WhatsApp:</span>
                        <strong id="confirm-whatsapp"></strong>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-secondary">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Konfirmasi & Bayar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" 
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script>
    document.querySelector('.btn-primary').addEventListener('click', function() {
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) { alert('Pembayaran berhasil!'); },
            onPending: function(result) { alert('Menunggu pembayaran...'); },
            onError: function(result) { alert('Pembayaran gagal: ' + result.status_message); }
        });
    });
</script>