<script>
document.addEventListener('DOMContentLoaded', function() {
    // Fungsi untuk toggle payment drawer
    function togglePaymentDrawer(header) {
        // Implementasi fungsi
    }

    // Inisialisasi drawer pertama sebagai aktif
    function initializeFirstDrawer() {
        // Implementasi fungsi
    }

    // Handler untuk tombol toggle di bagian bawah
    function setupBottomToggleButtons() {
        // Implementasi fungsi
    }

    // Handler untuk form submission dan modal konfirmasi
    function setupFormConfirmation() {
        // Implementasi fungsi
    }

    // Inisialisasi semua fungsi
    initializeFirstDrawer();
    setupBottomToggleButtons();
    setupFormConfirmation();

    const confirmationModal = new bootstrap.Modal('#confirmationModal');
    const orderForm = document.getElementById('orderForm');
    
    // Tangani klik tombol Order Now
    document.getElementById('submitOrderBtn').addEventListener('click', function() {
        // Validasi form
        if (!validateForm()) return;
        
        // Isi data ke modal konfirmasi
        fillConfirmationData();
        
        // Tampilkan modal
        confirmationModal.show();
    });
    
    function validateForm() {
        const requiredFields = [
            { selector: 'select[name="server_id"]', message: 'Silakan pilih server' },
            { selector: 'input[name="player_id"]', message: 'Silakan masukkan User ID' },
            { selector: 'input[name="variant_id"]:checked', message: 'Silakan pilih nominal' },
            { selector: 'input[name="payment_id"]:checked', message: 'Silakan pilih metode pembayaran' },
            { selector: 'input[name="phone"]', message: 'Silakan masukkan nomor WhatsApp' }
        ];
        
        for (const field of requiredFields) {
            const element = document.querySelector(field.selector);
            if (!element || !element.value) {
                alert(field.message);
                if (element) element.focus();
                return false;
            }
        }
        return true;
    }
    
    function fillConfirmationData() {
        // Fungsi helper untuk safe element access
        const safeTextContent = (selector, parent = document) => {
            const el = parent.querySelector(selector);
            return el ? el.textContent : 'Data tidak ditemukan';
        };

        try {
            // Data produk
            document.getElementById('confirm-product-name').textContent = '{{ $product->name }}';
            
            // Data nominal
            const selectedVariant = document.querySelector('input[name="variant_id"]:checked');
            if (selectedVariant) {
                const variantLabel = selectedVariant.nextElementSibling;
                if (variantLabel) {
                    document.getElementById('confirm-variant-name').textContent = 
                        safeTextContent('.nominal-name', variantLabel);
                    document.getElementById('confirm-variant-price').textContent = 
                        safeTextContent('.nominal-price', variantLabel);
                }
            }
            
            // Data akun
            const serverSelect = document.querySelector('select[name="server_id"]');
            if (serverSelect) {
                document.getElementById('confirm-server').textContent = 
                    safeTextContent('option:checked', serverSelect);
            }
            
            // Data Player ID
            const playerIdInput = document.querySelector('input[name="player_id"]');
            if (playerIdInput) {
                document.getElementById('confirm-user-id').textContent = playerIdInput.value;
            } else {
                console.error("Input Player ID tidak ditemukan!");
            }
            
            // Data pembayaran
            const selectedPayment = document.querySelector('input[name="payment_id"]:checked');
            console.log('Selected Payment:', selectedPayment); // Debug
            
            if (selectedPayment) {
                const paymentLabel = selectedPayment.closest('label') || selectedPayment.nextElementSibling;
                console.log('Payment Label:', paymentLabel); // Debug
                
                if (paymentLabel) {
                    const paymentText = paymentLabel.querySelector('.info-bottom')?.textContent 
                                    || paymentLabel.textContent.trim();
                    document.getElementById('confirm-payment-method').textContent = paymentText;
                }
            }
            
            // WhatsApp
            const whatsapp = getSafeValue('input[name="phone"]');
            document.getElementById('confirm-whatsapp').textContent = whatsapp;

        } catch (error) {
            console.error('Error in fillConfirmationData:', error);
            alert('Terjadi kesalahan saat memuat data konfirmasi');
        }
    }
});
</script>