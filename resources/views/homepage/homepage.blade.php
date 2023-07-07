@extends('navbar.navbar')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset('css/homepage/style.css') }}">
@endsection

@section('content')
    {{-- Welcome --}}
    <div class="container">
        <div class="row">
            <div class="col d-flex align-items-center">
                <h2 id=welcome>Welcome!</h2>
            </div>
            <div class="col d-flex align-items-end justify-content-end">
                <div class="circle">
                    <h2 id=noTable>1</h2>
                </div>
            </div>
        </div>

        {{-- Promo / unggulan --}}
        <div class="row">
            <div class="col">
                <h3 id=promotions>Promo / unggulan</h3>
            </div>
            <div class="w-100"></div>
            <div class="col">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/img/banner/burger.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/banner/pizza.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/banner/burger.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
