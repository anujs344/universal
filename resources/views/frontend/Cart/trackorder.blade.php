<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.layouts.header')
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
                <p class="arrvingOn">Arriving on Updated SOon</p>
                <div class="row">
                    <div class="col-3 blackContent"></div>
                    <div class="col-6 content"></div>
                    <div class="col-3 blackContent">Rs {{$order->total}}</div>
                </div>
                <hr>
               
                <hr>
                <div class="row mt-2">
                    <div class="col-3 blackContent">Order Total</div>
                    <div class="col-6"></div>
                    <div class="col-3 orderTotal">Rs {{$order->total}}</div>
                </div>
                <hr>
                <div class="row mt-2">
                    <div class="col-3 blackContent">Payment</div>
                    <div class="col-6"></div>
                    <div class="col-3 blackContent">{{$order->payment}}</div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5">
                        <div class="blackContent">Shipping Address</div>
                    </div>
                    <div class="col-7">
                        <div class="addressorderPlaced">{{$order->address->address}}, {{$order->address->city}}, {{$order->address->state}},{{$order->address->pincode}}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <img src="{{asset('frontend/img/orderPlacedImg.png')}}" class="d-block mx-auto" alt="" width="100%">
                <div class="d-flex justify-content-center">
                    <a href="{{route('guest.product.show')}}"><button class="ContinueShopping me-3">Continue Shopping</button></a>
                    <a href="{{route('profile.trackorder',$order->track_id)}}"><img src="{{asset('frontend/img/trackOrderBtn.png')}}" class="checkOutBtn" alt=""></a>
                </div>
            </div>
        </div>
    </div>
@include('frontend.layouts.footer')
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/cart.js')}}"></script>



</body>

</html>