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
        <style>
            footer {
                position: relative;
                z-index: 1;
                overflow: hidden;
            }

            .footer-background {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: url('img/anh1.jpg') no-repeat center center/cover;
                filter: blur(8px);
                opacity: 0.5; /* Adjust opacity as needed */
                z-index: -1;
            }

            footer .container {
                position: relative;
                z-index: 2;
            }

            footer h5, footer p, footer ul, footer li {
                z-index: 2;
            }

            footer .container ul {
                padding-left: 0;
            }

            footer .container ul li {
                list-style: none;
                margin-bottom: 10px;
            }

            footer a {
                color: #ffffff;
                text-decoration: none;
            }

            footer a:hover {
                text-decoration: underline;
            }

            footer .container ul li i {
                margin-right: 10px;
                color: #ffc107; /* Optional: change icon color */
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

        <!-- Destination Start -->
        <div class="container-fluid destination py-5">
            <div class="container py-5">
            <h1 class="my-4">Pre-Order Tour</h1>
    <div class="card">
        <div class="card-header">
            <h2>{{ $packet->pack_title }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Mô tả:</strong> {{ $packet->pack_desc }}</p>
            <p><strong>Giá:</strong> {{ $packet->pack_price }}</p>

            <h3>Thông tin người dùng</h3>
            <p><strong>Tên người dùng:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>

            <form action="{{ route('place-order') }}" method="POST">
                @csrf
                <input type="hidden" name="id_pack" value="{{ $packet->id_pack }}">
                <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="mb-3">
                    <label for="date_order" class="form-label">Ngày đặt</label>
                    <input type="date" class="form-control" id="date_order" name="date_order" required>
                </div>
                <div class="mb-3">
                    <label for="note" class="form-label">Ghi chú</label>
                    <textarea class="form-control" id="note" name="note"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Đặt hàng</button>
            </form>
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