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
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3tqxnplVx3sph5lQv4OoB4KlHLs03J8GIMp8lbvMA7n48tGWiVQQcu/E9xwDnbDjsXwA1brx2hA1GKVkuPGA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-c/Bl5ZnbA1mScj8BmFUszp4RY7IjNN4NiHXNZ2sJQZ6C7L67eRfPbBNO3ihTP6Z4NQ9UOH4eH2HGtxx9XiTNFA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-KyZXEAg3QhqLMpG8r+Knujsl7/8lF6y74r8B5wx5TVn1yyIc5CQZppQ4Ff5c5fQ4FbUqH9gB8GP7DP9On7U8lw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-k9aWcb3D9DrHzh8DkSo4ovFC9hvRYg3LJtBl+BB3EUu6l2cfQXjl2z/27N/U8AFySz1nnY3eW5Chpcyew3rGtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            });
        });
    </script>
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Topbar Start -->
        <div class="container-fluid bg-primary px-5 d-none d-lg-block">
            <div class="row gx-0">
                <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                    @guest
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}"><small class="me-3 text-light"><i class="fa fa-sign-in-alt me-2"></i>{{ __('Đăng nhập') }}</small></a>    
                        @endif
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"><small class="me-3 text-light"><i class="fa fa-user me-2"></i>{{ __('Đăng ký') }}</small></a>  
                        @endif
                        @else
                        @if(Auth::check() && Auth::user()->role == 'admin')
                            <a href="{{ route('admin_home') }}"><small class="me-3 text-light"><i class="fa fa-user-shield me-2"></i>{{ __('Admin') }}</small></a>
                        @endif
                            <a href="{{ route('cart') }}"><small class="me-3 text-light">
                                <i class="bi bi-cart4 me-2"></i>
                                Đơn hàng
                                @if($orderCount > 0)
                                <span class="text-danger">{{ $orderCount }}</span>
                                @endif
                            </small>
                            </a>
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    {{ __('Đăng xuất') }}
                            </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </div>
                    @endguest
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->

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
                            <a href="{{$m->route}}" class="nav-item nav-link">{{$m->menu_name}}</a>  
                        @endforeach                                                         
                                          
                       
                    </div>
                    <!-- <a href="" class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4">Đặt trước</a> -->
                </div>
            </nav>

            <!-- Carousel Start -->
            <div class="carousel-header">
                <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <video  autoplay muted src="img/thum.mp4" class="img-fluid" alt="Image">
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- Carousel End -->
        </div>
        <!-- Navbar & Hero End -->

        @yield('content')

        <!-- Footer Start -->
        <footer class="bg-dark text-white pt-5 pb-4 position-relative">
            <div class="footer-background">

            </div>
            <div class="container position-relative">
                <div class="row">
                    <!-- Cột trái -->
                    <div class="col-md-6 mb-4">
                        <h5 style="color: white">Thông tin liên hệ</h5>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-user"></i> <strong>Họ tên:</strong> Nguyễn Ngọc Anh Đức</li>
                            <li><i class="fas fa-envelope"></i> <strong>Email:</strong> nguyenngocanhduc1423@gmail.com</li>
                            <li><i class="fas fa-phone"></i> <strong>Điện thoại:</strong> +84332201302</li>
                            <li><i class="fas fa-map-marker-alt"></i> <strong>Địa chỉ:</strong> Nghệ An, Việt Nam</li>
                        </ul>
                    </div>
                    <!-- Cột phải -->
                    <div class="col-md-6 text-center mb-4">
                        <div class="mb-3">
                            <img src="{{ asset('img/logo.png') }}" alt="Đại học Vinh" style="max-width: 150px;">
                        </div>
                        <h1 style="font-size:30px; color:white">Đại học Vinh</h1>
                        <li><i class="fas fa-map-marker-alt"></i> <strong>Địa chỉ: </strong>182 Lê Duẩn, Tp Vinh, Nghệ An</li>

                        <p>CNTT-2024</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer End -->
        
        
        

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>
        

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>

</html>