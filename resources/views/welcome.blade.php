<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Topup Game</title>

        <!-- Bootstrap 5 CDN CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- (Optional) Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <div class="container mt-5">
            <div class="text-center">
                <h1>Topup Game Favoritmu</h1>
                <p class="lead">Mudah, cepat, dan terpercaya</p>
            </div>

            <div class="row justify-content-center mt-4">
                <div class="col-md-6">
                    <form class="card p-4 shadow-sm">
                        <div class="mb-3">
                            <label for="game_id" class="form-label">Game ID</label>
                            <input type="text" class="form-control" id="game_id" placeholder="Masukkan ID kamu">
                        </div>
                        <div class="mb-3">
                            <label for="nominal" class="form-label">Nominal</label>
                            <select class="form-select" id="nominal">
                                <option selected disabled>Pilih jumlah topup</option>
                                <option>86 Diamond - Rp 20.000</option>
                                <option>172 Diamond - Rp 40.000</option>
                                <option>344 Diamond - Rp 80.000</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Bayar Sekarang</button>
                    </form>
                </div>
            </div>
        </div>


        <!-- Bootstrap 5 CDN JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
