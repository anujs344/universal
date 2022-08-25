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
    <div id="searchBar" class="mt-5">
        <label for="search" class="border-end pe-2"><img src="./img/search.png" alt=""></label>
        <input type="text" id="search" placeholder="Search Products Here" class="ms-3">
    </div>
    <div class="d-flex justify-content-between mt-5">
        <div class="ms-3">
            <h2>Products</h2>
            <p>Showing 50 results (0.50 seconds)</p>
        </div>
        <div class="preview d-sm-flex d-none align-items-center me-3">
            <div class="view " id="list"><img src="./img/viewList.png" class="mx-auto d-block mt-2" alt=""></div>
            <div class="view actived" id="grid"><img src="./img/viewGrid.png" alt="" class="mx-auto d-block mt-1"></div>
        </div>

    </div>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <div class="greenFiter">
                <img src="./img/filter.png" alt="" class="mt-3 ms-2 float-start">
                <div class="text-center text-light mx-auto pt-2 fs-24">FILTER</div>
            </div>
            <div class="filter1 mx-3">
                <br>
                <i class="bi bi-chevron-right ms-3 me-2"></i> <span class="categories">All Categories</span>
                <br> <i class="bi bi-chevron-right ms-3 me-2"></i> <span class="categories">Diabetes</span>
                <br> <i class="bi bi-chevron-right ms-3 me-2"></i> <span class="categories">Digestion</span>
                <br> <i class="bi bi-chevron-right ms-3 me-2"></i> <span class="categories">Teeth</span>
                <br> <i class="bi bi-chevron-right ms-3 me-2"></i> <span class="categories">Energy</span>
            </div>
            <div class="filter2">
                <div class="accordion mx-3 mt-3" id="accordionExample">
                    <div class="accordion-item mt-3 border-top">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Collapsed filters
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <input type="checkbox"> <label for="">5% Discount</label><br>
                                <input type="checkbox"> <label for="">5% Discount</label><br>
                                <input type="checkbox"> <label for="">5% Discount</label><br>
                                <input type="checkbox"> <label for="">5% Discount</label><br>
                                <input type="checkbox"> <label for="">5% Discount</label><br>
                                <input type="checkbox"> <label for="">5% Discount</label><br>
                                <input type="checkbox"> <label for="">5% Discount</label><br>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mt-3 border-top">
                        <h2 class=" accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Expanded Filters
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <input type="checkbox"> <label for="">Recommended</label><br>
                                <input type="checkbox"> <label for="">Recently Added</label><br>
                                <input type="checkbox"> <label for="">Expiring Soon</label><br>
                                <input type="checkbox"> <label for="">Most Rated</label><br>
                                <input type="checkbox"> <label for="">Price: Low → High</label><br>
                                <input type="checkbox"> <label for="">Price: High → Low</label><br>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item mt-3 border-top">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Discount Offers
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <input type="checkbox"> <label for="">5% Discount</label><br>
                                <input type="checkbox"> <label for="">5% Discount</label><br>
                                <input type="checkbox"> <label for="">5% Discount</label><br>
                                <input type="checkbox"> <label for="">5% Discount</label><br>
                                <input type="checkbox"> <label for="">5% Discount</label><br>
                                <input type="checkbox"> <label for="">5% Discount</label><br>
                                <input type="checkbox"> <label for="">5% Discount</label><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9" id="products">
            <div class="ms-3 mt-3">
                <span>Related</span>
                <span class="greyBg">Digestion</span>
                <span class="greyBg">Teeth</span>
                <span class="greyBg">Diabetes</span>
            </div>
            <div class="singleProduct">
                <div class="d-flex flex-wrap justify-content-center ms-2 w-100">
                    @foreach ($datas as $item)
                        
                    <div class="productCard singleProductCard me-3 mt-3">
                        <div class="productImg">
                            <img src="{{asset('product').'/'.$item->image}}" class="d-block mx-auto pt-5" alt="">
                        </div>
                        <div>
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <h2 class="ms-2">{{$item->name}}</h2>
                                    <div class="rating d-flex me-3 align-items-center">
                                        <img src="{{asset('frontend/img/star.png')}}" class="ms-2 me-2" alt="" width="18px" height="18px">
                                        <div class="ratingPoints text-center pe-3 text-light">4.3</div>
                                    </div>
                                </div>
                            </div>
                            <div class="price d-flex flex-wrap">
                                <span class="greenPrice">Rs {{(100-$item->discount)*$item->price/100}}</span>
                                <span class="greyPrice">Rs {{$item->price}}</span>
                                <span class="greenOff">{{$item->discount}}% Off</span>
                            </div>
                            <div>
                                <p class="d-none">{{$item->description}}</p>
                            </div>
                            <div class="d-flex justify-content-around mt-3 mb-1">
                                <!-- <div class="like ms-4"> -->
                                <div class="d-flex align-items-end">
                                    <!-- <img src="./img/hollowHeart.png" alt="" width="27px" height="24px"> -->
                                    <form method="Post" action="{{route('wishlist.add')}}">@csrf
                                        <input type="hidden" name="product_id" value="{{$item->id}}">
                                        <button type="submit"class="btn btn-primary btn-red">wishlist</button>
                                    </form>
                                    {{-- <a href=""><button class="btn btn-primary btn-red">wishlist</button></a> --}}
                                </div>
                                <!-- <a href=""><button class="btn btn-primary">wishlist</button></a> -->
                                <!-- <a href="productDetails.html"><img src="./img/shopNowBtn.png" class="me-3" width="130px"
                                        alt=""></a> -->
                                        <form method="Post" action="{{route('cart.add')}}">@csrf
                                            <input type="hidden" name="product_id" value="{{$item->id}}">
                                            <button type="submit"class="btn btn-primary btn-red shop-now">Add to Cart</button>
                                        </form>
                                        <!-- <a href="cart.html"><button class="btn btn-primary btn-red">Add to Cart</button></a> -->
                            </div>
                        </div>

                    </div>
                    @endforeach
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href=""> <img src="./img/viewMore.png" class="d-block mx-auto mt-5" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.layouts.footer')
    <!-- Main JavaScript -->
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>


</body>

</html>