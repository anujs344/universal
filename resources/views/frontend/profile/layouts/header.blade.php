<section class="all-menu relative">
    

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.html"><img src="{{asset('frontend/img/logo.png')}}" width="210px" height="65px" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mt-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('Home')}}">Home</a>
            </li>
            <li class="nav-item">
              <!-- <a class="nav-link" href="bestDeals.html">Products</a> -->
              <a class="nav-link" href="{{route('guest.product.show')}}">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dealership.html">Dealership</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about-us.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('contactus.show')}}">Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('user.career.show')}}">Career</a>
            </li>
          </ul>
          {{-- <div class="d-flex">
            <div class="like ms-4">
                @auth
                <a href="{{route('wishlist.show')}}"><img src="{{asset('frontend/img/heart.png')}}" class="me-md-5 mt-4 me-3 red-color" alt=""></a>             
                <a href="{{route('cart.show')}}"><img src="{{asset('frontend/img/cart.png')}}" class="me-md-5 mt-3 me-3" alt=""></a>
                <div class="dropdown loginBtn">
                  <button class="btn w-100 h-100 fw-700 dropDownBtn fs-20 text-white" type="button"
                      id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><img
                          src="{{asset('frontend/img/user.png')}}" alt="" class="me-2">User</button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                      <li><a class="dropdown-item" href="">Logout</a></li>
                  </ul>
                </div>
                @else

                <button class="loginBtn" data-bs-toggle="modal" data-bs-target="#UserLogin">Login</button>

                @endauth
            </div>
          </div> --}}
          <div class="d-flex">
            <div class="like ms-4">
              
            <a href="{{route('wishlist.show')}}"><img src="{{asset('frontend/img/heart.png')}}" class="me-md-5 mt-4 me-3 red-color" alt=""></a>
          ``</div>
            <a href="{{route('cart.show')}}"><img src="{{asset('frontend/img/cart.png')}}" class="me-md-5 mt-3 me-3" alt=""></a>
            @auth
            <div class="dropdown loginBtn">
              <button class="btn w-100 h-100 fw-700 dropDownBtn fs-20 text-white" type="button"
                  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><img
                      src="{{asset('frontend/img/user.png')}}" alt="" class="me-2">User</button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="{{route('profile.show')}}">Profile</a></li>
                  <li><a class="dropdown-item" href="{{route('user.logout')}}">Logout</a></li>
              </ul>
          </div>
            @else
            <button class="loginBtn" data-bs-toggle="modal" data-bs-target="#UserLogin">Login</button>

            @endauth
          </div>
        </div>
      </div>
    </nav>


  </section>