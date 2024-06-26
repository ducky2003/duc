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
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
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

        <div class="container py-5">
            <h1 style="text-align:center; padding:20px; color: red">{{$post->post_title}}</h1>
            <div class="row">
                <div class="col-lg-9">
                    <div class="card mb-4">
                        <img src="{{ asset($post->post_img) }}" class="card-img-top" alt="Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->post_title }}</h5>
                            <p class="card-text"><small class="text-muted">Địa điểm: {{ $post->place->place_name }}</small></p>
                            <p class="card-text"><small class="text-muted">Ngày đăng: {{ $post->created_at }}</small></p>
                            <p class="card-text"><small class="text-muted">Viết bởi: {{ $post->supplier->supp_name }}</small></p>
                            <p class="card-text">{!! $post->post_content !!}</p>
                        </div>
                    </div>
                    <div class="card mb-4">
                <div class="card-body">
                    <h1 class="card-title">Bình luận</h1>
                    @foreach ($comments as $comment)
                        <div class="mb-3 position-relative">
                            <strong style="font-size:20px">{{ $comment->user->name }}</strong> <br>
                            <span class="text-muted">{{ $comment->created_at }}</span>
                            <p style="font-size: 25px">{{ $comment->comment }}</p>
                            @if (auth()->check() && auth()->id() == $comment->user_id)
                                <div class="dropdown position-absolute top-0 end-0">
                                    <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <a class="dropdown-item edit-comment" href="#" data-id="{{ $comment->id_comment }}"
                                            data-comment="{{ $comment->comment }}">Chỉnh sửa</a></li>
                                        <li>
                                            <form action="{{ route('comment.delete', $comment->id_comment) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item">Xóa</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    @endforeach

                    @auth
                        <form id="comment-form" action="{{ route('post.comment') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_post"id="comment-id" value="{{ $post->id_post }}">
                            <div class="mb-3">
                                <textarea name="comment" id="comment-textarea" class="form-control" rows="3" placeholder="Nhập bình luận"></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Đăng</button>
                        </form>
                    @else
                        <p><a style="color:red; font-size:20px" href="{{ route('login') }}">Đăng nhập</a> để thực hiện chức năng này.</p>
                    @endauth
                </div>
            </div>
                </div>
                <div class="col-lg-3">
                    <h5 class="mb-3">Bài viết liên quan</h5>
                        @foreach ($relatedPosts as $relatedPost)
                            <div class="card mb-3">
                                <img src="{{ asset($relatedPost->post_img) }}" class="card-img-top" alt="Image">
                                <div class="card-body">
                                    <h6 class="card-title">{{ $relatedPost->post_title }}</h6>
                                    <p class="card-text"><small class="text-muted">{{ $relatedPost->created_at }}</small></p>
                                    <a href="{{ route('detail_post', $relatedPost->id_post) }}" class="btn btn-primary btn-sm">Xem thêm</a>
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
        <div class="modal fade" id="editCommentModal" tabindex="-1" aria-labelledby="editCommentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCommentModalLabel">Chỉnh sửa bình luận</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-comment-form" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <textarea name="comment" class="form-control" id="edit-comment-textarea" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Bình luận</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.edit-comment').forEach(function (element) {
            element.addEventListener('click', function (event) {
                event.preventDefault();
                var commentId = this.getAttribute('data-id');
                var commentText = this.getAttribute('data-comment');
                document.getElementById('edit-comment-textarea').value = commentText;
                document.getElementById('edit-comment-form').action = '{{ url("/comment") }}/' + commentId;
                var myModal = new bootstrap.Modal(document.getElementById('editCommentModal'));
                myModal.show();
            });
        });
    });
</script>
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/js/bootstrap.bundle.min.js"></script>

        <!-- Template Javascript -->
        <script src="{{asset('js/main.js')}}"></script>
    </body>

</html>