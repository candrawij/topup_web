<script>
function openPaymentDrawer(element) {
    // Tutup semua drawer kecuali yang diklik
    document.querySelectorAll('.payment-drawwer').forEach(drawer => {
        if (drawer !== element.closest('.payment-drawwer')) {
            closePaymentDrawer(drawer);
        }
    });

    // Toggle drawer yang diklik
    const drawer = element.closest('.payment-drawwer');
    togglePaymentDrawer(drawer);
}

// Fungsi untuk menutup drawer
function closePaymentDrawer(drawer) {
    drawer.classList.remove('active');
    const content = drawer.querySelector('.button-action-payment');
    const arrow = drawer.querySelector('.open-button-action-payment i');
    if (content) content.style.display = 'none';
    if (arrow) arrow.className = 'fas fa-chevron-down';
}

// Fungsi untuk toggle drawer
function togglePaymentDrawer(drawer) {
    drawer.classList.toggle('active');
    const content = drawer.querySelector('.button-action-payment');
    const arrow = drawer.querySelector('.open-button-action-payment i');
    
    if (drawer.classList.contains('active')) {
        if (content) content.style.display = 'block';
        if (arrow) arrow.className = 'fas fa-chevron-up';
    } else {
        if (content) content.style.display = 'none';
        if (arrow) arrow.className = 'fas fa-chevron-down';
    }
}

document.addEventListener('DOMContentLoaded', function() {
    // Tutup semua drawer secara default
    document.querySelectorAll('.payment-drawwer').forEach(drawer => {
        closePaymentDrawer(drawer);
    });

    // Aktifkan item pembayaran pertama (opsional)
    const firstPaymentItem = document.querySelector('.payment-item');
    if (firstPaymentItem) {
        firstPaymentItem.classList.add('active');
    }
    
    // Handler untuk perubahan produk (jika diperlukan)
    document.querySelectorAll('input[name="product_id"]').forEach(radio => {
        radio.addEventListener('change', function() {
            // Implementasi update harga
        });
    });
});
</script>