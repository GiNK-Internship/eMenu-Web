<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BARD Order</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcomepage/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcomepage/pincode.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Selamat Datang!</h1>
            </div>
            <div class="w-100"></div>
            <div class="col">
                <div class="text-end">
                    <img src="assets/img/logo.svg" alt="Logo">
                </div>
            </div>
            <div class="col">
                <div class="bard-order-container">
                    <h2 class="bard-text">BARD</h2>
                    <h2 class="order-text">Order</h2>
                </div>
            </div>
            <div class="w-100"></div>
            <div class="col">
                <h3>Masukkan Kode PIN Anda</h3>
            </div>
            <div class="w-100"></div>
            <div class="col">
                <div class="pin-code">
                    <input type="number" maxlength="1" autofocus>
                    <input type="number" maxlength="1">
                    <input type="number" maxlength="1">
                    <input type="number" maxlength="1">
                </div>
            </div>
            <div class="w-100"></div>
            <div class="col text-center">
                <a id=addButton href="{{ route('homepage') }}" class="btn btn-success">Masuk</a>
                <span>
                    Belum punya kode pin? <a href="{{ route('auth') }}" class="create-pin-link">Buat kode pin anda
                        disini</a>
                </span>
            </div>
        </div>

        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/pincode/pincode.js') }}"></script>
</body>

</html>
