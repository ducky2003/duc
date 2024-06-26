<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Travela - Tourism Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="{{route('users.home')}}" class="navbar-brand p-0">
                    <h1 class="m-0"><i class="bi bi-star me-3" style="color:red"></i>VietNam</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">      
                        @foreach($menu as $key => $m)
                            <a href="{{route('users.home')}}" class="nav-item nav-link">{{$m->menu_name}}</a>  
                        @endforeach                                                         
                                          
                       
                    </div>
                    <a href="" class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4">Book Now</a>
                </div>
            </nav>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">All Region</h1>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active text-white">Regions</li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->

        <!-- Destination Start -->
        <div class="container-fluid destination py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Điểm đến</h5>
                    <h1 class="mb-0">Tất cả các điểm đến</h1>
                </div>
                <div class="tab-class text-center">
                    <ul class="nav nav-pills d-inline-flex justify-content-center mb-5">
                        @foreach($region as $key => $re)
                        <li class="nav-item">
                            <a class="d-flex mx-3 py-2 border border-primary bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-1">
                                <span class="text-dark" style="width: 250px;">{{$re->region_name}}</span>
                            </a>
                        </li>
                        @endforeach
                       
                        <li class="nav-item">
                            <a class="d-flex mx-3 py-2 border border-primary bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-1">
                                <span class="text-dark" style="width: 250px;">{{$re->region_name}}</span>
                            </a>
                        </li>
                        
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row g-4">
                                    @foreach ( $region as $key=> $r )
                                        
                                        <div class="col-4">
                                            <div class="destination-img">
                                                <img class="img-fluid rounded w-100" style="height : 237px" src="{{asset($r->region_image)}}" alt="">
                                                <div class="destination-overlay p-4">
                                                    <a href="#" class="btn btn-primary text-white rounded-pill border py-2 px-3">{{$r->place_count}} Ảnh</a>
                                                    <h4 class="text-white mb-2 mt-3">{{$r->region_name}}</h4>
                                                    <a id="load_mor" href="{{ route('region.place', $r->id_region) }}" class="btn-hover text-white">Xem địa điểm <i class="fa fa-arrow-right ms-2"></i></a>
                                                </div>
                                                <div class="search-icon">
                                                    <a href="{{asset($r->region_image)}}" data-lightbox="destination-7"><i class="fa fa-plus-square fa-1x btn btn-light btn-lg-square text-primary"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                      
                                        
                                    @endforeach                                                                                 
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
        <!-- Destination End -->

        @include('layouts.footer')
        


        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('lib/easing/easing.min.js')}}"></script>
        <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
        <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('lib/lightbox/js/lightbox.min.js')}}"></script>
        

        <!-- Template Javascript -->
        <script src="{{asset('js/main.js')}}"></script>
    </body>

</html>