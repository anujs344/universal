<!DOCTYPE html>
<html lang="en">

<head>

    @include('frontend.layouts.header')
  <!-- Main CSS -->
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/main.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/responsive.css')}}">


</head>

<body class="bg-white">
  
    @include('frontend.layouts.headbar')
  <section class="z-index-1">
    <div class="container-fluid bg-top bg-cu">
      <div class="row">
        <div class="col-12 t-h-text text-center ">
          Contact Us
        </div>
      </div>
    </div>
  </section>

  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mb-3">
          <div class="right-cur-bo-box  p-5 d-flex">
            <p class="fw-600 fs-22 text-black-7 d-flex width-fc">
              <i class="fas fa-map-marker-alt c1-u me-1 pad-top"></i>
              <!-- OFFICE ( Head Office )<br>
              <span class="ms-3">NCR West</span> -->
            
            <p class="ps-3 fw-600 fs-22 text-black-7">
              Healthcare medicines,<br> Shop no. 20, Gandhi market, <br>Bathinda, Punjab-151001
              <!-- Bldg. No. V/5, 1st Floor Supreme Tower <br>
              Near South Chalakudy <br>
              NCR, India. 5544455 <br>
              Contact:+91 7853552 <br> -->
              <!-- abc@mail.com -->
            </p>
            </p>
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <div class="left-cur-bo-box  p-4">
            <h4 class="text-center fs-30 fw-700  text-black-7"> Get In Touch</h4>
            <p class="fs-18 fw-400  text-black-6">
              
            </p>

            <form action="{{route('contactus.create')}}" method="post">
                @csrf
              <div class="row">
                <div class="col-md-6 mb-3">
                  <input type="text" name="name" class="form-control w-100" placeholder="Your Name*">
                </div>
                <div class="col-md-6 mb-3">
                  <input type="email" name="email" class="form-control" placeholder="Email ID*">
                </div>

                <div class="col-md-12 mb-3">
                  <input type="text" name="subject" class="form-control" placeholder="Subject*">
                </div>
                <div class="col-md-12 mb-3">
                  <textarea class="form-control" name="message" placeholder="Type Your Messege*" rows="3"></textarea>
                </div>
                <div class="col-md-12 pt-2 text-center">
                  <button type="submit" class="btn btn-c1">Send Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2899.2894268341247!2d74.93541411877047!3d30.21266812718674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3917329071e611a1%3A0x1e9e7ce4184f4766!2sGandhi%20Market!5e0!3m2!1sen!2sin!4v1653914749974!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map-width"></iframe></p>
  </section>
    @include('frontend.layouts.footer')
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>


</body>

</html>