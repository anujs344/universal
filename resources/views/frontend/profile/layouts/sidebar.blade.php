<div class="col-lg-3 sticky-sm-top sticky-xs-top ">
    <nav class="navbar navbar-expand-lg navbar-light dashboard-box">
        <button class="navbar-toggler btn w-100 mb-3 py-3" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarProfile" aria-controls="navbarProfile" aria-expanded="false"
            aria-label="Toggle navigation">
            <b class="text-black">My Profile <i class="fa fa-caret-down ms-4"></i></b>
        </button>
        <div class="collapse navbar-collapse" id="navbarProfile">
            <div class="list-group w-100 p-menu">

                <a class="list-group-item list-group-item-action text-center ">
                    <div class="profile-bg-f w-100  py-3">
                        <img src="img/profile.png" class="profile-img rounded-circle">
                        <div class="editImg" role="button"><img src="./img/imageIcon.png" alt=""></div>
                        <h5 class="text-blue-d mt-2 fs-24 fw-600">{{Auth::user()->name}}</h5>
                        <p class="text-blue-d m-0 p-0 lh-1">{{Auth::user()->email}}</p>
                    </div>
                </a>
                <a href="{{route('profile.show')}}" class="list-group-item list-group-item-action fs-16 ">
                    Account Details </a>
                <a href="{{route('profile.history')}}"
                    class="list-group-item list-group-item-action fs-16  text-8">
                    Order History
                </a>
                <a href="{{route('profile.trackorder')}}"
                    class="list-group-item list-group-item-action fs-16 active text-8"> Track
                    Order 
                </a>
                {{-- <a href="address.html"
                    class="list-group-item list-group-item-action fs-16 text-black-8"> Address </a>
                <a href="coupouns.html"
                    class="list-group-item list-group-item-actionfs-16 text-black-8">
                    Coupons </a>
                <a href="faq.html" class="list-group-item list-group-item-action fs-16 text-black-8">
                    FAQs </a>
                <a href="review.html" class="list-group-item list-group-item-action fs-16 text-black-8">
                    Product
                    Reviews </a> --}}
                <a class="list-group-item list-group-item-action fs-16 fw-600 text-danger" href="{{route('user.logout')}}"> Log
                    Out </a>

            </div>
        </div>
    </nav>
</div>