<header>
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
                        {{ auth()->user()->name }}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('postList.show') }}">Posts</a>
                        </li>
                        @if (Auth::check() && Auth::user()->type === 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('userList.show') }}">Users</a>
                            </li>
                        @endif
                    @endauth
                </ul>
                <ul class="navbar-nav ml-auto">
                    {{-- @auth
                        {{ auth()->user()->name }}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout.perform') }}">Logout</a>
                        </li>
                    @endauth
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login.show') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register.show') }}">Register</a>
                        </li>
                    @endguest --}}
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('userProfile.show', Auth::user()->id) }}">
                                <i class="fa-solid fa-user"></i>
                                {{ Auth::user()->username }}
                            </a>

                            {{-- <div class="dropdown ">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-user"></i>{{ Auth::user()->username }}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Item 1</a>
                                    <a class="dropdown-item" href="#">Item 2</a>
                                    <a class="dropdown-item" href="#">Item 3</a>
                                </div>
                            </div> --}}
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout.perform') }}">Logout</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login.show') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register.show') }}">Register</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
