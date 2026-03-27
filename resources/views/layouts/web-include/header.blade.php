<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Premier<span>Bank</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Personal</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('business') }}">Business</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('wealth') }}">Wealth</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('insights') }}">Insights</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
            </ul>
            <div class="d-flex gap-2">

                @guest
                <button class="btn btn-outline-banking" onclick="showLogin()">Sign In</button>
                <button class="btn btn-banking" onclick="showSignup()">Open Account</button>
                @endguest

                @auth
                <a class="btn btn-outline-banking" href="{{ route('dashboard') }}">Dashboard</a>
                
                <a class="btn btn-banking" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                    @csrf
                </form>

                @endauth
            </div>
        </div>
    </div>
</nav>