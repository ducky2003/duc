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
                 
            </div>
        </div>
        <!-- Header End -->

        <!-- Blog Start -->
        <div class="container-fluid packages py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Bài viết</h5>
                    <h1 class="mb-0">Những bài viết về du lịch Việt Nam</h1>
                    <p class="mb-0">Hãy cùng nhau khám phá những nét đẹp tuyệt vời tại những địa điểm du lịch tuyệt đẹp trên dải đất hình chữ S</p>
                </div>
                <div class="packages-carousel owl-carousel">
                    @foreach ($post as $p)
                    <div class="packages-item">
                        <div class="packages-img">
                            <img src="{{asset($p->post_img)}}" class="img-fluid w-100 rounded-top" style="height:236px" alt="Image">
                            <div class="packages-info d-flex border border-start-0 border-end-0 position-absolute" style="width: 100%; bottom: 0; left: 0; z-index: 5;">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt me-2"></i>{{$p->created_at}}</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt me-2"></i>Likes</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-user me-2"></i>Comments</small>
                            </div>
                        </div>
                        <div class="packages-content bg-light rounded-bottom" >
                            <div class="p-4 pb-0 "style="height: 350px" >
                                <h5 class="mb-0">{{$p->post_title}}</h5>
                                <small class="text-uppercase">Viết bởi: Viết bởi: {{$p->supp_name}}</small>
                                <p class="mb-4">{!! $p->post_desc !!}</p>
                            </div>
                            <div class="row rounded-bottom mx-0" style="background:#07a70c">
                                <div class="col-6 text-start px-0">
                                    <a href="{{route('detail_post', $p->id_post)}}" style="transform: translateX(148px);"class="btn-hover btn text-white py-2 px-4">Xem thêm</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Blog End -->


        <!-- Footer Start -->
        <div class="container-fluid footer py-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Get In Touch</h4>
                            <a href=""><i class="fas fa-home me-2"></i> 123 Street, New York, USA</a>
                            <a href=""><i class="fas fa-envelope me-2"></i> info@example.com</a>
                            <a href=""><i class="fas fa-phone me-2"></i> +012 345 67890</a>
                            <a href="" class="mb-3"><i class="fas fa-print me-2"></i> +012 345 67890</a>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-share fa-2x text-white me-2"></i>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Company</h4>
                            <a href=""><i class="fas fa-angle-right me-2"></i> About</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Careers</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Blog</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Press</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Gift Cards</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Magazine</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Support</h4>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Contact</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Legal Notice</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Privacy Policy</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Terms and Conditions</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Sitemap</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Cookie policy</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item">
                            <div class="row gy-3 gx-2 mb-4">
                                <div class="col-xl-6">
                                    <form>
                                        <div class="form-floating">
                                            <select class="form-select bg-dark border" id="select1">
                                                <option value="1">Arabic</option>
                                                <option value="2">German</option>
                                                <option value="3">Greek</option>
                                                <option value="3">New York</option>
                                            </select>
                                            <label for="select1">English</label>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-xl-6">
                                    <form>
                                        <div class="form-floating">
                                            <select class="form-select bg-dark border" id="select1">
                                                <option value="1">USD</option>
                                                <option value="2">EUR</option>
                                                <option value="3">INR</option>
                                                <option value="3">GBP</option>
                                            </select>
                                            <label for="select1">$</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <h4 class="text-white mb-3">Payments</h4>
                            <div class="footer-bank-card">
                                <a href="#" class="text-white me-2"><i class="fab fa-cc-amex fa-2x"></i></a>
                                <a href="#" class="text-white me-2"><i class="fab fa-cc-visa fa-2x"></i></a>
                                <a href="#" class="text-white me-2"><i class="fas fa-credit-card fa-2x"></i></a>
                                <a href="#" class="text-white me-2"><i class="fab fa-cc-mastercard fa-2x"></i></a>
                                <a href="#" class="text-white me-2"><i class="fab fa-cc-paypal fa-2x"></i></a>
                                <a href="#" class="text-white"><i class="fab fa-cc-discover fa-2x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        

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