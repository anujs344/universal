<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.profile.layouts.headerlinks')

  <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/main.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/responsive.css')}}">

</head>

<body class="bg-white">
  
    @include('frontend.profile.layouts.header')
  <section class="z-index-1 mb-3">
    <div class="container-fluid px-3 px-lg-5 pt-lg-3">
      <div class="row ">
        @include('frontend.profile.layouts.sidebar')

        <div class="col-lg-9 pt-lg-5 mt-lg-5 pb-5 px-md-4">

          <h3 class="mb-3 fs-32 fw-600 text-black">Account Details</h3>
          <p class="text-black-5 fs-16 fw-400">From your account dashboard you can view your recent orders, manage your
            shipping and billing addresses, and edit your password and account details.</p>

          <h6 class="text-end"><a href="{{route('profile.edit')}}" class="c1-link fw-bold"><i
                class="fa fa-pencil-alt"></i> Edit </a> </h6>

          <div class="ac-detail-box  p-4 my-4">
            <p class="edit-p">
              First Name
              <span class="float-end edit-r">{{Auth::user()->name}}</span>
            </p>
            <p class="edit-p">
              Phone Number
              <span class="float-end edit-r">+91-{{Auth::user()->name}}</span>
            </p>
            <p class="edit-p">
              E-Mail
              <span class="float-end edit-r">{{Auth::user()->email}}</span>
            </p>
            <p class="edit-p">
              Password
              <span class="float-end edit-r">**************** </span>
            </p>

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