<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.profile.layouts.headerlinks')

  <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/main.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/responsive.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/products.css')}}">

</head>

<body class="bg-white">
    @include('frontend.profile.layouts.header')
  <section class="z-index-1 mb-3">
    <div class="container-fluid px-3 px-lg-5 pt-lg-3">
      <div class="row ">
        @include('frontend.profile.layouts.sidebar')

        <div class="col-lg-9 pt-lg-5 mt-lg-5 pb-5 px-md-5">
          <div class="d-flex justify-content-between">
              <h3 class="fs-32 fw-600 text-black">Order history</h3>
              <div>
                  <div class="dropdown me-sm-5">
                      <button class="btn filterBtn" type="button" id="dropdownMenuButton1"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          <div class="filter pt-2">
                              <i class="bi bi-funnel-fill"></i>
                          </div>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                          <li><a class="dropdown-item" href="{{route('profile.history',0)}}">Processing</a></li>
                          <li><a class="dropdown-item" href="{{route('profile.history',1)}}">Completed</a></li>
                          <li><a class="dropdown-item" href="{{route('profile.history',2)}}">Canceled</a></li>

                      </ul>
                  </div>
              </div>
          </div>
          <div class="row orderHeadings d-flex align-items-center text-center justify-content-center">
              <div class="col-3 text-light">Order name</div>
              <div class="col-2 text-light">Order ID</div>
              <div class="col-2 text-light">Status</div>
              <div class="col-1 text-light">QTY</div>
              <div class="col-2 text-light">Total</div>
              <div class="col-2"></div>
          </div>
          
              @foreach($order as $item)
                  <div class="row orderContent">
                    <div class="col-3 text-muted">{{$item->product->name}}</div>
                    <div class="col-2 text-muted">{{$item->track_id}}</div>
                    <div class="col-2 text-muted">@if($item->status == 0)
                        Processing
                    @elseif($item->status == 2)
                        Cancled
                    @else
                      Delivered
                    @endif </div>
                    <div class="col-1 text-muted">{{$item->quantity}}</div>
                    <div class="col-2 text-muted">Rs {{$item->total}}</div>
                    <div class="col-2"><button class="detailsBtn" data-bs-toggle="modal"
                            data-bs-target="#detailsModal{{$item->id}}">Details</button></div>
                </div>    
                @endforeach
          
          
          

      </div>
    </div>
      @foreach ($order as $item)
          
      <div class="modal" id="detailsModal{{$item->id}}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="rightSide border-0 px-4">
                        <p class="arrvingOn">Arriving on will be updated soon</p>
                        <div class="row">
                            <div class="col-3 blackContent"></div>
                            <div class="col-6 content"></div>
                            <div class="col-3 blackContent">Rs {{$item->total}}</div>
                        </div>
                        <hr>
                        
                        <hr>
                        <div class="row mt-2">
                            <div class="col-3 blackContent">Payment</div>
                            <div class="col-6"></div>
                            <div class="col-3 blackContent">{{$item->payment}}</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <div class="blackContent">Shipping Address</div>
                            </div>
                            <div class="col-6">
                                <div class="addressorderPlaced">{{$item->address->address}},{{$item->address->city}},{{$item->address->state}},{{$item->address->pincode}}
                                </div>
                            </div>
                        </div>
                        <hr>
                        {{-- <button class="downloadBtn mt-3"><img src="{{asset('frontend/img/pdf.png')}}" alt="">Download</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

      @endforeach   

  </section>

  
  @include('frontend.profile.layouts.footer')
    @include('frontend.profile.layouts.footerlinks')
  <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('frontend/js/main.js')}}"></script>


</body>

</html>