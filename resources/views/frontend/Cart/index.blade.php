<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.layouts.header')    
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/products.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bestDeals.css')}}">

</head>

<body class="bg-white">
    @include('frontend.layouts.headbar')

    <div id="searchBar" class="mt-5 mb-3">
        <label for="search" class="border-end pe-2"><img src="./img/search.png" alt=""></label>
        <input type="text" id="search" placeholder="Search Products Here" class="ms-3">
    </div>
    <div class="container">
        <h2 id="wishListHeading mt-2">Cart</h2>
        <div class="row border-bottom pb-3 border-3 mt-5">
            <div class="col-3 cartHeadings">Product</div>
            <div class="col-3"></div>
            <div class="col-2 cartHeadings">Price</div>
            <div class="col-2 cartHeadings">Quantity</div>
            <div class="col-2 cartHeadings">Total</div>
        </div>
        @foreach ($cart as $item)
        <div class="cartContainer mt-3">
            <div class="row">
                <div class="col-3"><img src="{{asset('product').'/'.$item->product->image}}" class="d-block mx-auto mt-3" alt=""></div>
                <div class="col-3">
                    <h2>{{$item->product->name}}</h2>
                    <div class="d-flex flex-wrap mt-3">
                        <p class="cartGreenPrice">Rs {{(100-$item->product->discount)*$item->product->price/100}}</p>
                        <p class="cartGreyPrice ms-1">{{$item->product->price}}</p>
                    </div>
                </div>
                <div class="col-2 my-auto cartGreenPrice">Rs {{(100-$item->product->discount)*$item->product->price/100}}</div>
                <div class="col-2 my-auto">
                    <div class="quantityCart d-flex align-items-center ms-2 text-center">
                        <div class="w-100" id="minusCart" role="button"><form action="{{route('cart.decrease',$item->id)}}" method="Post">@csrf<button type="submit">-</button></form></div>
                        <input type="number" min="1" class="w-100 text-center cartQuantity" value="{{$item->quantity}}"
                            id="quantityNumberCart">
                        <div class=" w-100" id="plusCart" role="button"><form action="{{route('cart.increase',$item->id)}}" method="Post">@csrf<button type="submit">+</button></form></div>
                    </div>
                </div>
                <div class="col-2 my-auto">
                    <div class="totalPrice">Rs {{((100-$item->product->discount)*$item->product->price/100)*$item->quantity}}</div>
                </div>
            </div>
        </div>
        

        @endforeach
        <form action="{{route('user.checkout')}}" method="POST">
            @csrf
        <div class="row border-bottom border-muted py-3">
            <div class="col-sm-3 col-6  promoCode">Promo Code :</div>
            <div class="col-sm-3 col-6"><input type="code" placeholder="COU221151" class="mt-2 promoCodeInput"></div>
            <div class="col-sm-2 col-4 text-center mt-2 finalOff">5% OFF</div>
            <div class="col-sm-2 col-4 mt-sm-2 mt-1 promoCode">Subtotal :</div>
            <div class="col-sm-2 col-4 mt-sm-3 mt-2 finalTotal">Rs {{$total}}</div>
        </div>
        <input type="hidden" value="{{$total}}" name="total">
        <div class="d-flex justify-content-end mt-4">
            <button class="clearAll me-3">Cancel</button>
            
                <input type="hidden" name="cart" value="{{$cart}}">
                <button type="submit"><img src="{{asset('frontend/img/checkOutBtn.png')}}" class="checkOutBtn" alt=""></button>
        </div>
    </form>

    </div>
    <div class="otherProducts mt-5">
        <h1 class="text-center text-uppercase">Similar products</h1>
        <div class="hr"></div>
        <div class="row">
            <div class="col-md-4 mt-4">
                <div class="ourProductSingle">
                    <img src="./img/products/product1.jpg" alt="" class="ProductSingleImg d-block mx-auto">
                    <h3 class="ourProductSingleH3 text-center">Universal Kabaj Ki Fakki</h3>
                    <p class="ourProductSingleP">Lorem ipsum dolor s venenatis ut. Tempor aliquam id sem fac Lorem
                        ipsum dolor s
                        venenatis ut. Tempor
                        aliquam
                        id
                        sem fac</p>
                    <div class="d-flex justify-content-around mt-3 mb-3">
                        <a href="products.html"><img src="./img/shopNowBtn.png"
                                class="d-block mx-auto me-1 shopBtn"></a>
                        <a href="products.html"><img src="./img/viewInfo.png" class="d-block mx-auto me-1 infoBtn"
                                alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-4">
                <div class="ourProductSingle">

                    <img src="./img/products/product2.png" alt="" class="ProductSingleImg d-block mx-auto">
                    <h3 class="ourProductSingleH3 text-center">Universal Sugar Ki Fakki</h3>
                    <p class="ourProductSingleP">Lorem ipsum dolor s venenatis ut. Tempor aliquam id sem fac
                        Lorem
                        ipsum dolor s
                        venenatis ut. Tempor
                        aliquam
                        id
                        sem fac</p>
                    <div class="d-flex justify-content-around mt-3 mb-3">
                        <a href="products.html"><img src="./img/shopNowBtn.png"
                                class="d-block mx-auto me-1 shopBtn"></a>
                        <a href="products.html"><img src="./img/viewInfo.png" class="d-block mx-auto me-1 infoBtn"
                                alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-4">
                <div class="ourProductSingle">

                    <img src="./img/prodducts/product3.jpg" alt="" class="ProductSingleImg d-block mx-auto">
                    <h3 class="ourProductSingleH3 text-center">Universal Dant Toothpaste</h3>
                    <p class="ourProductSingleP">Lorem ipsum dolor s venenatis ut. Tempor aliquam id sem fac
                        Lorem
                        ipsum dolor s
                        venenatis ut. Tempor
                        aliquam
                        id
                        sem fac</p>
                    <div class="d-flex justify-content-around mt-3 mb-3">
                        <a href="products.html"><img src="./img/shopNowBtn.png"
                                class="d-block mx-auto me-1 shopBtn"></a>
                        <a href="products.html"><img src="./img/viewInfo.png" class="d-block mx-auto me-1 infoBtn"
                                alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <a href="products.html"><img src="{{asset('frontend/img/viewMore.png')}}" class="d-block mx-auto mt-5" alt=""></a>
    </div>

    

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}

    <!-- Bootstrap JavaScript -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script> --}}
    <!-- Main JavaScript -->
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
    <script src="{{asset('frontend/js/cart.js')}}"></script>

    @include('frontend.layouts.footer')

</body>

</html>