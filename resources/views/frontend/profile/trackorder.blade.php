<!DOCTYPE html>
<html lang="en">

<head>
   
    @include('frontend.profile.layouts.headerlinks')
    <!-- Main CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/products.css')}}">


</head>

<body class="bg-white">
    
    @include('frontend.profile.layouts.header')
    <section class="z-index-1 mb-3">
        <div class="container-fluid  px-3 px-lg-5 pt-lg-3">
            <div class="row ">
                @include('frontend.profile.layouts.sidebar')
                <div class="col-lg-9 p-3 pt-lg-5 mt-lg-5 pb-5 px-4">
                    <h3 class="mb-3 fs-32 fw-600 text-black">Track Order</h3>
                    <div class="searchOrderID mx-auto mt-3">
                        <label class="form-label text-muted mt-3 ms-5">ORDER ID :</label>
                        <form action="{{route('profile.trackorder')}}" method="get">

                            <div class="input-group mb-3">
                                <div class="input-group mb-3 ms-5 me-3 w-60">
                                    <input type="text" name="id" class="form-control orderIDSearch"
                                        placeholder="Please enter your order id here...">
                                </div>
                                <div class="mx-auto mb-3">
                                    <button type="submit" class="trackOrderBtn ml-5">Track Order</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    @if (isset($order))
                    <div class="row mt-5">
                        <div class="col-md-4 col-12">
                            <h4 class="orderId">Order ID :
                                {{$order->track_id}}</h4>
                            <span class="fw-bold mt-3">1x</span>
                            <span class="text-muted mt-3">Lorem Ipsum</span>
                            <button class="downloadBtn mt-3 px-2 mt-5"><img src="./img/pdf.png" alt="">Download</button>
                        </div>
                        <div class="col-md-8 col-12">
                            <div class="row">
                                <div class="col-2">
                                    <div class="outerGreen d-flex align-items-center justify-content-center">
                                        <div class="innerGreen d-flex justify-content-center align-items-center"><img
                                                src="{{asset('frontend/img/tick.png')}}" alt=""></div>
                                    </div>
                                    {{-- <div class="greyLine"></div>
                                    <div class="outerGreen d-flex align-items-center justify-content-center">
                                        <div class="innerGreen d-flex justify-content-center align-items-center"><img
                                                src="{{asset('frontend/img/tick.png')}}" alt=""></div>
                                    </div> --}}
                                    {{-- <div class="greyLine"></div>
                                    <div class="outerGreen d-flex align-items-center justify-content-center">
                                        <div class="innerGreen d-flex justify-content-center align-items-center"><img
                                                src="{{asset('frontend/img/tick.png')}}" alt=""></div>
                                    </div> --}}
                                </div>
                                <div class="col-10">
                                    <div>
                                        <div class="text-end text-muted">Sun, 25 July 2020, 09:50 PM</div>
                                        <h4>Order Placed</h4>
                                        <p class="text-muted">Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum
                                            dolor
                                            sitLorem ipsum dolor sitLorem </p>
                                    </div>
                                    <div class="mt-5">
                                        <div class="text-end text-muted">Sun, 25 July 2020, 09:50 PM</div>
                                        <h4>Arriving Soon</h4>
                                        <p class="text-muted">Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum
                                            dolor
                                            sitLorem ipsum dolor sitLorem </p>
                                    </div>
                                    <div class="mt-5">
                                        <div class="text-end text-muted">Sun, 25 July 2020, 09:50 PM</div>
                                        <h4>Order Shipped</h4>
                                        <p class="text-muted">Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum
                                            dolor
                                            sitLorem ipsum dolor sitLorem </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                        Please Order An item
                    @endif
                    
                </div>
            </div>
        </div>
        </div>
    </section>
    

    @include('frontend.profile.layouts.footer')
    @include('frontend.profile.layouts.footerlinks')
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>


</body>

</html>