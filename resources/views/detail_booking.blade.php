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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
        <!-- Libraries Stylesheet -->
        <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <style>
    .star {
        color: gray; 
        font-size: 30px;
    }
    .star.rated {
        color: gold; 
    }
</style>
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
                 
            </div>
        </div>
        <!-- Header End -->

        <div class="container">
        <h1 class="text-center m-5">Chi tiết tour du lịch</h1>
            <div class="row">
                <div class="col-md-6 mb-5">
                    <img src="{{ asset($packet->pack_img) }}" class="img-fluid" alt="{{ $packet->pack_title }}">
                </div>
                <div class="col-md-6">
                    <h3 class="fw-bold mb-4">{{$packet->pack_title}}</h3>
                    <p class="mb-4">{{$packet->pack_desc}}</p>
                    <div class="d-flex align-items-center pb-3">
                        <i class="fas fa-money-bill text-warning me-2"> Giá cả: {{$packet->pack_price}}</i>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-user text-warning me-2 pb-3"> Số lượng người tối đa: {{$packet->pack_number}} người</i>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-clock text-warning me-2 pb-3"> Thời gian: {{$packet->pack_duration}} ngày</i>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-map text-warning me-2 pb-3"> Địa chỉ: {{$packet->place->location}}</i>
                    </div>
                    <div class="rating-display d-flex" style="font-size:20px">
                        <div class=" align-items-center">
                            <i class="fas fa-star text-warning me-2 pb-3"> Đánh giá:</i>
                        </div> 
                        @for ($i = 1; $i <= 5; $i++)
                            <span style="transform: translateY(-7px)" class="star {{ $i <= $avgrate ? 'rated' : '' }}">&#9733;</span>
                        @endfor
                    </div>
                    <form action="{{ route('rate.store') }}" method="POST">
                        @csrf
                        <select name="rating" class="form-control">
                            <option value="0" {{ $avgrate == 0 ? 'selected' : '' }}>0 &#9733;</option>
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}" {{ $i == round($avgrate) ? 'selected' : '' }}>{{ $i }} &#9733; </option>
                            @endfor
                        </select>
                        <input type="hidden" name="id_pack" value="{{ $packet->id_pack }}">
                        <button type="submit" class="btn btn-primary m-1">Đánh giá</button>
                    </form>
                    <div class="text-center mt-4" style="padding-bottom:40px">
                        <a href="{{ route('order', $packet->id_pack) }}" class="btn btn-primary btn-lg">Đặt ngay</a>
                    </div>
            </div>
        </div>

        <section>
    
        </section>
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