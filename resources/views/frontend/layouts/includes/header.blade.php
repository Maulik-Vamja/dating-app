<header class="header" id="navbar">
    <div class="header__top d-none d-lg-block">
        <div class="container">
            <div class="header__top--area">
                <div class="header__top--left">
                    <ul>
                        <li>
                            <i class="fa-solid fa-envelope"></i> <span>contact@ifindyou.co</span>
                        </li>

                    </ul>
                </div>
                <div class="header__top--right">
                    <ul>
                        <li><a target="_blank" rel="nofollow" href="https://www.facebook.com/ifindyou.global"><i
                                    class="fa-brands fa-twitter"></i></a></li>
                        <li><a target="_blank" rel="nofollow" href="https://twitter.com/iFindYouGlobal"><i
                                    class="fa-brands fa-facebook"></i></a></li>
                        <li><a target="_blank"  rel="nofollow" href="https://t.me/ifindyouco"><i class="fa-brands fa-telegram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header__bottom">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="{{ route('welcome') }}"><img style="max-height: 40px;"
                        src="{{asset('frontend/assets/images/logo/logo.png')}}" alt="logo"></a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler--icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav mainmenu">
                        <ul>
                            <li class="{{ Route::is('welcome') ? 'active' : '' }}">
                                <a href="{{ route('welcome') }}">Home</a>
                            </li>

                            <li class="{{ Route::is('about-us') ? 'active' : '' }}">
                                <a href="{{ route('about-us') }}">About Us</a>
                            </li>
                            {{-- <li class="{{ Route::is('contact-us') ? 'active' : '' }}">
                                <a href="{{ route('contact-us') }}">Contact Us</a>
                            </li>
                            <li class="{{ Route::is('blogs.*') ? 'active' : '' }}">
                                <a href="{{ route('blogs.index') }}">Blogs</a>
                            </li> --}}
                        </ul>
                    </div>

                    @auth
                    <div class="header__more">
                        <button class="default-btn dropdown-toggle" type="button" id="moreoption"
                            data-bs-toggle="dropdown" aria-expanded="false">{{ auth()->user()->full_name }}</button>
                        <ul class="dropdown-menu" aria-labelledby="moreoption">
                            <li><a class="dropdown-item"
                                    href="{{ route('profile.get',auth()->user()->user_name) }}">View Profile</a></li>
                            <li>
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Update Profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                    @else
                    <div class="navbar-nav mainmenu">
                        <ul class="">
                            <li><a style="color:white" class="default-btn style-2" href="{{ route('login') }}">Log
                                    In/Sign Up</a></li>
                        </ul>
                    </div>
                    @endauth
                </div>
            </nav>
        </div>
    </div>
</header>
