
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