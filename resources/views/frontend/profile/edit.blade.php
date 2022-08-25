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

        <div class="col-lg-9 p-3 pt-lg-5 mt-lg-5 pb-5 px-4">

            <h3 class="mb-3 fs-32 fw-600 text-black">Edit Account</h3>
  
            <form action="{{route('profile.update')}}" method="post">
                @csrf
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="fs-12 fw-400 text-blue-d">First Name</label>
                  <input type="text" value="{{Auth::user()->name}}" name="name" placeholder="First Name" class="form-control w-90" required>
                </div>
                
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="fs-12 fw-400 text-blue-d">Phone Number</label>
                  <input type="text" value="{{Auth::user()->number}}" name="number" placeholder="Phone Nuber" class="form-control w-90">
                </div>
                <div class="col-md-6 mb-3">
                  <label class="fs-12 fw-400 text-blue-d">E-Mail</label>
                  <input type="text" value="{{Auth::user()->email}}" name="email" placeholder="E-mail" class="form-control w-90">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 mb-3">
                  <a href="#" class="float-end me-5 c1-link fs-18 fw-700 mt-2" data-bs-toggle="modal"
                    data-bs-target="#change-password"><u>Change Password</u></a>
                </div>
              </div>
              <div class="row">
                <div class="col-12 text-center py-3">
                  <button class="btn-c1" type="submit">Update</button>
                </div>
              </div>
            </form>
  
            <!-- Modal Change Password-->
            <div class="modal fade modle-round" id="change-password" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog  modal-dialog-centered modle-round  modal-md">
                <div class="modal-content  modle-round1">
                  <div class="modal-header bg-c2 text-white  modle-round">
                    <h4 class="modal-title text-center fw-700 fs-46 w-100" id="exampleModalLabel">
                      Password Change
                    </h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                      aria-label="Close"></button>
                  </div>
                  <div class="modal-body px-2">
                    <div class="row">
                      <div class="col-md-3"></div>
                      <div class="col-md-6">
                        <div class="row py-3">
                          <div class="col-12 text-center">
                            <img src="img/logo.png" width="150px">
                            <p class="fs-14 fw-400 text-black-9 mt-5"> Enter Your Registered Mobile Number Or Email
                              Address
                              To Get OTP</p>
                          </div>
                        </div>
                        <div class="row">
                          <label class="form-label text-black fw-bold">Mobile number</label>
                          <div class="input-group mb-3">
                            <input type="text" class="form-control">
                          </div>
                          <p class="mt-3 mb-3 text-muted text-center">OR</p>
                          <label class="form-label text-black fw-bold">Email</label>
                          <div class="input-group mb-3">
                            <input type="email" class="form-control">
                          </div>
                          <a href="#" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#passwordChangeOtp">
                            <img src="{{asset('frontend/img/submitBtn.png')}}" class="mt-3 mb-5 pb-4" alt="" width="100%"></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal change Password ends -->
            <!-- password Change Modal -->
            <div class="modal fade modle-round" id="passwordChangeOtp" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modle-round modal-dialog-centered modal-md">
                <div class="modal-content  modle-round1">
                  <div class="modal-header bg-c2 text-white  modle-round">
                    <h4 class="modal-title text-center fw-700 fs-46 w-100" id="exampleModalLabel">
                      Verify OTP
                    </h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                      aria-label="Close"></button>
                  </div>
                  <div class="modal-body px-2">
                    <div class="row">
                      <div class="col-md-3"></div>
                      <div class="col-md-6">
                        <div class="row py-3">
                          <div class="col-12 text-center">
                            <img src="img/logo.png" width="150px" class="mb-3">
                          </div>
  
                        </div>
                        <div class="row">
                          <label class="form-label text-black text-center mt-5 fw-bold mb-3">Code Sent to
                            +91-9876543210</label>
                          <div class="mb-3 d-flex justify-content-between">
                            <input type="number" class="otp ">
                            <input type="number" class="otp ">
                            <input type="number" class="otp ">
                            <input type="number" class="otp ">
                          </div>
                          <p class="text-muted text-center">38 S</p>
                          <p class="text-muted text-center mb-3">Didn’t receive the code? <a href=""
                              class="c1-link">Resend</span>
  
                              <a href="" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#newPassword"><img
                                  src="{{asset('frontend/img/submitBtn.png')}}" class="mt-2" alt="" width="100%"></a>
                        </div>
                        <div class="row mt-3 py-2">
                          <div class="col-12 mb-5 pb-2">
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
            <!-- password Change Modal ends-->
  
            <!-- new password modal -->
            <div class="modal fade modle-round" id="newPassword" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog  modal-dialog-centered modle-round  modal-md">
                <div class="modal-content  modle-round1">
                  <div class="modal-header bg-c2 text-white  modle-round">
                    <h4 class="modal-title text-center fw-700 fs-46 w-100" id="exampleModalLabel">
                      Password Change
                    </h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                      aria-label="Close"></button>
                  </div>
                  <div class="modal-body px-2">
                    <div class="row">
                      <div class="col-md-3"></div>
                      <div class="col-md-6">
                        <div class="row py-3">
                          <div class="col-12 text-center">
                            <img src="{{asset('frontend/img/logo.png')}}" width="150px">
                            <p class="fs-18 fw-400 text-black-9 mt-5">New password must be different from previous
                              password</p>
                          </div>
                        </div>
                        <div class="row">
                          <label class="form-label text-black fw-bold">New Password</label>
                          <div class="input-group mb-3">
                            <input type="text" class="form-control">
                          </div>
                          <label class="form-label text-black fw-bold mt-3">Confirm Password</label>
                          <div class="input-group mb-5">
                            <input type="email" class="form-control">
                          </div>
                          <a href="">
                            <img src="{{asset('frontend/img/submitBtn.png')}}" class="mt-3 mb-5 pb-5" alt="" width="100%"></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- new password modal ends -->
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