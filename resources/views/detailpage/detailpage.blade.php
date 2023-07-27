@extends('navbar.navbar')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset('css/detailpage/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detailpage/plusMinus.css') }}">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
@endsection

@section('content')
    {{-- Top Text and Image --}}
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Detail Menu</h2>
            </div>
            <div class="w-100"></div>
            <div class="col">
                <img src="../assets/img/banner/burger.jpg" class="d-block w-100" alt="..." />
            </div>
        </div>
    </div>

    {{-- Column 2 --}}
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>{{ $data['data']['name'] }}</h3>
            </div>
            <div class="w-100"></div>
            <div class="col">
                <p>{{ $data['data']['deskripsi'] }}</p>
            </div>
        </div>
    </div>

    {{-- Column 3 --}}
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex align-items-center">
                    <h3 id="price">@formatPrice($data['data']['price'])</h3>
                </div>
            </div>
            <div class="col">
                <div id="plusminus-container" class="qty mt-5 mt-auto">
                    <span class="minus">-</span>
                    <input id="qty-bro" type="number" class="count" name="qty" value="1">
                    <span class="plus">+</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Column 4 --}}
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">
                        <h3>Catatan :</h3>
                    </label>
                    <textarea class="form-control no-resize" id="exampleFormControlTextarea1" rows="5"></textarea>
                </div>
            </div>
            <div class="w-100"></div>
            <div class="col">
                <a id="addToCartButton" href="#" class="btn btn-success" data-name="{{ $data['data']['name'] }}"
                    data-price="{{ $data['data']['price'] }}">Tambahkan ke Keranjang</a>
            </div>
        </div>
    </div>
@endsection

@section('additional-js')
    <script src="{{ asset('js/plusMinus/plusMinus.js') }}"></script>

    {{-- Local DB --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addToCartButtons = document.querySelectorAll('#addToCartButton');
            addToCartButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const name = this.getAttribute('data-name');
                    const price = this.getAttribute('data-price');
                    const qtyInput = document.getElementById('qty-bro');
                    const notesInput = document.getElementById('exampleFormControlTextarea1');
                    const qty = qtyInput.value;
                    const notes = notesInput.value;

                    const existingCartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

                    existingCartItems.push({
                        name,
                        price,
                        qty,
                        notes
                    });

                    localStorage.setItem('cartItems', JSON.stringify(existingCartItems));

                    window.location.href = '{{ route('homepage') }}';
                });
            });
        });
    </script>
@endsection
