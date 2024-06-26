<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.7.1.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/js/dataTables.js">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/js/bootstrap.bundle.min.js"></script>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a href="{{route('users.home')}}" class="nav-link active">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{strpos(url()->current(), 'user') == true ? 'active' : ''}}" href="{{route('user.index')}}">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{strpos(url()->current(), 'region') == true ? 'active' : ''}}" href="{{route('region.index')}}">Regions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{strpos(url()->current(), 'place') == true ? 'active' : ''}}" href="{{route('place.index')}}">Place</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{strpos(url()->current(), 'category') == true ? 'active' : ''}}" href="{{route('category.index')}}">Category</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{strpos(url()->current(), 'post') == true ? 'active' : ''}}" href="{{route('post.index')}}">Post</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{strpos(url()->current(), 'supplier') == true ? 'active' : ''}}" href="{{route('supplier.index')}}">Supplier</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{strpos(url()->current(), 'order') == true ? 'active' : ''}}" href="{{route('order.index')}}">Pre-Order</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{strpos(url()->current(), 'menu') == true ? 'active' : ''}}" href="{{route('menu.index')}}">Menu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{strpos(url()->current(), 'pack') == true ? 'active' : ''}}" href="{{route('pack.index')}}">Packet</a>
            </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))

                            @auth
                                @if (Auth::user()->utype ==='ADM')
                                <li>
                                    <a   href="{{ route('admin.admin_home') }}">dashboard</a>
                                </li>
                                @else
                                <li>
                                    <a   href="{{ route('users.home') }}">dashboard</a>
                                </li>
                                @endif
                            
                            @endauth
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
        </div>
    </nav>
    

        <main class="py-4">
            @yield('content')
        </main>
    </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
