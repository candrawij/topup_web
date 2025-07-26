// Fungsi untuk toggle payment drawer
function togglePaymentDrawer(header) {
    const drawer = header.closest('.payment-drawer');
    const content = drawer.querySelector('.payment-content');
    const icon = drawer.querySelector('.payment-arrow i');
    
    // Toggle active class
    drawer.classList.toggle('active');
    
    // Toggle content display dengan animasi
    if (drawer.classList.contains('active')) {
        content.style.maxHeight = content.scrollHeight + 'px';
        icon.classList.replace('fa-chevron-down', 'fa-chevron-up');
    } else {
        content.style.maxHeight = '0';
        icon.classList.replace('fa-chevron-up', 'fa-chevron-down');
    }
    
    // Tutup drawer lainnya jika perlu (opsional)
    document.querySelectorAll('.payment-drawer').forEach(item => {
        if (item !== drawer && item.classList.contains('active')) {
            item.classList.remove('active');
            const otherContent = item.querySelector('.payment-content');
            const otherIcon = item.querySelector('.payment-arrow i');
            otherContent.style.maxHeight = '0';
            otherIcon.classList.replace('fa-chevron-up', 'fa-chevron-down');
        }
    });
}

// Inisialisasi saat halaman dimuat
document.addEventListener('DOMContentLoaded', function() {
    // Set drawer aktif pertama kali
    const firstDrawer = document.querySelector('.payment-drawer.active');
    if (firstDrawer) {
        const content = firstDrawer.querySelector('.payment-content');
        content.style.maxHeight = content.scrollHeight + 'px';
    }

    // Event listener untuk header payment
    document.querySelectorAll('.payment-header').forEach(header => {
        header.addEventListener('click', function() {
            togglePaymentDrawer(this);
        });
    });
});