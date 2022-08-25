<!DOCTYPE html>
<html lang="en">

<head>
@include('frontend.layouts.header')
<!-- Main CSS -->
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/main.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bestDeals.css')}}">
</head>
<body class="bg-white">
@include('frontend.layouts.headbar')
  <div class="Aside">
    <div id="asideLink">
      <div id="asideFacebook"><a href="#"><img src="{{asset('frontend/img/fixedFacebook.png')}}" alt=""></a></div>
      <div id="asideTwitter"><a href="#"><img src="{{asset('frontend/img/fixedTwitter.png')}}" alt=""></a></div>
      <div id="asideInstagram"><a href="#"><img src="{{asset('frontend/img/fixedinsta.png')}}" alt=""></a></div>
      <div id="asideSnap"><a href="#"><img src="{{asset('frontend/img/fixedSnap.png')}}" alt=""></a></div>
    </div>
  </div>

  <!-- Ḷogin Modal -->
  <div class="modal fade modle-round" id="UserLogin" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modle-round modal-dialog-centered modal-md">
      <div class="modal-content modle-round1">
        <div class="modal-header bg-c2 text-white  modle-round">
          <h4 class="modal-title text-center fw-700 fs-46 w-100" id="exampleModalLabel">
            User Login
          </h4>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('login')}}" method="POST">
        @csrf
        <div class="modal-body px-2">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="row py-3">
                <div class="col-12 text-center">
                  <img src="{{asset('img/logo.png')}}" width="150px" class="mb-2">
                </div>

              </div>
              <div class="row">
                <label class="form-label text-black fw-bold">Email</label>
                <div class="input-group mb-2">
                  <span class="input-group-text bg-white" id="basic-addon1">
                    <img src="{{asset('frontend/img/emailPlaceholder.png')}}" class="me-1"></span>
                  <input type="text" name="email" class="form-control loginInput emailInput">
                </div>

                <label class="form-label text-black fw-bold">Password</label>
                <div class="input-group mb-2">
                  <span class="input-group-text bg-white" id="basic-addon1">
                    <img src="{{asset('frontend/img/passwordPlaceholder.png')}}" class="me-1">
                  </span>
                  <input type="password" name="password" class="form-control loginInput emailInput">
                  <i class="bi bi-eye-fill fa-1x"></i>
                </div>
                <div class="d-flex justify-content-between">
                  <div><input type="checkbox" id="rememberMe"><label for="rememberMe" class="ms-1 rememberMe">Remember
                      me</label>
                  </div><a href="" class="forgotPassword">Forgot Password?</a>
                </div>

                {{-- <a href=""><img src="{{asset('frontend/img/signInBtn.png')}}" class="mt-2" alt="" width="100%"></a> --}}
                <input type="submit" value="submit">
              </div>

              <div class="row mt-3 py-2">
                <div class="col-12">
                  <p class="text-center">
                    By signing in you agree to our<br>
                    <a href="privacy-policy.html" class="c2-link">Terms of Service & Privacy Policy</a>
                  </p>
                  <p class="text-center text-black-l">OR</p>

                  <button class="loginWithOTPBtn" data-bs-toggle="modal" data-bs-dismiss="modal"
                    data-bs-target="#loginWithOtp"><img src="{{asset('frontend/img/mobilePhone.png')}}" alt="">Login with Mobile
                    OTP</button>
                    
                    <a href="{{route('googlecall')}}">Login with Google</a>
                    <a href="{{route('facebookcall')}}">Login with Facebook</a>

                  <p class="text-center mt-3">Don’t have an account? <a href="#" class="c1-link" data-bs-toggle="modal"
                      data-bs-dismiss="modal" data-bs-target="#SignUp">Sign
                      Up</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </form>
      </div>
    </div>
  </div>
  <!-- ḷogin modal end -->

  <!-- Sign Up Modal -->
  <div class="modal fade modle-round" id="SignUp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modle-round modal-dialog-centered modal-md">
      <div class="modal-content  modle-round1">
        <div class="modal-header bg-c2 text-white  modle-round">
          <h4 class="modal-title text-center fw-700 fs-46 w-100" id="exampleModalLabel">
            Sign Up
          </h4>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body px-2">
          <div class="row">
            <div class="col-md-3"></div>
            <form action="{{route('register')}}" method="POST">
                @csrf
            
            <div class="col-md-6">
              <div class="row py-3">
                <div class="col-12 text-center">
                  <img src="{{asset('img/logo.png')}}" width="150px" class="mb-3">
                </div>

              </div>

              <div class="row">
                <div class="input-group mb-2">
                  <input type="text" name="name" class="form-control border-start" placeholder="Full Name">
                </div>
                <div class="input-group mb-2">
                  <input type="email" name="email" class="form-control border-start" placeholder="Email Address">
                </div>
                <div class="input-group mb-2">
                  <input type="text" name="number" class="form-control border-start" placeholder="Mobile number">
                </div>
                <div class="input-group mb-2">
                  <input type="password" name="password"class="form-control border-start" placeholder="Password">
                </div>
                <div class="d-flex justify-content-between">
                  <div>
                    <input type="checkbox" id=""><label for="" class="ms-1 rememberMe">Get Update On Whatsapp <img
                        src="{{asset('frontend/img/whatappImg.png')}}" alt="" width="31px" height="30.86px"></label>
                  </div>
                </div>
                {{-- <a href=""><img src="{{asset('frontend/img/signInBtn.png')}}" class="mt-2" alt="" width="100%"></a> --}}
                <input type="submit" value="submit">
              </div>
              <div class="row mt-3 py-2">
                <div class="col-12">
                  <p class="text-center">
                    By signing in you agree to our<br>
                    <a href="privacy-policy.html" class="c2-link">Terms of Service & Privacy Policy</a>
                  </p>

                  <p class="text-center mt-3">Already have an account? <a href="#" class="c2-link"
                      data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#UserLogin">Sign
                      In</a></p>
                </div>
              </div>
            </div>
        </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Sign Up Modal Ends -->

  <!-- Login With Mobile -->
  <div class="modal fade modle-round" id="loginWithOtp" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modle-round modal-dialog-centered modal-md">
      <div class="modal-content  modle-round1">
        <div class="modal-header bg-c2 text-white  modle-round">
          <h4 class="modal-title text-center fw-700 fs-46 w-100" id="exampleModalLabel">
            User Login
          </h4>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body px-2">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="row py-3">
                <div class="col-12 text-center">
                  <img src="{{asset('frontend/img/logo.png')}}" width="150px" class="mb-2">
                </div>
              </div>
              <div class="row">
                <label class="form-label text-black fw-bold">Enter your phone number :</label>
                <div class="input-group mb-2">
                  <span class="input-group-text bg-white" id="basic-addon1">
                    <img src="{{asset('frontend/img/flag.png')}}" class=" me-1"> +91
                  </span>
                  <input type="text" class="form-control loginInput">
                </div>
                <a href="#" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#verifyOtp"><img
                    src="{{asset('frontend/img/getOtpBtn.png')}}" class="mt-2" alt="" width="100%"></a>
              </div>
              <div class="row mt-3 py-2">
                <div class="col-12">
                  <p class="text-center">
                    By signing in you agree to our<br>
                    <a href="privacy-policy.html" class="c1-link">Terms of Service & Privacy Policy</a>
                  </p>
                  <p class="text-center text-black-l">OR</p>

                  <button class="loginWithOTPBtn" data-bs-toggle="modal" data-bs-dismiss="modal"
                    data-bs-target="#loginWithOtp"><img src="{{asset('frontend/img/GmailLogo.png')}}" alt="" data-bs-toggle="modal"
                      data-bs-target="#UserLogin">Login with Gmail
                    Account</button>

                  <p class="text-center mt-3">Don’t have an account? <a href="#" class="c1-link" data-bs-toggle="modal"
                      data-bs-dismiss="modal" data-bs-target="#SignUp">Sign
                      Up</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login With Mobile ends-->

  <!-- Login With Mobile 2 -->
  <div class="modal fade modle-round" id="loginWithOtpSecond" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modle-round modal-dialog-centered modal-md">
      <div class="modal-content  modle-round1">
        <div class="modal-header bg-c2 text-white  modle-round">
          <h4 class="modal-title text-center fw-700 fs-46 w-100" id="exampleModalLabel">
            User Login
          </h4>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body px-2">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="row py-3">
                <div class="col-12 text-center">
                  <img src=""{{asset('frontend/img/logo.png')}}" width="150px" class="mb-2">
                </div>
              </div>
              <div class="row">
                <label class="form-label text-black fw-bold">Enter your phone number :</label>
                <div class="input-group mb-2">
                  <span class="input-group-text bg-white" id="basic-addon1">
                    <img src=""{{asset('frontend/img/flag.png')}}" class=" me-1"> +91
                  </span>
                  <input type="text" class="form-control">
                </div>
                <div class="input-group mb-2">
                  <input type="text" class="form-control border-start w-100" placeholder="One Time OTP">
                  <span id="resendOtp">Resend OTP</span>
                </div>
                <a href=""><img src="{{asset('frontend/img/submitBtn.png')}}" class="mt-2" alt="" width="100%"></a>
              </div>
              <div class="row mt-3 py-2">
                <div class="col-12">
                  <p class="text-center">
                    By signing in you agree to our<br>
                    <a href="privacy-policy.html" class="c1-link">Terms of Service & Privacy Policy</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login With Mobile 2 ends -->

  <!-- Verify Otp modal -->
  <div class="modal fade modle-round" id="verifyOtp" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modle-round modal-dialog-centered modal-md">
      <div class="modal-content  modle-round1">
        <div class="modal-header bg-c2 text-white  modle-round">
          <h4 class="modal-title text-center fw-700 fs-46 w-100" id="exampleModalLabel">
            Verify OTP
          </h4>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body px-2">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="row py-3">
                <div class="col-12 text-center">
                  <img src=""{{asset('frontend/img/logo.png')}}" width="150px" class="mb-2">
                </div>

              </div>
              <div class="row">
                <label class="form-label text-black text-center mt-5 fw-bold">Code Sent to +91-9876543210</label>
                <div class="mb-2 d-flex justify-content-between">
                  <input type="number" class="otp ">
                  <input type="number" class="otp ">
                  <input type="number" class="otp ">
                  <input type="number" class="otp ">
                </div>
                <p class="text-muted text-center">38 S</p>
                <p class="text-muted text-center">Didn’t receive the code? <a href="" class="c1-link">Resend</span>

                    <a href=""><img src="{{asset('frontend/img/submitBtn.png')}}" class="mt-2" alt="" width="100%"></a>
              </div>
              <div class="row mt-3 py-2">
                <div class="col-12">
                  <p class="text-center">
                    By signing in you agree to our<br>
                    <a href="privacy-policy.html" class="c1-link">Terms of Service & Privacy Policy</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Verify Otp modal ends -->

  <section class="homeSection">
    <div class="owl-carousel" id="homePageCarousel">
      @foreach ($banners as $item)
      <div>
        <img src="{{asset('banner').'/'.$item->image}}" class="bannerImg " alt="">
      </div>    
      @endforeach
      
    </div>
    </div>
    </div>
  </section>
  <div class="mx-auto">
    <div class="owl-navigation owl-navigation-homePage_carousel">
      <span class="owl-nav-prev"><img src="{{asset('frontend/img/banner/leftArrow.png')}}" alt="" width="100%"></span>
      <span class="owl-nav-next"><img src="{{asset('frontend/img/banner/rightArrow.png')}}" alt="" width="100%"></span>
    </div>
  </div>
  <section class="ourProducts">
    <!-- <h1 class="text-center text-uppercase">Products</h1> -->
    <h1 class="text-center text-uppercase">Offer / Products</h1>
    <div class="hr"></div>
    <div class="container">
      <div class="row">
        @foreach ($products as $item)
          <div class="col-md-3 mt-2 col-6 offerProduct">
            <a href="products.html" class="text-decoration-none">
              <div class="discount">
                {{$item->discount}}% off
              </div>
              <img src="{{asset('product').'/'.$item->image}}" alt="" class="d-block mx-auto">
              <h4 class="text-center">{{$item->name}} {{$item->weight}}{{$item->unit}}</h4>
              <div class="d-flex align-items-center justify-content-center">
                <h5 class="me-3">₹ {{(100 - $item->discount)*$item->price/100}}</h5>
                <h6>₹ {{$item->price}}</h6>
              </div>
              <div class="d-flex justify-content-center">
                <form action="{{route('cart.add')}}" method="POST">
                  @csrf
                  <input type="hidden" name="product_id" value="{{$item->id}}">
                  
                  <button  type="submit" class="addToCartBtn mx-auto mt-3 px-3 py-1">
                    <i class="fa-solid fa-cart-shopping"></i> Add to Cart</button>
                  
                </form>
                  
              </div>
              <!-- <div class="brownCard">
                <h5>Gas ki Fakki 1000gm</h5>
                <h4>Discount 15% + free courier charges</h4>
              </div> -->
              <div class="d-flex justify-content-between mt-5 px-3">
                <div>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                </div>
                <div class="reviewText">100 reviews</div>
              </div>
            </a>
          </div>

        @endforeach
              
        
      </div>
    </div>
  </section>
 
  </div>
  
  <div class="otherProducts mt-5">
    <h1 class="text-center text-uppercase">Our products</h1>
    <div class="hr"></div>
    <a href="products.html"> <img src="{{asset('frontend/img/viewMore.png')}}" class="d-block ms-auto me-3 mt-3" alt=""></a>
    <div class="owl-carousel mt-3 bestDealsProductsCarousel owl-theme">
      
      @foreach ($ourproducts as $item)
      <div class="item pb-2">
        <div class="ourProductSingle">
          <img src="{{asset('product').'/'.$item->image}}" alt="" class="ProductSingleImg d-block mx-auto">
          <h3 class="ourProductSingleH3 text-center">{{$item->name}}</h3>
          <p class="ourProductSingleP">{{$item->description}}</p>
          <div class="d-flex justify-content-around mt-3 mb-3">
            <form action="{{route('cart.add')}}" method="POST">
                  @csrf
                  <input type="hidden" name="product_id" value="{{$item->id}}">
                  
                  <button  type="submit" class="btn btn-primary btn-red shop-now">
                    Add to Cart</button>
                  
            </form>
            {{-- <a href="cart.html"><button class="btn btn-primary btn-red shop-now">Add to Cart</button></a> --}}
            <a href="products.html"> <img src="{{asset('frontend/img/viewInfo.png')}}" class="d-block mx-auto infoBtn fit-img" alt=""></a>
          </div>
        </div>
      </div>
          
      @endforeach
    </div>
  </div>
  <div class="mediaCoverage mt-5">
    <h1 class="text-center text-uppercase">media coverages</h1>
    <div class="hr"></div>
    <div class="row">
      @foreach ($medias as $item)
          
      <div class="mt-5 col-lg-3 col-6">
        <div class="mediaCoverageCard mx-auto" id="mediaCoverageCard{{$item->id}}}">
          <iframe width="100%" height="100%" src="{{$item->url}}"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen style="border-radius: 45px;"></iframe>
        </div>
      </div>
      @endforeach
      
    </div>
  </div>

  <section class="mt-5 success">
    <h1 class="text-center text-light text-uppercase">Success we achieve so far</h1>
    <div class="hr"></div>
  </section>
  <div class="container-md">
    <div class="row whiteSquarerow">
      <div class="col-3 whiteSquare mt-5">
        <img src="{{asset('frontend/img/globe.png')}}" class="d-block mx-auto pt-sm-3 pt-2" alt="">
        <h1><span class="counter">5</span></h1>
        <p>Countries Covered</p>
      </div>
      <div class="col-3 whiteSquare mt-5">
        <img src="{{asset('frontend/img/trust.png')}}" class="d-block mx-auto pt-sm-3 pt-2" alt="">
        <h1><span class="counter">1400</span>+</h1>
        <p>Trusted Customers</p>
      </div>
      <div class="col-3 whiteSquare mt-5">
        <img src="{{asset('frontend/img/document.png')}}" class="d-block mx-auto pt-sm-3 pt-2" alt="">
        <h1><span class="counter">1400</span>+</h1>
        <p>Years in this field</p>
      </div>
      <div class="col-3 whiteSquare mt-5">
        <img src="{{asset('frontend/img/research.png')}}" class="d-block mx-auto pt-sm-3 pt-2" alt="">
        <h1><span class="counter">1400</span>+</h1>
        <p>Research Done</p>
      </div>
    </div>
  </div>

  @extends('frontend.layouts.footer')

</body>

</html>