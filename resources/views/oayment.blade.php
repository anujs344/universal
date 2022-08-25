
text/x-generic payments.blade.php ( UTF-8 Unicode C++ program text, with CRLF line terminators )
@extends('layouts.apibase')

@section('content')
<section id="breadcrumb" class="mb-4 mt-1 d-none d-lg-block">
    <nav aria-label="breadcrumb" class="bread py-1 bg-light shadow-none">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">API Checkout NEW</li>
        </ol>
    </nav>
</section>

<section id="cart">
    @if ($orders !== null)
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-6 col-11">
                <div class="card border-0 shadow rounded-3 mb-4">
                    <div class="card-header bg-transparent border-0 card-title h4 p-3">Order Summary</div>
                    <hr>
                    <div class="card-body">
                        @foreach ($orders->cart_item as $item)
                        @php
                        $varient = $item->cartItems->variantSC($item->size_id, $item->color_id);
                        @endphp
                        <div class="mb-4 row shadow-sm rounded py-3">
                            <div class="col-lg-3">
                                <img src="{{ asset('images/products/'.$item->cartItems->image) }}" alt=""
                                    class="img-fluid rounded shadow-sm">
                            </div>
                            <div class="col-lg-9">
                                <h5>{{ $item->cartItems->name }}</h5>
                                <p class="small text-muted"><strong>seller
                                        :</strong>{{ $item->cartItems->seller->user_name }}</p>
                                <p class="small fw-bold" style="margin-top: -10px;">₹
                                    {{ $varient->price ?? $item->cartItems->offer_price }} /-</p>
                            </div>
                        </div>
                        @endforeach
                        <h5>Address Details</h5>
                        <hr>
                        <div class="form-check">
                            <label class="form-check-label" for="10">
                                <h4 class="h5 "> {{ $orders->address->first_name ." ". $orders->address->last_name }}
                                </h4>
                                <h5 class="h6 small">+91 {{ $orders->address->phone }}</h5>
                                <h5 class="h6 small">{{ $orders->address->email }}</h5>
                                <p>{{ $orders->address->address }}, {{ $orders->address->city }}</p>
                                <p class="mt-n3 ">{{ $orders->address->state }}</p>
                            </label>
                        </div>
                        {{-- <a href="" class="btn btn-light rounded-0 shadow-sm float-start ms-3">Change Address</a> --}}
                    </div>
                </div>

                <a href="/" class="btn btn-info shadow-none">Continue Shopping</a>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-6 col-11">

                <div class="card border-0 shadow rounded-3">
                    <div class="card-header bg-transparent border-0 card-title h4 p-3">Order Details</div>
                    <div class="card-body">
                        @php
                        $total_payable = 0;
                        $offer_price = 0;
                        $total_shipping = 0;
                        $total_discount = 0;
                        $total_tax = 0;
                        $total_cod_charges = 0;
                        $total_price = 0;
                        $cod_check = 1;

                        foreach ($orders->cart_item as $item){
                        // COD Available

                        if (!$item->cartItems->codcheck) {
                        $cod_check = $item->cartItems->codcheck;
                        }

                        $data = payableAmount($item);
                        $total_shipping += $data->shipping_charges;
                        $offer_price += $data->offer_price;
                        $total_discount += $data->total_discount;
                        $total_tax += $data->tax_amount;
                        $total_price += $data->total_offer_price;
                        $total_payable += $data->sub_total;
                        $total_cod_charges += $data->cod_charges;
                        }

                        @endphp
                        <table class="table table-bordered">
                            @foreach ($orders->cart_item as $item)
                            @php
                            $varient = $item->cartItems->variantSC($item->size_id, $item->color_id);
                            @endphp
                            <tr>
                                <td>{{ $item->cartItems->name . " x ". $item->qty }}</td>
                                <td>₹ {{ $varient->price * $item->qty }} </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td>Tax</td>
                                <td>₹ {{ $total_tax }}</td>
                            </tr>
                            <tr class="">
                                <td>COD Charges
                                    <i class="fas ms fa-info-circle text-primary" data-bs-container="body"
                                        data-bs-toggle="popover" data-bs-placement="right"
                                        data-bs-content="Not Applied On Online Payment Methods"
                                        title="Not Applied On Online Payment Methods"> </i>
                                </td>
                                <td>₹ {{ $total_cod_charges }}*</td>
                            </tr>
                            <tr class="">
                                <td>Shipping</td>
                                <td>{{ $total_shipping ? "₹ ".$total_shipping : "Free"}}</td>
                            </tr>
                            <tr class="border-t-dark">
                                <td>Total Discount</td>
                                <td class="text-danger">₹ {{ $total_discount }}</td>
                            </tr>
                            <tr class="fw-bold">
                                <td>Total Payable</td>
                                <td>₹ {{ $total_payable }}</td>
                            </tr>
                        </table>
                        <br>
                        <hr>
                    </div>
                </div>
                <div class="card border-0 shadow rounded-3 my-3 py-4">
                    <form action="{{ url("api/payment_redirect") }}" method="post">
                        <input type="hidden" name="aernuors" value="{{ Crypt::encrypt(1000) }}">
                        <input type="hidden" name="aeonuors" value="{{ Crypt::encrypt(0000) }}">
                        <input type="hidden" name="aernqors"
                            value="{{ Crypt::encrypt($total_payable - $total_cod_charges) }}">
                        <input type="hidden" name="aernaors" value="{{ Crypt::encrypt(0001) }}">
                        <input type="hidden" name="anrnuors" value="{{ Crypt::encrypt($orders->id) }}">
                        <input type="hidden" name="aernuxrs" value="{{ Crypt::encrypt(1111) }}">
                        <div class="card-body">
                            @if ($cod_check)
                            <div class="form-check mb-3">
                                <input type="radio" class="form-check-input" value="cod" id="payment_type_cod"
                                    name="payment_type">
                                <label class="form-check-label fw-bold" for="payment_type_cod">Cash On Delivery</label>
                                {{-- @if (ship_set()->cod_charge > 0) --}}
                                <p class="small text-muted">You have to pay 5% of the cart amount for cod charges.</p>
                                {{-- <p class="small text-muted">Cod Charge is ₹ {{ ship_set()->cod_charge }}.</p> --}}
                                {{-- @endif --}}
                            </div>
                            @endif
                            @if (payment_config()->paytm_enable == 1)
                            <div class="form-check mb-3">
                                <input type="radio" class="form-check-input" value="paytm" id="payment_type_paytm"
                                    name="payment_type">
                                <label class="form-check-label fw-bold" for="payment_type_paytm">Paytm</label>
                                <p class="text-success">₹ {{ $total_payable - $total_cod_charges }}
                                    <span class="small text-muted text-decoration-line-through">₹
                                        {{$total_payable}}</span></p>
                            </div>
                            @endif
                            @if (payment_config()->razorpay_enable == 1)
                            <div class="form-check mb-3">
                                <input type="radio" class="form-check-input" value="razorpay" id="payment_type_razorpay"
                                    name="payment_type">
                                <label class="form-check-label fw-bold" for="payment_type_razorpay">RazorPay</label>
                                <p class="text-success">₹ {{ $total_payable - $total_cod_charges }}
                                    <span class="small text-muted text-decoration-line-through">₹
                                        {{$total_payable}}</span></p>
                            </div>
                            @endif
                        </div>

                        <div class="card-footer border-0 bg-transparent">
                            <button type="submit" class="btn btn-warning w-100 place_order_button">Place Order</button>
                        </div>
                    </form>
                    <style>
                        .razorpay-payment-button {
                            display: none;
                        }
                    </style>
                    <div class="card-footer mt-0 border-0 bg-transparent razorpay-payment d-none">
                        <form action="{{ url('api/razorpay/payment') }}" method="POST">
                            <input type="hidden" name="aernaors" value="{{ Crypt::encrypt(0001) }}">
                            <input type="hidden" name="anrnuors" value="{{ Crypt::encrypt($orders->id) }}">
                            <input type="hidden" name="aernuxrs" value="{{ Crypt::encrypt(1111) }}">
                            <script src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="{{ env('RAZOR_PAY_KEY') }}"
                                data-amount="{{ ($total_payable - $total_cod_charges) * 100 }}" 
                                data-offer="{{offer::all()}}"
                                data-currency="INR"
                                data-name="{{ Auth::user()->user_name }}" 
                                data-description="Razorpay"
                                data-image="{{ asset('images/logo/'.site()->logo) }}"
                                data-prefill.name="{{ Auth::user()->phone }}"
                                data-prefill.email="{{ Auth::user()->email }}" 
                                data-theme.color="#F37254">
                            </script>
                            <button class="btn btn-warning w-100">Place Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</section>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script>
    $(document).ready(function() {
    $("input[name$='payment_type']").click(function() {
        var pt = $(this).val();

        if(pt == 'razorpay'){
            $(".place_order_button").hide();
            $(".razorpay-payment").removeClass('d-none');
        }else{
            $(".place_order_button").show();
            $(".razorpay-payment").addClass('d-none');
        }

    });
});
</script>

@endsection