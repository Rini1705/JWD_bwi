<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <!-- Brand/logo -->
    <a class="navbar-brand" href="#">
        <img src="{{ asset('frontend/img/weowruu.png') }}" alt="Logo" style="height: 40px;">
    </a>

    <!-- Toggler/collapsible Button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/transaction-history">History Pesanan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
        </ul>
        <!-- Login button on the right -->
        <ul class="navbar-nav ms-auto">
            @guest
            <li class="nav-item">
                <button class="btn btn-outline-success" type="button" onclick="window.location.href='/register';">Register</button>
                <button class="btn btn-outline-success" type="button" onclick="window.location.href='/login';">Login</button>
            </li>
            @endguest
            @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{-- <img src="{{ Auth::user()->profile_picture }}" alt="profile" class="rounded-circle" style="width: 30px; height: 30px;"> --}}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
            @endauth
        </ul>        
    </div>
    </div>
</nav>