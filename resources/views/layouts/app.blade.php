<!DOCTYPE html>
<html lang="en" data-topbar="dark" data-layout="horizontal">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nemma Store</title>
    
    {{-- CSS --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    {{-- Custom Styles --}}
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/payment.css') }}" rel="stylesheet">
</head>
<body data-topbar="dark" data-layout="horizontal" data-layout-size="full">
    <div class="app-wrapper">
        {{-- Header --}}
        @include('layouts.navbar')

        {{-- Main Content --}}
        <div class="main-content-wrapper">
            <div class="container py-4">
                @yield('content')
            </div>
        </div>
        </div>

        {{-- Footer --}}
        @include('partials.footer')

        {{-- Floating Action Button --}}
        <div class="fab-container">
            <div class="fab-main" onclick="window.open('https://wa.me/6285183052810', '_blank')">
                <i class="fab fa-whatsapp"></i>
            </div>
        </div>
    </div>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Aktifkan tooltip
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
        });
    </script>
    <script src="{{ asset('js/payment.js') }}"></script>
</body>
</html>