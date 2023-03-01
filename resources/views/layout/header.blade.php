<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ url('/img/header_logo.png') }}" height="80" alt="header_logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                @auth
                    {{ auth()->user()->name }}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('postList.show') }}">Posts</a>
                    </li>
                    @if (Auth::check() && Auth::user()->type === '1')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('userList.show') }}">Users</a>
                        </li>
                    @endif
                @endauth
            </ul>
            <ul class="navbar-nav ml-auto">
                @if (Auth::check())
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle nav-link" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa-solid fa-user"></i> {{ Auth::user()->username }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('userProfile.show', Auth::user()->id) }}">User
                                    Profile</a>
                                <a class="dropdown-item" href="{{ route('changePassword.show') }}">Change Password</a>
                            </div>
                        </div>
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
    </nav>
</header>
