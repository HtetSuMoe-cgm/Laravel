<!DOCTYPE html>
<html>

<head>
    <title>Bulletin Board</title>
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap_css/bootstrap.min.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ url('/img/header_logo.png') }}" height="80" alt="header_logo">
              </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    @auth
                    {{auth()->user()->name}}
                    <li class="nav-item">
                        <a class="nav-link" href="#">Posts</a>
                    </li>
                    @if(Auth::check() && Auth::user()->type === 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="#">Users</a>
                    </li>
                    @endif
                    @endauth
                </ul>
                <ul class="navbar-nav ml-auto">
                    @auth
                    {{auth()->user()->name}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout.perform') }}" data-target="#myModal" data-toggle="modal">Logout</a>
                    </li>
                    @endauth
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login.show') }}" data-target="#myModal" data-toggle="modal">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register.show') }}" data-target="#myModal" data-toggle="modal">Register</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    {{-- <script src="{{ asset('js/bootstrap_js/') }}"></script> --}}
</body>

</html>
