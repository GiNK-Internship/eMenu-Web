@extends('navbar.navbar')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset('css/homepage/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/homepage/search.css') }}">
    <link rel="stylesheet" href="{{ asset('css/homepage/btgroup.css') }}">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
@endsection

@section('content')
    <section id=topSection>
        {{-- Welcome --}}
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-column">
                    <h2 id=welcome>Selamat Datang!</h2>
                    <p id=name>Bayu Nindioko</p>
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
                                <img src="assets/img/banner/burger.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/img/banner/pizza.jpg" class="d-block w-100" alt="...">
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
            {{-- Search --}}
            <div class="container">
                <div class="row height d-flex justify-content-center align-items-center">
                    <div class="col-md-6">
                        <div class="form">
                            <i class="fa fa-search"></i>
                            <input id="myInput" onkeyup="search()" type="text" class="form-control form-input"
                                placeholder="Search">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Button Group / Filter --}}
    <ul class="nav nav-pills mb-3 horizontal-scroll flex-nowrap overflow-auto" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-semua-tab" data-bs-toggle="pill" data-bs-target="#pills-semua"
                type="button" role="tab" aria-controls="pills-semua" aria-selected="true">Semua</button>
        </li>
        @foreach ($dataCategory as $cat)
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-{{ strtolower($cat['name']) }}-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-{{ strtolower($cat['name']) }}" type="button" role="tab"
                        aria-controls="pills-{{ strtolower($cat['name']) }}"
                        aria-selected="false">{{ $cat['name'] }}</button>
                </li>
        @endforeach
    </ul>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-semua" role="tabpanel" aria-labelledby="pills-semua-tab"
            tabindex="0">
            {{-- Cardview --}}
            <div class="card-container">
                @foreach ($data['data'] as $item)
                    <div class="card">
                        <img src="assets/img/banner/burger.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item['name'] }}</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">{{ $item['deskripsi'] }}</h6>
                            <h5 class="card-text">@formatPrice($item['price'])</h5>
                            <div style="display: flex; justify-content: center;">
                                <a id="addButton" href="{{ route('detailpage/', $item['id']) }}"
                                    class="btn btn-success">Tambah</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @foreach ($data['data'] as $item)
            @foreach ($item['kategori'] as $kategori)
                <div class="tab-pane fade" id="pills-{{ strtolower($kategori['name']) }}" role="tabpanel"
                    aria-labelledby="pills-{{ strtolower($kategori['name']) }}-tab" tabindex="0">
                    <!-- Cardview for {{ $kategori['name'] }} items -->
                    <div class="card-container">
                        @foreach ($data['data'] as $item)
                            @foreach ($item['kategori'] as $kat)
                                @if (strtolower($kat['name']) === strtolower($kategori['name']))
                                    <div class="card">
                                        <!-- Card details -->
                                        <img src="assets/img/banner/burger.jpg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item['name'] }}</h5>
                                            <h6 class="card-subtitle mb-2 text-body-secondary">
                                                {{ $item['deskripsi'] }}</h6>
                                            <h5 class="card-text">@formatPrice($item['price'])</h5>
                                            <div style="display: flex; justify-content: center;">
                                                <a id="addButton" href="{{ route('detailpage/', $item['id']) }}"
                                                    class="btn btn-success">Tambah</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endforeach

        {{-- Floating Button --}}
        <a href="{{ route('cartpage') }}" class="float">
            <i class="fa fa-shopping-cart my-float" aria-hidden="true">
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    1
                    <span class="visually-hidden">unread messages</span>
                </span>
            </i>
        </a>
    @endsection

    {{-- Search Function --}}
    <script>
        function search() {
            var input, filter;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            cards = document.getElementsByClassName("card")
            titles = document.getElementsByClassName("card-title");

            for (i = 0; i < cards.length; i++) {
                a = titles[i];
                if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    cards[i].style.display = "";
                } else {
                    cards[i].style.display = "none";
                }
            }
        }
    </script>
