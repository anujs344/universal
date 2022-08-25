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

    <!-- Add Card Modal -->
    <div class="modal" tabindex="-1" id="addCard">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- <div class="modal-header"> -->
                <button type="button" class="btn-close ms-auto mt-3 me-3" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <!-- </div> -->
                <div class="modal-body">
                    <h5 class="text-center">Add your payment methods</h5>
                    <p class="text-center text-muted">This card will only be charged <br> when you place an order.</p>
                    <div class="mb-3 mt-4 mx-sm-5 ">
                        <label class="form-label text-black fw-bold">Card Number</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-white" id="basic-addon1">
                                <img src="{{asset('frontend/img/cardIcon.png')}}" class="me-1"></span>
                            <input type="number" class="form-control loginInput">
                        </div>
                        <div class="d-flex">
                            <div>
                                <label class="form-label text-black fw-bold">Expiry Date</label>
                                <div class="input-group mb-3 w-70">
                                    <input type="number" class="form-control" placeholder="MM/YY">
                                </div>
                            </div>
                            <div>
                                <label class="form-label text-black fw-bold">CVV Number</label>
                                <div class="input-group mb-3 w-70">
                                    <input type="number" class="form-control">
                                </div>
                            </div>
                        </div>
                        <a href="#"><img src="{{asset('frontend/img/addCard.png')}}" class="d-block mx-auto" alt=""></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Add Card Modal ends-->

    <div id="searchBar" class="mt-5">
        <label for="search" class="border-end pe-2"><img src="{{asset('frontend/img/search.png')}}" alt=""></label>
        <input type="text" id="search" placeholder="Search Products Here" class="ms-3">
    </div>
    <form action="{{route('user.place.order')}}" method="post">
        @csrf
        <div class="container mt-3">
            <h2 id="checkOutHeading">Checkout</h2>
            <div class="row">
                <div class="col-md-7 col-12">
                    
                    <div class="row mt-5">
                        <div class="col-6 px-2">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label shippingLabels">Full Name :</label>
                                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-2">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label shippingLabels">Email Address
                                    :</label>
                                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" required>
                            </div>
                        </div>
                        <div class="col-6 px-2">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label shippingLabels">Phone Number
                                    :</label>
                                <input type="text" name="number" class="form-control" id="exampleFormControlInput1" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-2">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label shippingLabels">Address :</label>
                                <input type="text" name="address" class="form-control" id="exampleFormControlInput1" required>
                            </div>
                        </div>
                        <div class="col-6 px-2">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label shippingLabels">State :</label>
                                <input type="text" name="state" class="form-control" id="exampleFormControlInput1" required>

                                {{-- <div class="dropdown">
                                    <a class="btn border border-2 dropdown-toggle w-100 stateDropDown text-end" href="#"
                                        role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    </a>
                                    <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-2">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label shippingLabels">Pin Code :</label>
                                <input type="text" name="pincode" class="form-control" id="exampleFormControlInput1" required>
                            </div>
                        </div>
                        <div class="col-6 px-2">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label shippingLabels">Town/City :</label>
                                <input type="text" name="city" class="form-control" id="exampleFormControlInput1" required>

                                {{-- <div class="dropdown">
                                    <a class="btn border border-2 dropdown-toggle w-100 stateDropDown text-end" href="#"
                                        role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    </a>
                                    <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    {{-- <div>
                        <label class="selectCheckBox">Save Address
                            <input type="checkbox">
                            <span class="mark"></span>
                        </label>
                    </div> --}}

                </div>
                <div class="col-md-5 col-12 rightSide px-4">
                    <h1>My Order</h1>
                    <div class="row">
                        <div class="col-3 blackContent"></div>
                        <div class="col-6 content"></div>
                        <div class="col-3 blackContent">Rs {{$total}}</div>
                    </div>
                    <hr>
                    <div class="row mt-2">
                        <div class="col-3 content">Sub Total</div>
                        <div class="col-6 content"></div>
                        <div class="col-3 blackContent">Rs {{$total + $discount}}</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-3 content">Shipping Fee</div>
                        <div class="col-6 content text-end pe-1">( Free Shipping Cost )</div>
                        <div class="col-3 blackContent">Rs 00</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-3 content">Tax</div>
                        <div class="col-6 content text-end"></div>
                        <div class="col-3 blackContent">Rs 00</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-3 content">Discount</div>
                        <div class="col-6 content text-end">-</div>
                        <div class="col-3 blackContent">Rs {{$discount}}</div>
                    </div>
                    <hr>
                    <div class="row mt-2">
                        <div class="col-3 blackContent">Order Total</div>
                        <div class="col-6"></div>
                        <div class="col-3 orderTotal">Rs {{$total}}</div>
                    </div>
                    <hr>
                    <p class="blackContent">Payment</p>
                    <label class="selectCheckBox">Debit Card
                        <input type="radio" name="payment"  value="debitcard" required>
                        <span class="mark"></span>
                    </label>
                    <label class="selectCheckBox">Net Banking
                        <input type="radio" name="payment" value="netbanking" required>
                        <span class="mark"></span>
                    </label>
                    <label class="selectCheckBox">UPI
                        <input type="radio" name="payment" value="upi" required>
                        <span class="mark"></span>
                    </label>
                    <input type="hidden" name="total" value="{{$total}}">
                    <input type="hidden" name="cart" value="{{$cart}}">
                    
                    <button type="submit"><img src="{{asset('frontend/img/placeOrderBtn.png')}}" class="d-block mx-auto mb-3" alt=""></button>
                    <p class="content text-center">Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sitLorem
                        orem ipsum
                        dolor sit Lorem ipsum dolor sit</p>
                </div>
            </div>
        </div>
    </form>
@include('frontend.layouts.footer')
    <script src="{{asset('frontendjs/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontendjs/main.js')}}"></script>
    <script src="{{asset('frontendjs/cart.js')}}"></script>



</body>

</html>