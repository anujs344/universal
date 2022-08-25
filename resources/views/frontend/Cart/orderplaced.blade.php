<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.layouts.header')
    <!-- Main CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/products.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/responsive.css')}}">
</head>

<body class="bg-white">
    @include('frontend.layouts.headbar')

    <h1 class="text-center mt-5 congratulations">Congratulation</h1>
    <h2 class="orderPlacedText text-center">Order Placed Successfully</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-12 rightSide px-4">
                <p class="arrvingOn">Arriving on 23-05-2021</p>
                <div class="row">
                    <div class="col-3 blackContent">1x</div>
                    <div class="col-6 content">Lorem Ipsum</div>
                    <div class="col-3 blackContent">Rs 2999</div>
                </div>
                <hr>
                <div class="row mt-2">
                    <div class="col-3 content">Sub Total</div>
                    <div class="col-6 content"></div>
                    <div class="col-3 blackContent">Rs 2999</div>
                </div>
                <div class="row mt-2">
                    <div class="col-3 content">Shipping Fee</div>
                    <div class="col-6 content text-end pe-1">( Free Shipping Cost )</div>
                    <div class="col-3 blackContent">Rs 00</div>
                </div>
                <div class="row mt-2">
                    <div class="col-3 content">Tax</div>
                    <div class="col-6 content text-end"></div>
                    <div class="col-3 blackContent">Rs 00</div>
                </div>
                <hr>
                <div class="row mt-2">
                    <div class="col-3 blackContent">Order Total</div>
                    <div class="col-6"></div>
                    <div class="col-3 orderTotal">Rs 1999</div>
                </div>
                <hr>
                <div class="row mt-2">
                    <div class="col-3 blackContent">Payment</div>
                    <div class="col-6"></div>
                    <div class="col-3 blackContent">Cash</div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5">
                        <div class="blackContent">Shipping Address</div>
                    </div>
                    <div class="col-7">
                        <div class="addressorderPlaced">South Apartment, Park hill road, Near westside, NCR 466555</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <img src="{{asset('frontend/img/orderPlacedImg.png')}}" class="d-block mx-auto" alt="" width="100%">
                <div class="d-flex justify-content-center">
                    <button class="ContinueShopping me-3">Continue Shopping</button>
                    <a href="trackOrder.html"><img src="{{asset('frontend/img/trackOrderBtn.png')}}" class="checkOutBtn" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.layouts.footer')
    <script src="{{asset('frontendjs/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontendjs/main.js')}}"></script>
    <script src="{{asset('frontendjs/cart.js')}}"></script>



</body>

</html>