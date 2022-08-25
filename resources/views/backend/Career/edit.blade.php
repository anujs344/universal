<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    
<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
<!-- END: Page CSS-->
<!-- BEGIN: Headlinks-->
@include('backend.layouts.headlinks')
<!-- End: Headlinks-->
</head>

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    @include('backend.layouts.header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('backend.layouts.sidebar')
    <!-- END: Main Menu-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Form Layouts</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Career</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">Available Career</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic Horizontal form layout section start -->
                <section id="basic-horizontal-layouts">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Horizontal Form</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form form-horizontal" method="POST" action="{{route('career.update')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-3 col-form-label">
                                                        <label for="first-name">Title</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="first-name" class="form-control" name="title" value="{{$data->title}}"placeholder="Content Manager" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-3 col-form-label">
                                                        <label for="email-id">Experience </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="email-id" class="form-control" name="experience" value="{{$data->experience}}"placeholder="0-2...2-5" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-3 col-form-label">
                                                        <label for="email-id">Location</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="email-id" class="form-control" name="location" value="{{$data->location}}" placeholder=" NCR, West part, Town area" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-3 col-form-label">
                                                        <label for="email-id">Vacancy</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="Number" id="email-id" class="form-control" name="vacancy" value="{{$data->vacancy}}"placeholder="10" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-3 col-form-label">
                                                        <label for="email-id">Last Date</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="date" id="email-id" class="form-control" name="lastdate" value="{{$data->lastedate}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-3 col-form-label">
                                                        <label for="email-id">Category</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <select name="category_id" id="">
                                                            <option value="{{$data->category->id}}">{{$data->category->name}}</option>
                                                            
                                                            @foreach ($category as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-3 col-form-label">
                                                        <label for="email-id">Roles & Reponsibility</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <textarea name="roles" rows="5" cols="50">{{$data->roles}}</textarea>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-3 col-form-label">
                                                        <label for="email-id">Requirements</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <textarea name="requirements" rows="5" cols="50" value="">{{$data->requirements}}</textarea>

                                                    </div>
                                                </div>
                                            </div>                                                                        
                                            <div class="col-sm-9 offset-sm-3">
                                                <input type="hidden" name="id" value="{{$data->id}}">
                                                <button type="submit" class="btn btn-primary mr-1">Submit</button>
                                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    
    

   @include('backend.layouts.footer')
   @include('backend.layouts.footlinks')
   <script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
   
</body>
<!-- END: Body-->

</html>