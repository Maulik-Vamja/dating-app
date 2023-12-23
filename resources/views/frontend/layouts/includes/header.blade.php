<header class="header" id="navbar">
    <div class="header__top d-none d-lg-block">
        <div class="container">
            <div class="header__top--area">
                <div class="header__top--left">
                    <ul>
                        <li>
                            <i class="fa-solid fa-phone"></i> <span>+800-123-4567 6587</span>
                        </li>
                        <li>
                            <i class="fa-solid fa-location-dot"></i> Beverley, New York 224 USA
                        </li>
                    </ul>
                </div>
                <div class="header__top--right">
                    <ul>
                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i> Facebook</a></li>
                        <li><a href="#"><i class="fa-brands fa-instagram"></i> Instagram</a></li>
                        <li><a href="#"><i class="fa-brands fa-youtube"></i> Youtube</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header__bottom">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="{{ route('welcome') }}"><img
                        src="{{asset('frontend/assets/images/logo/logo.png')}}" alt="logo"></a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler--icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav mainmenu">
                        <ul>
                            <li class="active">
                                <a href="{{ route('welcome') }}">Home</a>
                            </li>
                            <li>
                                <a href="#0">Contact Us</a>
                            </li>
                            <li>
                                <a href="#0">About Us</a>

                            </li>
                            <li>
                                <a href="#0">Blogs</a>
                            </li>
                        </ul>
                    </div>
                    <div class="header__more">
                        <button class="default-btn dropdown-toggle" type="button" id="moreoption"
                            data-bs-toggle="dropdown" aria-expanded="false">My Account</button>
                        @auth
                        <ul class="dropdown-menu" aria-labelledby="moreoption">
                            <li><a class="dropdown-item" href="login.html">Profile</a></li>
                        </ul>
                        @else
                        <ul class="dropdown-menu" aria-labelledby="moreoption">
                            <li><a class="dropdown-item" href="{{ route('login') }}">Log In</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">Sign Up</a></li>
                        </ul>
                        @endauth
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>