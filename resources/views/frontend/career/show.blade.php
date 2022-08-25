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

    <section class="career">
        <h1 class="text-center px-2 text-light">Career</h1>
        <h2 class="text-center px-2">“Do you love challenges conventions ?</h2>
        <h3 class="text-center px-2">Then we would loved to talk with you.”</h3>
    </section>

    
    <div class="container careerJobs mt-5">
        <button class="careerBtns selected">All</button>
        @foreach ($category as $item)
        <form action="{{route('user.career.filter')}}" method="Post">
            @csrf
            <input type="hidden" name="prevurl" value="{{URL::current()}}">
            <input type="hidden" name="filterby" value="{{$item->id}}">
            <button type="submit" class="careerBtns notSelected">{{$item->name}}</button>
        </form>
        @endforeach
        
    </div>
    <div class="container mt-3">
        <div class="row ">
            
            @foreach ($data as $item)
            <div class="col-md-6 mt-3 col-12">
                <div class="careerCard">
                    <div class="d-flex pb-2 border-muted border-bottom justify-content-between align-items-center">
                        <h2>{{$item->title}}</h2>
                        <h5>Last Date: {{$item->lastedate}}</h5>
                    </div>
                    <div class="d-flex justify-content-between mt-3 align-items-center">
                        <div>
                            <p>{{$item->experience}} Experience</p>
                            <p>No. of vacancy : {{$item->vacancy}}</p>
                            <p>Location : {{$item->location}}</p>
                        </div>
                        <button class="applyNowBtn" data-bs-toggle="modal" data-bs-target="#joinUsPopUp{{$item->id}}">Apply</button>
                    </div>
                </div>
            </div>
            
            @endforeach
        </div>
    </div>

    @foreach ($data as $item)
        
    <div class="modal" id="joinUsPopUp{{$item->id}}" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered  ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ms-auto">{{$item->title}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 d-flex justify-content-center border-end border-muted">
                            <div>
                                <h5 class="mb-3">Roles & Responsibility :</h5>
                                {{$item->roles}}
                            </div>
                        </div>
                        <div class="col-6 d-flex justify-content-center">
                            <div>
                                <h5 class="mb-3">Requirements :</h5>
                                {{$item->requirements}}
                            </div>
                        </div>
                    </div>
                    <form action="{{route('user.career.add')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="row mt-3">
                        
                        <div class="col-6">
                            <label class="form-label text-black fw-bold">Full Name</label>
                            <div class="input-group mb-3 w-90">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label text-black fw-bold">Mobile Number</label>
                            <div class="input-group mb-3 w-90">
                                <input type="text" name="number" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <label class="form-label text-black fw-bold">Email</label>
                            <div class="input-group mb-3 w-90">
                                <input type="text" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <label class="form-label text-black fw-bold">Upload Resume</label>
                            <div class="input-group mb-3">
                                <input type="hidden" name="career_id" value="{{$item->id}}">
                                <input type="file" name="image" class="form-control w-90">
                            </div>
                        </div>
                    </div>
                    <button type="submit"><img src="{{asset('frontend/img/submitBtn.png')}}" class="CareersubmitBtn d-block mx-auto mt-5 mb-5"
                            alt=""></button>
                    </form>
                        
                </div>
                
            </div>
        </div>
    </div>
    @endforeach


    @include('frontend.layouts.footer')
    <!-- Main JavaScript -->
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
    <script src="{{asset('frontend/js/career.js')}}"></script>


</body>

</html>