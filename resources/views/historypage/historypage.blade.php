@extends('navbar.navbar')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset('css/historypage/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detailpage/plusMinus.css') }}">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Pesanan yang Diproses</h2>
            </div>
            <div class="w-100"></div>
            <div class="col">
                {{-- List Cart --}}
                <div class="card dark">
                    <img src="assets/img/banner/pizza.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="text-section">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card's
                                content.</p>
                            <div class="row">
                                <div class="col">
                                    <h5>Rp 25.000</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                {{-- List Cart --}}
                <div class="card dark">
                    <img src="assets/img/banner/pizza.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="text-section">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card's
                                content.</p>
                            <div class="row">
                                <div class="col">
                                    <h5>Rp 25.000</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection

        @section('additional-js')
            <script src="{{ asset('js/plusMinus/plusMinus.js') }}"></script>
        @endsection
