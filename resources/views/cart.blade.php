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

    <div class="container" style="margin-bottom:150px">
        <h1 class="my-4">Giỏ hàng của bạn</h1>
        <div class="card m-10">
            <div class="card-header">
                <h2>Chi tiết đơn hàng</h2>
            </div>
            <div class="card-body">
                @if($orders->isEmpty())
                    <p>Giỏ hàng của bạn hiện đang trống.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Đơn Hàng</th>
                                <th>Ngày Đặt</th>
                                <th>Ghi Chú</th>
                                <th>Tour</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id_order }}</td>
                                    <td>{{ $order->date_order }}</td>
                                    <td>{{ $order->note }}</td>
                                    <td>{{ $order->tour->pack_title }}</td>
                                    <td>
                                        @if ($order->state == 0)
                                            <span class="text-danger">Đang chờ</span>
                                        @else
                                            <span class="text-success">Đã xử lý</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($order->isActive == 0)
                                            <form action="{{ route('cart.cancel', $order->id_order) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn hủy đơn đặt trước này?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hủy</button>
                                            </form>
                                        @else
                                            <span class="text-muted">Đã xử lý, không thể hủy</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>

    @include('layouts.footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i class="fa fa-arrow-up"></i></a>   

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('lib/lightbox/js/lightbox.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>
