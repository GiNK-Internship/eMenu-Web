@extends('navbar.navbar')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset('css/cartpage/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detailpage/plusMinus.css') }}">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Keranjangku</h2>
            </div>
            <div id="cartList">
                <!-- Di sini akan ditampilkan daftar pesanan dari Local Storage -->
            </div>
            <div class="w-100"></div>
            <template id="card-template">
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
                                        <h5 class="harga">Rp 25.000</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="cta-section">
                                <div>
                                    <i id="trash-icon" class="fa fa-trash-o" aria-hidden="true"></i>
                                </div>
                                <div id="plusminus-container" class="qty mt-5 mt-auto">
                                    <span class="minus">-</span>
                                    <input type="number" class="count" name="qty" value="1">
                                    <span class="plus">+</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>


            {{-- Confirm Section --}}
            <div class="container">
                <div class="row confirm-section">
                    <div class="col">
                        <h5>Total Rp 90.000</h5>
                    </div>
                    <div class="col">
                        <a id=addButton type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Pesan</a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            data-bs-backdrop="static" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="assets/img/emptypage/checklist.svg" class="img-popup" alt="Checklist">
                                        <div class="image-caption">Pesanan diproses</div>
                                        <div class="image-caption2">Silahkan Tunggu Pesanan Anda</div>
                                        <a id=addButton href="{{ route('homepage') }}" class="btn btn-warning">Kembali ke
                                            Home</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection

        @section('additional-js')
            <script src="{{ asset('js/plusMinus/plusMinus.js') }}"></script>

            {{-- Read Local DB --}}
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

                    const cartListContainer = document.getElementById('cartList');

                    function updateCartList() {
                        cartListContainer.innerHTML = '';
                        cartItems.forEach(item => {
                            const cardTemplate = document.querySelector('#card-template').content.cloneNode(true);
                            const cardImage = cardTemplate.querySelector('.card-img-top');
                            const cardTitle = cardTemplate.querySelector('.card-title');
                            const cardDescription = cardTemplate.querySelector('.card-text');
                            const cardPrice = cardTemplate.querySelector('.harga');
                            const trashIcon = cardTemplate.querySelector('.fa-trash-o');
                            const qtyInput = cardTemplate.querySelector('.count');

                            cardTitle.textContent = `${item.name}`;
                            cardDescription.textContent = item.notes;
                            cardPrice.textContent = `Rp ${item.price}`;
                            qtyInput.value = item.qty;

                            trashIcon.addEventListener('click', () => {
                                const updatedCartItems = cartItems.filter(cartItem => cartItem.id !== item.id);
                                localStorage.setItem('cartItems', JSON.stringify(updatedCartItems));
                                cartItems.splice(cartItems.findIndex(cartItem => cartItem.id === item.id), 1);
                                updateCartList();
                            });

                            cartListContainer.appendChild(cardTemplate);
                        });
                    }

                    updateCartList();

                });
            </script>

        @endsection
