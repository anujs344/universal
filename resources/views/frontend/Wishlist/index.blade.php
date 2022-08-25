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
        <label for="search" class="border-end pe-2"><img src="{{asset('/img/search.png')}}" alt=""></label>
        <input type="text" id="search" placeholder="Search Products Here" class="ms-3">
    </div>
    <div class="container">
        <h2 id="wishListHeading">Wishlist</h2>
        <div class="singleProduct">
            @foreach ($wishlist as $item)

            <div class="d-flex flex-wrap justify-content-center ms-2 w-100">
                <div class="productCardList singleProductCard me-3 mt-3 row">
                    <div class="col-md-4">
                        <img src="{{asset('product').'/'.$item->product->image}}"  class="d-block mx-auto pt-5" style="height: 250px;width:250px" alt="">
                    </div>
                    <div class="col-md-8">
                        <div class="">
                            <div class="d-flex justify-content-between">
                                <h2 class="ms-2">{{$item->product->name}}</h2>
                                <div class="d-flex me-3 align-items-center">

                                    <a href="{{route('wishlist.delete',$item->id)}}"> <img src="{{asset('frontend/img/deleteIcon.png')}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="price">
                            <span class="greenPrice">Rs {{(100-$item->product->discount)*$item->product->price/100}}</span>
                            <span class="greyPrice">Rs {{$item->product->price}}</span>
                            <span class="greenOff">{{$item->discount}}% Off</span>
                        </div>
                        <div class="rating d-flex align-items-center">
                            <img src="{{asset('frontend/img/star.png')}}" class="ms-2 me-2" alt="" width="18px" height="18px">
                            <div class="ratingPoints text-center pe-3 text-light">4.3</div>
                        </div>
                        <div>
                            <p class="text-muted mx-2">{{$item->product->description}}</p>
                        </div>
                        <div class="d-flex justify-content-end mt-2 mb-2">
                            <div class="like me-4">
                                <img src="{{asset('frontend/img/whiteHeartIcon.png')}}" alt="" width="27px" height="24px">
                            </div>
                            <a href=""><img src="{{asset('frontend/img/buyNowBtn.png')}}" class="me-3" width="130px" alt=""></a>
                            <a href="{{route('wishlist.addtocart',$item->id)}}"><img src="{{asset('frontend/img/addAllToCart.png')}}" class="me-3" width="130px" alt=""></a>

                        </div>
                    </div>
                </div>
            </div>
                
            @endforeach
            <div class="mt-4 d-flex justify-content-end">
                <button class="clearAll me-5">Clear All</button>
                <a href="{{route('wishlist.addalltocart')}}"> <img src="{{asset('frontend/img/addAllToCart.png')}}" class="addToCart" alt=""></a>
            </div>
        </div>
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
            {{-- //foreachloop --}}
        </div>
        <a href="#"><img src="{{asset('frontend/img/viewMore.png')}}" class="d-block mx-auto mt-5" alt=""></a>
    </div>
@include('frontend.layouts.footer')
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>


</body>

</html>