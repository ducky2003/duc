@extends('layout')
@section('content')
            <!-- About Start -->
            <div class="container-fluid about py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    @foreach($about as $key => $a)
                    <div class="col-lg-5">
                        <div class="h-100" style="border: 50px solid; border-color: transparent #13357B transparent #13357B;">
                            <img src="{{$a->about_img}}" class="img-fluid w-100 h-100" alt="">
                        </div>
                    </div>
                       
                    <div class="col-lg-7" style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url(img/vn1.png);">
                        <h5 class="section-about-title pe-3">Giới thiệu</h5>
                        <h1 class="mb-4">Chào mừng bạn đến với <span class="text-primary">{{$a->title}}</span></h1>
                        <p class="mb-4">{{$a->description}}</p>                                               
                        <a class="btn btn-primary rounded-pill py-3 px-5 mt-2" href="https://vietnam.travel/">Xem thêm</a>
                    </div>
                    @endforeach      
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Services Start -->
        <div class="container-fluid bg-light service py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Dịch Vụ</h5>
                    <h1 class="mb-0">Dịch vụ của chúng tôi</h1>
                </div>
                <div class="row g-4">
                @foreach($service as $key => $se)
                    <div class="col-lg-6">
                        <div class="row g-4">                          
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0" style="height:200px">
                                    <div class="service-content text-end">
                                        <h5 class="mb-4 ">{{$se->service_title}}</h5>
                                        <p class="mb-0 text-center">{{$se->service_content}}
                                        </p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <i class="fa fa-globe fa-4x text-primary"></i>
                                    </div>
                                </div>
                            </div>                                                                                                                      
                        </div>
                    </div>
                @endforeach  
                    <div class="col-12">
                        <div class="text-center">
                            <a class="btn btn-primary rounded-pill py-3 px-5 mt-2" href="users/service">Xem thêm</a>
                        </div>
                    </div>
                
                </div>
                
            </div>
        </div>
        <!-- Services End -->

        <!-- Destination Start -->
        <div class="container-fluid destination py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Điểm đến</h5>
                    <h1 class="mb-0">Các điểm đến phổ biến</h1>
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
                        <li class="nav-item" id="load_more">
                            <a class="d-flex mx-3 py-2 border border-primary bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-1">
                                <span class="text-dark" style="width: 150px;">Xem thêm</span>
                            </a>
                        </li>
                        <script>
                            document.getElementById('load_more').addEventListener('click', function() {
                                window.location.href = "{{ route('region') }}";
                            });
                        </script>
                        
                        
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-xl-8">
                                    <div class="row g-4">
                                    @foreach ( $region as $key=> $r )

                                        <div class="col-lg-6">
                                            <div class="destination-img">
                                                <img class="img-fluid rounded w-100" style="height : 237px" src="{{asset($r->region_image)}}" alt="">
                                                <div class="destination-overlay p-4">
                                                    <a href="#" class="btn btn-primary text-white rounded-pill border py-2 px-3">{{$r->place_count}} Photos</a>
                                                    <h4 class="text-white mb-2 mt-3">{{$r->region_name}}</h4>
                                                    <a id="" href="{{ route('region.place', $r->id_region) }}" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                                   
                                                </div>
                                                <div class="search-icon">
                                                    <a href="{{asset($r->region_image)}}" data-lightbox="destination-7"><i class="fa fa-plus-square fa-1x btn btn-light btn-lg-square text-primary"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    @endforeach

                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="destination-img">
                                        <img class="img-fluid rounded w-100"  src="img/destination-9.jpg" style="object-fit: cover;height: 499px;" alt="">
                                        <div class="destination-overlay p-4">
                                            <a href="#" class="btn btn-primary text-white rounded-pill border py-2 px-3">5 Photos</a>
                                            <h4 class="text-white mb-2 mt-3">Bắc Trung Bộ</h4>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                        <div class="search-icon">
                                            <a href="img/destination-9.jpg" data-lightbox="destination-4"><i class="fa fa-plus-square fa-1x btn btn-light btn-lg-square text-primary"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div id="tab-2" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="destination-img">
                                        <img class="img-fluid rounded w-100" src="img/destination-5.jpg" alt="">
                                        <div class="destination-overlay p-4">
                                            <a href="#" class="btn btn-primary text-white rounded-pill border py-2 px-3">20 Photos</a>
                                            <h4 class="text-white mb-2 mt-3">San francisco</h4>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                        <div class="search-icon">
                                            <a href="img/destination-5.jpg" data-lightbox="destination-5"><i class="fa fa-plus-square fa-1x btn btn-light btn-lg-square text-primary"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="destination-img">
                                        <img class="img-fluid rounded w-100" src="img/destination-6.jpg" alt="">
                                        <div class="destination-overlay p-4">
                                            <a href="#" class="btn btn-primary text-white rounded-pill border py-2 px-3">20 Photos</a>
                                            <h4 class="text-white mb-2 mt-3">San francisco</h4>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                        <div class="search-icon">
                                            <a href="img/destination-6.jpg" data-lightbox="destination-6"><i class="fa fa-plus-square fa-1x btn btn-light btn-lg-square text-primary"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-3" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="destination-img">
                                        <img class="img-fluid rounded w-100" src="img/destination-5.jpg" alt="">
                                        <div class="destination-overlay p-4">
                                            <a href="#" class="btn btn-primary text-white rounded-pill border py-2 px-3">20 Photos</a>
                                            <h4 class="text-white mb-2 mt-3">San francisco</h4>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                        <div class="search-icon">
                                            <a href="img/destination-5.jpg" data-lightbox="destination-5"><i class="fa fa-plus-square fa-1x btn btn-light btn-lg-square text-primary"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="destination-img">
                                        <img class="img-fluid rounded w-100" src="img/destination-6.jpg" alt="">
                                        <div class="destination-overlay p-4">
                                            <a href="#" class="btn btn-primary text-white rounded-pill border py-2 px-3">20 Photos</a>
                                            <h4 class="text-white mb-2 mt-3">San francisco</h4>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                        <div class="search-icon">
                                            <a href="img/destination-6.jpg" data-lightbox="destination-6"><i class="fa fa-plus-square fa-1x btn btn-light btn-lg-square text-primary"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-4" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="destination-img">
                                        <img class="img-fluid rounded w-100" src="img/destination-5.jpg" alt="">
                                        <div class="destination-overlay p-4">
                                            <a href="#" class="btn btn-primary text-white rounded-pill border py-2 px-3">20 Photos</a>
                                            <h4 class="text-white mb-2 mt-3">San francisco</h4>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                        <div class="search-icon">
                                            <a href="img/destination-5.jpg" data-lightbox="destination-5"><i class="fa fa-plus-square fa-1x btn btn-light btn-lg-square text-primary"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="destination-img">
                                        <img class="img-fluid rounded w-100" src="img/destination-6.jpg" alt="">
                                        <div class="destination-overlay p-4">
                                            <a href="#" class="btn btn-primary text-white rounded-pill border py-2 px-3">20 Photos</a>
                                            <h4 class="text-white mb-2 mt-3">San francisco</h4>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                        <div class="search-icon">
                                            <a href="img/destination-6.jpg" data-lightbox="destination-6"><i class="fa fa-plus-square fa-1x btn btn-light btn-lg-square text-primary"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-5" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="destination-img">
                                        <img class="img-fluid rounded w-100" src="img/destination-5.jpg" alt="">
                                        <div class="destination-overlay p-4">
                                            <a href="#" class="btn btn-primary text-white rounded-pill border py-2 px-3">20 Photos</a>
                                            <h4 class="text-white mb-2 mt-3">San francisco</h4>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                        <div class="search-icon">
                                            <a href="img/destination-5.jpg" data-lightbox="destination-5"><i class="fa fa-plus-square fa-1x btn btn-light btn-lg-square text-primary"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="destination-img">
                                        <img class="img-fluid rounded w-100" src="img/destination-6.jpg" alt="">
                                        <div class="destination-overlay p-4">
                                            <a href="#" class="btn btn-primary text-white rounded-pill border py-2 px-3">20 Photos</a>
                                            <h4 class="text-white mb-2 mt-3">San francisco</h4>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                        <div class="search-icon">
                                            <a href="img/destination-6.jpg" data-lightbox="destination-6"><i class="fa fa-plus-square fa-1x btn btn-light btn-lg-square text-primary"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-6" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="destination-img">
                                        <img class="img-fluid rounded w-100" src="img/destination-5.jpg" alt="">
                                        <div class="destination-overlay p-4">
                                            <a href="#" class="btn btn-primary text-white rounded-pill border py-2 px-3">20 Photos</a>
                                            <h4 class="text-white mb-2 mt-3">San francisco</h4>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                        <div class="search-icon">
                                            <a href="img/destination-5.jpg" data-lightbox="destination-5"><i class="fa fa-plus-square fa-1x btn btn-light btn-lg-square text-primary"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="destination-img">
                                        <img class="img-fluid rounded w-100" src="img/destination-6.jpg" alt="">
                                        <div class="destination-overlay p-4">
                                            <a href="#" class="btn btn-primary text-white rounded-pill border py-2 px-3">20 Photos</a>
                                            <h4 class="text-white mb-2 mt-3">San francisco</h4>
                                            <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                        <div class="search-icon">
                                            <a href="img/destination-6.jpg" data-lightbox="destination-6"><i class="fa fa-plus-square fa-1x btn btn-light btn-lg-square text-primary"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Destination End -->

        <!-- Explore Tour Start -->
        <div class="container-fluid ExploreTour py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Khám phá</h5>
                    <h1 class="mb-4">Danh mục</h1>
                    <p class="mb-0">Chúng tôi gợi ý cho bạn những gói du lịch theo các gói để bạn tiện cho việc tìm kiếm
                    </p>
                </div>
                <div class="tab-class text-center">
                    <div class="tab-content">
                        <div id="InternationalTab-2" class="tab-pane fade show p-0 active">
                            <div class="InternationalTour-carousel owl-carousel">
                                @foreach ($category as  $key => $cate)
                                <div class="international-item">
                                    <img src="{{asset($cate->category_image)}}" class="img-fluid w-100 rounded" style="height: 236px; width: 255px" alt="Image">
                                    <div class="international-content">
                                        <div class="international-info">
                                            <h5 class="text-white text-uppercase mb-2">{{$cate->category_name}}</h5>
                                            <a href="#" class="btn-hover text-white me-4"><i class="fas fa-map-marker-alt me-1"></i>{{$cate->tour_count}}</a>
                                            <a id="load_more" href="{{ route('category.detail', $cate->id_category) }}" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
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
        <!-- Explore Tour Start -->

        <!-- Packages Start -->
        <div class="container-fluid packages py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Gói du lịch</h5>
                    <h1 class="mb-0">Những gói du lịch nổi bật</h1>
                </div>
                <div class="packages-carousel owl-carousel">
                    @foreach ($packet as $key => $pac)
                    <div class="packages-item">
                        <div class="packages-img">
                            <img src="{{asset($pac->pack_img)}}" class="img-fluid w-100 rounded-top" style="height:236px" alt="Image">
                            <div class="packages-info d-flex border border-start-0 border-end-0 position-absolute" style="width: 100%; bottom: 0; left: 0; z-index: 5;">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt me-2"></i>{{$pac->place_name}}</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt me-2"></i>{{$pac->pack_duration}} days</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-user me-2"></i>{{$pac->pack_number}} Person</small>
                            </div>
                            <div class="packages-price py-2 px-10">{{$pac->pack_price}} VND</div>
                        </div>
                        <div class="packages-content bg-light rounded-bottom" >
                            <div class="p-4 pb-0 "style="height: 350px" >
                                <h5 class="mb-0">{{$pac->pack_title}}</h5>
                                <small class="text-uppercase">Đánh giá</small>
                                <div class="mb-3">
                                @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $pac->avg_rating)
                                    <small class="fa fa-star text-primary"></small>
                                @else
                                    <small class="fa fa-star" style="color:silver"></small>
                                @endif
                                @endfor
                                </div>
                                <p class="mb-4">{!! $pac->pack_desc !!}</p>
                            </div>
                            <div class="row bg-primary rounded-bottom mx-0">
                                <div class="col-6 text-start px-0">
                                    <a href="{{route('detail_booking', $pac->id_pack)}}" class="btn-hover btn text-white py-2 px-4">Xem thêm</a>
                                </div>
                                <div class="col-6 text-end px-0">
                                    <a href="{{ route('order', $pac->id_pack) }}" class="btn-hover btn text-white py-2 px-4">Đặt Tour</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Packages End -->
        <!-- Post start -->
        <div class="container-fluid packages py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Bài viết</h5>
                    <h1 class="mb-0">Những bài viết về du lịch Việt Nam</h1>
                    <p class="mb-0">Hãy cùng nhau khám phá những nét đẹp tuyệt vời tại những địa điểm du lịch tuyệt đẹp trên dải đất hình chữ S</p>
                </div>
                <div class="packages-carousel owl-carousel">
                    @foreach ($post as $key => $p)
                    <div class="packages-item">
                        <div class="packages-img">
                            <img src="{{asset($p->post_img)}}" class="img-fluid w-100 rounded-top" style="height:236px" alt="Image">
                            <div class="packages-info d-flex border border-start-0 border-end-0 position-absolute" style="width: 100%; bottom: 0; left: 0; z-index: 5;">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt me-2"></i>{{$p->created_at}}</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt me-2"></i>Likes</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-comment me-2"></i>{{$p->comments_count}} Comments</small>
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
        
        <!-- post End -->
        
@endsection