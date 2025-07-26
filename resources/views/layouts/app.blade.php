<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nemma Store</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    {{-- Optional custom CSS --}}
    <style>
        /* Warna dasar latar belakang dan teks */
        body {
            background-color: #1e1e1e;
            color: #eaeaea;
        }

        /* Heading */
        h1, h2, h3, h4, h5, h6 {
            color: #ffffff;
        }

        /* Tombol kategori (All, Top Up, Voucher, dll) */
        .btn-category {
            background-color: #3a3a3a;
            color: #eaeaea;
            border: none;
            margin: 4px;
        }
        .btn-category.active,
        .btn-category:hover {
            background-color: #ff5e13;
            color: #fff;
        }

        /* Kotak produk */
        .card {
            background-color: #2c2c2c;
            border: 1px solid #444;
        }

        .card-title {
            color: #ff5e13;
            font-weight: bold;
        }

        .card-text {
            color: #cccccc;
        }

        /* Harga */
        .harga {
            color: #34a4ff;
            font-weight: bold;
        }

        /* Tombol top up */
        .btn-topup {
            background-color: #ff5e13;
            color: #ffffff;
            border: none;
        }
        .btn-topup:hover {
            background-color: #e55a11;
        }

        /* Input Search */
        .form-control {
            background-color: #333;
            color: white;
            border: 1px solid #555;
        }

        .form-control::placeholder {
            color: #aaa;
        }

        /* Footer */
        footer {
            background-color: #111;
            color: #ccc;
            text-align: center;
            padding: 1rem 0;
            margin-top: 50px;
        }

        /* Hilangkan gap bawah jika tidak ada konten lagi */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #app {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }
    </style>

</head>
<body class="d-flex flex-column min-vh-100 bg-dark text-white">
    {{-- Navbar --}}
    @include('layouts.navbar')

    {{-- Konten Utama --}}
    <main class="py-4">
        @yield('content')
    </main>

    @include('partials.footer')

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
