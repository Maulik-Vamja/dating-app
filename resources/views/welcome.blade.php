<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from demos.codexcoder.com/themeforest/html/ollya/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Dec 2023 08:36:56 GMT -->

<head>
    <meta charset="utf-8">
    <title>Ollya</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- site favicon -->
    <link rel="icon" type="image/png" href="{{asset('frontent/assets/images/favicon.png')}}">
    <!-- Place favicon.ico in the root directory -->

    <!-- All stylesheet and icons css  -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/lightcase.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">

</head>

<body>
    <!-- preloader start here -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- preloader ending here -->


    <!-- scrollToTop start here -->
    <a href="#" class="scrollToTop"><i class="fa-solid fa-angle-up"></i></a>
    <!-- scrollToTop ending here -->


    <!-- ================> header section start here <================== -->
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
                    <a class="navbar-brand" href="index.html"><img
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
                                    <a href="#0">Home</a>
                                    {{-- <ul>
                                        <li><a href="index.html">Home Page One</a></li>
                                        <li><a href="index-2.html" class="active">Home Page Two</a></li>
                                        <li><a href="index-3.html">Home Page Three</a></li>
                                    </ul> --}}
                                </li>
                                <li>
                                    <a href="#0">Contact Us</a>
                                    {{-- <ul>
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="membership.html">Membership</a></li>
                                        <li><a href="comingsoon.html">comingsoon</a></li>
                                        <li><a href="404.html">404</a></li>
                                    </ul> --}}
                                </li>
                                <li>
                                    <a href="#0">About Us</a>
                                    {{-- <ul>
                                        <li><a href="community.html">Community</a></li>
                                        <li><a href="group.html">All Group</a></li>
                                        <li><a href="members.html">All Members</a></li>
                                        <li><a href="activity.html">Activity</a></li>
                                    </ul> --}}
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
                                <li><a class="dropdown-item" href="login.html">Log In</a></li>
                                <li><a class="dropdown-item" href="register.html">Sign Up</a></li>
                            </ul>
                            @endauth
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- ================> header section end here <================== -->


    <!-- ================> Banner section start here <================== -->
    <div class="banner banner--style2 padding-top bg_img" style="background-image: url(assets/images/banner/bg-2.jpg);">
        <div class="container">
            <div class="banner__wrapper">
                <div class="row g-0 justify-content-center">
                    <div class="col-lg-4 col-12">
                        <div class="banner__content wow fadeInLeft" data-wow-duration="1.5s">
                            <div class="banner__title">
                                <h2>New Places, Unforgettable Dating.</h2>
                                <p>Join our international family today! Please call us for more info.</p>
                                <a href="membership.html" class="default-btn style-2"><span>Get A Membership</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-12">
                        <div class="banner__thumb wow fadeInUp" data-wow-duration="1.5s">
                            <img src="{{asset('frontend/assets/images/banner/02.png')}}" alt="banner">
                            <div class="banner__thumb--shape">
                                <div class="shapeimg shapeimg__one">
                                    <img src="{{asset('frontend/assets/images/banner/shape/home2/01.png')}}"
                                        alt="dating thumb">
                                </div>
                                <div class="shapeimg shapeimg__two">
                                    <img src="{{asset('frontend/assets/images/banner/shape/home2/02.png')}}"
                                        alt="dating thumb">
                                </div>
                                <div class="shapeimg shapeimg__three">
                                    <img src="{{asset('frontend/assets/images/banner/shape/home2/03.png')}}"
                                        alt="dating thumb">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ================> Banner section end here <================== -->


    <!-- ================> About section start here <================== -->
    <div class="about about--style2 padding-top pt-xl-0">
        <div class="container">
            <div class="section__wrapper wow fadeInUp" data-wow-duration="1.5s">
                <div class="row g-0 justify-content-center row-cols-lg-2 row-cols-1">
                    <div class="col">
                        <div class="about__left h-100">
                            <div class="about__top">
                                <div class="about__content">
                                    <h3>Welcome To Our Ollya</h3>
                                    <p>You find us, finally, and you are already in love. More than 4.000.000 around the
                                        world already shared the same experiences and uses our system. Joining us today
                                        just got easier!</p>
                                </div>
                            </div>
                            <div class="about__bottom">
                                <div class="about__bottom--head">
                                    <h5>Latest Registered Members</h5>
                                    <div class="about__bottom--navi">
                                        <div class="ragi-prev"><i class="fa-solid fa-chevron-left"></i></div>
                                        <div class="ragi-next active"><i class="fa-solid fa-chevron-right"></i></div>
                                    </div>
                                </div>
                                <div class="about__bottom--body">
                                    <div class="ragi__slider overflow-hidden">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="ragi__thumb">
                                                    <a href="member-single.html"><img
                                                            src="{{asset('frontend/assets/images/ragi/01.jpg')}}"
                                                            alt="dating thumb"></a>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="ragi__thumb">
                                                    <a href="member-single.html"><img
                                                            src="{{asset('frontend/assets/images/ragi/02.jpg')}}"
                                                            alt="dating thumb"></a>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="ragi__thumb">
                                                    <a href="member-single.html"><img
                                                            src="{{asset('frontend/assets/images/ragi/03.jpg')}}"
                                                            alt="dating thumb"></a>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="ragi__thumb">
                                                    <a href="member-single.html"><img
                                                            src="{{asset('frontend/assets/images/ragi/04.jpg')}}"
                                                            alt="dating thumb"></a>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="ragi__thumb">
                                                    <a href="member-single.html"><img
                                                            src="{{asset('frontend/assets/images/ragi/05.jpg')}}"
                                                            alt="dating thumb"></a>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="ragi__thumb">
                                                    <a href="member-single.html"><img
                                                            src="{{asset('frontend/assets/images/ragi/01.jpg')}}"
                                                            alt="dating thumb"></a>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="ragi__thumb">
                                                    <a href="member-single.html"><img
                                                            src="{{asset('frontend/assets/images/ragi/02.jpg')}}"
                                                            alt="dating thumb"></a>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="ragi__thumb">
                                                    <a href="member-single.html"><img
                                                            src="{{asset('frontend/assets/images/ragi/03.jpg')}}"
                                                            alt="dating thumb"></a>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="ragi__thumb">
                                                    <a href="member-single.html"><img
                                                            src="{{asset('frontend/assets/images/ragi/04.jpg')}}"
                                                            alt="dating thumb"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="about__right ">
                            <div class="about__title">
                                <h3>Find Your True Love</h3>
                            </div>
                            <form action="#" method="POST">
                                <div class="banner__list">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>I am a</label>
                                            <div class="banner__inputlist">
                                                <select name="my_gender" id="my_gender">
                                                    <option>Select Gender</option>
                                                    <option value="male" selected>Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="non-binary">Non Binary</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label>Looking for</label>
                                            <div class="banner__inputlist">
                                                <select name="looking_for_gender" id="looking_for_gender">
                                                    <option>Select Gender</option>
                                                    <option value="male" selected>Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="non-binary">Non Binary</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner__list">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <label>Age</label>
                                            <div class="row g-3">
                                                <div class="col-6">
                                                    <div class="banner__inputlist">
                                                        <select>
                                                            @for ($i = 18; $i <= 40; $i++) <option value="{{$i}}" {{
                                                                $i==18 ? 'selected' : '' }}>{{ $i }}
                                                                </option>
                                                                @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="banner__inputlist">
                                                        <select>
                                                            @for ($i = 18; $i <= 40; $i++) <option value="{{$i}}" {{
                                                                $i==25 ? 'selected' : '' }}>{{ $i }}
                                                                </option>
                                                                @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                        $countries = DB::table('countries')->get();
                                        @endphp
                                        <div class="col-lg-6 col-12">
                                            <label>Country</label>
                                            <div class="banner__inputlist mb-0">
                                                <select id="country" name="country">
                                                    <option value="">Select Country</option>
                                                    @foreach ($countries as $country)
                                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            {{-- <span class="text-danger">sbfksf</span> --}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label>State</label>
                                            <div class="banner__inputlist">
                                                <select id="state" name="state">
                                                    <option value="">Select State</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="default-btn reverse d-block"><span>Find Your
                                        Partner</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="about padding-top padding-bottom">
        <div class="container">
            <div class="section__header style-2 text-center wow fadeInUp" data-wow-duration="1.5s">
                <h2>It All Starts With A Date</h2>
                <p>Learn from them and try to make it to this board. This will for sure boost you visibility and
                    increase your chances to find you loved one.</p>
            </div>
            <div class="section__wrapper">
                <div class="row g-4 justify-content-center row-cols-xl-4 row-cols-lg-3 row-cols-sm-2 row-cols-1">
                    <div class="col wow fadeInUp" data-wow-duration="1.5s">
                        <div class="about__item text-center">
                            <div class="about__inner">
                                <div class="about__thumb">
                                    <img src="{{asset('frontend/assets/images/about/icon/01.png')}}" alt="dating thumb">
                                </div>
                                <div class="about__content">
                                    <h3><span class="counter" data-to="990960" data-speed="1500"></span></h3>
                                    <p>Members in Total</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col wow fadeInUp" data-wow-duration="1.6s">
                        <div class="about__item text-center">
                            <div class="about__inner">
                                <div class="about__thumb">
                                    <img src="{{asset('frontend/assets/images/about/icon/02.png')}}" alt="dating thumb">
                                </div>
                                <div class="about__content">
                                    <h3><span class="counter" data-to="628590" data-speed="1500"></span></h3>
                                    <p>Members Online</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col wow fadeInUp" data-wow-duration="1.7s">
                        <div class="about__item text-center">
                            <div class="about__inner">
                                <div class="about__thumb">
                                    <img src="{{asset('frontend/assets/images/about/icon/03.png')}}" alt="dating thumb">
                                </div>
                                <div class="about__content">
                                    <h3><span class="counter" data-to="314587" data-speed="1500"></span></h3>
                                    <p>Women Online</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col wow fadeInUp" data-wow-duration="1.8s">
                        <div class="about__item text-center">
                            <div class="about__inner">
                                <div class="about__thumb">
                                    <img src="{{asset('frontend/assets/images/about/icon/04.png')}}" alt="dating thumb">
                                </div>
                                <div class="about__content">
                                    <h3><span class="counter" data-to="102369" data-speed="1500"></span></h3>
                                    <p>Men Online</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ================> About section end here <================== -->


    <!-- ================> Story section start here <================== -->
    <div class="story bg_img padding-top padding-bottom"
        style="background-image: url({{asset('frontend/assets/images/bg-img/02.jpg')}});">
        <div class="container">
            <div class="section__header style-2 text-center wow fadeInUp" data-wow-duration="1.5s">
                <h2>Ollya Stories From Our Lovers</h2>
                <p>Listen and learn from our community members and find out tips and tricks to meet your love. Join us
                    and be part of a bigger family.</p>
            </div>
            <div class="section__wrapper">
                <div class="row g-4 justify-content-center row-cols-lg-3 row-cols-sm-2 row-cols-1">
                    <div class="col wow fadeInUp" data-wow-duration="1.5s">
                        <div class="story__item">
                            <div class="story__inner">
                                <div class="story__thumb">
                                    <a href="blog-single.html"><img
                                            src="{{asset('frontend/assets/images/story/01.jpg')}}"
                                            alt="dating thumb"></a>
                                    <span class="member__activity member__activity--ofline">Entertainment</span>
                                </div>
                                <div class="story__content">
                                    <a href="blog-single.html">
                                        <h4>Dream places and locations to visit in 2022</h4>
                                    </a>
                                    <div class="story__content--author">
                                        <div class="story__content--thumb">
                                            <img src="{{asset('frontend/assets/images/story/author/01.jpg')}}"
                                                alt="dating thumb">
                                        </div>
                                        <div class="story__content--content">
                                            <h6>Hester Reeves</h6>
                                            <p>April 16, 2022</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col wow fadeInUp" data-wow-duration="1.6s">
                        <div class="story__item">
                            <div class="story__inner">
                                <div class="story__thumb">
                                    <a href="blog-single.html"><img
                                            src="{{asset('frontend/assets/images/story/02.jpg')}}"
                                            alt="dating thumb"></a>
                                    <span class="member__activity member__activity--ofline">Love Stories</span>
                                </div>
                                <div class="story__content">
                                    <a href="blog-single.html">
                                        <h4>Make your dreams come true and monetise quickly</h4>
                                    </a>
                                    <div class="story__content--author">
                                        <div class="story__content--thumb">
                                            <img src="{{asset('frontend/assets/images/story/author/02.jpg')}}"
                                                alt="dating thumb">
                                        </div>
                                        <div class="story__content--content">
                                            <h6>Arika Q Smith</h6>
                                            <p>March 14, 2022</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col wow fadeInUp" data-wow-duration="1.7s">
                        <div class="story__item">
                            <div class="story__inner">
                                <div class="story__thumb">
                                    <a href="blog-single.html"><img
                                            src="{{asset('frontend/assets/images/story/03.jpg')}}"
                                            alt="dating thumb"></a>
                                    <span class="member__activity member__activity--ofline">Attraction</span>
                                </div>
                                <div class="story__content">
                                    <a href="blog-single.html">
                                        <h4>Love looks not with the eyes, but with the mind.</h4>
                                    </a>
                                    <div class="story__content--author">
                                        <div class="story__content--thumb">
                                            <img src="{{asset('frontend/assets/images/story/author/03.jpg')}}"
                                                alt="dating thumb">
                                        </div>
                                        <div class="story__content--content">
                                            <h6>William Show</h6>
                                            <p>June 18, 2022</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ================> Story section end here <================== -->


    <!-- ================> Member section start here <================== -->
    <div class="member member--style2 padding-top padding-bottom">
        <div class="container">
            <div class="section__header style-2 text-center wow fadeInUp" data-wow-duration="1.5s">
                <h2>Most Popular Members</h2>
                <p>Learn from them and try to make it to this board. This will for sure boost you visibility and
                    increase your chances to find you loved one.</p>
            </div>
            <div class="section__wrapper wow fadeInUp" data-wow-duration="1.5s">
                <ul class="nav nav-tabs member__tab" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="newest-tab" data-bs-toggle="tab" data-bs-target="#newest"
                            type="button" role="tab" aria-controls="newest" aria-selected="true">Newest Members</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="activemember-tab" data-bs-toggle="tab"
                            data-bs-target="#activemember" type="button" role="tab" aria-controls="activemember"
                            aria-selected="false">Active Members</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="popularmember-tab" data-bs-toggle="tab"
                            data-bs-target="#popularmember" type="button" role="tab" aria-controls="popularmember"
                            aria-selected="false">Popular Members</button>
                    </li>
                </ul>

                <div class="tab-content mx-12-none" id="myTabContent">
                    <div class="tab-pane fade show active" id="newest" role="tabpanel" aria-labelledby="newest-tab">
                        <div class="row g-0 justify-content-center">
                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/01.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>Smith Jhonson</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/02.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity member__activity--ofline"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>Arika Q Smith</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/03.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>William R Show</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/04.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity member__activity--ofline"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>Karolin Kuhn</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/05.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>Tobias Wagner</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/06.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>Amanda Rodrigues</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/07.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity member__activity--ofline"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>Barros Pereira</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/08.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>Emily Fernandes</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/09.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity member__activity--ofline"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>Alves Fernandes</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/02.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>Sousa Carvalho</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="activemember" role="tabpanel" aria-labelledby="activemember-tab">
                        <div class="row g-0 justify-content-center">
                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/01.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>Smith Jhonson</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/06.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>Amanda Rodrigues</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/07.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity member__activity--ofline"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>Barros Pereira</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/08.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>Emily Fernandes</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/09.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity member__activity--ofline"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>Alves Fernandes</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>

                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/02.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity member__activity--ofline"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>Arika Q Smith</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/03.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>William R Show</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/04.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity member__activity--ofline"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>Karolin Kuhn</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/05.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>Tobias Wagner</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/02.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>Sousa Carvalho</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="popularmember" role="tabpanel" aria-labelledby="popularmember-tab">
                        <div class="row g-0 justify-content-center">
                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/04.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity member__activity--ofline"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>Karolin Kuhn</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/05.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>Tobias Wagner</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/06.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>Amanda Rodrigues</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/07.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity member__activity--ofline"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>Barros Pereira</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/08.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>Emily Fernandes</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/09.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity member__activity--ofline"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>Alves Fernandes</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/01.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>Smith Jhonson</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/02.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity member__activity--ofline"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>Arika Q Smith</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/03.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>William R Show</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="member__item">
                                <div class="member__inner">
                                    <div class="member__thumb">
                                        <img src="{{asset('frontend/assets/images/member/home2/02.jpg')}}"
                                            alt="member-img">
                                        <span class="member__activity"></span>
                                    </div>
                                    <div class="member__content">
                                        <a href="member-single.html">
                                            <h5>Sousa Carvalho</h5>
                                        </a>
                                        <p>registered 4 months, 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <a href="members.html" class="default-btn"><span>See More Popular</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- ================> Member section end here <================== -->


    <!-- ================> About section start here <================== -->
    <div class="about padding-top padding-bottom bg_img"
        style="background-image: url({{asset('frontend/assets/images/bg-img/02.jpg')}});">
        <div class="container">
            <div class="section__header style-2 text-center wow fadeInUp" data-wow-duration="1.5s">
                <h2>Why Choose Ollya</h2>
                <p>Our dating platform is like a breath of fresh air. Clean and trendy design with ready to use features
                    we are sure you will love.</p>
            </div>
            <div class="section__wrapper">
                <div class="row g-4 justify-content-center row-cols-xl-4 row-cols-lg-3 row-cols-sm-2 row-cols-1">
                    <div class="col wow fadeInUp" data-wow-duration="1.5s">
                        <div class="about__item text-center">
                            <div class="about__inner">
                                <div class="about__thumb">
                                    <img src="{{asset('frontend/assets/images/about/01.jpg')}}" alt="dating thumb">
                                </div>
                                <div class="about__content">
                                    <h4>Simple To Use</h4>
                                    <p>Simple steps to follow to have a matching connection.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col wow fadeInUp" data-wow-duration="1.6s">
                        <div class="about__item text-center">
                            <div class="about__inner">
                                <div class="about__thumb">
                                    <img src="{{asset('frontend/assets/images/about/02.jpg')}}" alt="dating thumb">
                                </div>
                                <div class="about__content">
                                    <h4>Smart Matching</h4>
                                    <p>Create connections with users that are like you.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col wow fadeInUp" data-wow-duration="1.7s">
                        <div class="about__item text-center">
                            <div class="about__inner">
                                <div class="about__thumb">
                                    <img src="{{asset('frontend/assets/images/about/03.jpg')}}" alt="dating thumb">
                                </div>
                                <div class="about__content">
                                    <h4>Filter Very Fast</h4>
                                    <p>Don’t waste your time! Find only what you are interested</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col wow fadeInUp" data-wow-duration="1.8s">
                        <div class="about__item text-center">
                            <div class="about__inner">
                                <div class="about__thumb">
                                    <img src="{{asset('frontend/assets/images/about/04.jpg')}}" alt="dating thumb">
                                </div>
                                <div class="about__content">
                                    <h4>Cool Community</h4>
                                    <p>BuddyPress network is full of cool members.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ================> About section end here <================== -->


    <!-- Transportation Section Start Here -->
    <section class="transportation padding-top padding-bottom">
        <div class="container">
            <div class="section__wrapper">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="left">
                            <div class="section__header style-2 mb-lg-0 wow fadeInUp" data-wow-duration="1.5s">
                                <h2>Meet Singles in Your Area</h2>
                                <p>If you want to meet local singles for dating, companionship, friendship or even more,
                                    you have come to the right place.</p>
                                <ul>
                                    <li>
                                        <div class="thumb"> <img
                                                src="{{asset('frontend/assets/images/transport/01.jpg')}}"
                                                alt="lab-trensport"></div>
                                        <div class="content"><a href="members.html">United kingdom</a></div>
                                    </li>
                                    <li>
                                        <div class="thumb"> <img
                                                src="{{asset('frontend/assets/images/transport/02.jpg')}}"
                                                alt="lab-trensport"></div>
                                        <div class="content"><a href="members.html">Germany</a></div>
                                    </li>
                                    <li>
                                        <div class="thumb"> <img
                                                src="{{asset('frontend/assets/images/transport/03.jpg')}}"
                                                alt="lab-trensport"></div>
                                        <div class="content"><a href="members.html">United states</a></div>
                                    </li>
                                    <li>
                                        <div class="thumb"> <img
                                                src="{{asset('frontend/assets/images/transport/04.jpg')}}"
                                                alt="lab-trensport"></div>
                                        <div class="content"><a href="members.html">Brazil</a></div>
                                    </li>
                                    <li>
                                        <div class="thumb"> <img
                                                src="{{asset('frontend/assets/images/transport/05.jpg')}}"
                                                alt="lab-trensport"></div>
                                        <div class="content"><a href="members.html">Falkland islands</a></div>
                                    </li>
                                    <li>
                                        <div class="thumb"> <img
                                                src="{{asset('frontend/assets/images/transport/06.jpg')}}"
                                                alt="lab-trensport"></div>
                                        <div class="content"><a href="members.html">Portugal</a></div>
                                    </li>
                                    <li>
                                        <div class="thumb"> <img
                                                src="{{asset('frontend/assets/images/transport/07.jpg')}}"
                                                alt="lab-trensport"></div>
                                        <div class="content"><a href="members.html">Australia</a></div>
                                    </li>
                                    <li>
                                        <div class="thumb"> <img
                                                src="{{asset('frontend/assets/images/transport/08.jpg')}}"
                                                alt="lab-trensport"></div>
                                        <div class="content"><a href="members.html">India</a></div>
                                    </li>
                                    <li>
                                        <div class="thumb"> <img
                                                src="{{asset('frontend/assets/images/transport/09.jpg')}}"
                                                alt="lab-trensport"></div>
                                        <div class="content"><a href="members.html">South Africa</a></div>
                                    </li>
                                    <li>
                                        <div class="thumb"> <img
                                                src="{{asset('frontend/assets/images/transport/10.jpg')}}"
                                                alt="lab-trensport"></div>
                                        <div class="content"><a href="members.html">Bangladesh</a></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-12">
                        <div class="right wow fadeInUp" data-wow-duration="1.5s">
                            <div class="lab-line">
                                <span></span>
                                <div class="lab-tooltip"><a href="members.html">United kingdom</a></div>
                            </div>
                            <div class="lab-line">
                                <span></span>
                                <div class="lab-tooltip"><a href="members.html">United states</a></div>
                            </div>
                            <div class="lab-line">
                                <span></span>
                                <div class="lab-tooltip"><a href="members.html">Falkland islands</a></div>
                            </div>
                            <div class="lab-line">
                                <span></span>
                                <div class="lab-tooltip"><a href="members.html">Australia</a></div>
                            </div>
                            <div class="lab-line">
                                <span></span>
                                <div class="lab-tooltip"><a href="members.html">South Africa</a></div>
                            </div>
                            <div class="lab-line">
                                <span></span>
                                <div class="lab-tooltip"><a href="members.html">Germany</a></div>
                            </div>
                            <div class="lab-line">
                                <span></span>
                                <div class="lab-tooltip"><a href="members.html">Brazil</a></div>
                            </div>
                            <div class="lab-line">
                                <span></span>
                                <div class="lab-tooltip"><a href="members.html">Portugal</a></div>
                            </div>
                            <div class="lab-line">
                                <span></span>
                                <div class="lab-tooltip"><a href="members.html">India</a></div>
                            </div>
                            <div class="lab-line">
                                <span></span>
                                <div class="lab-tooltip"><a href="members.html">Bangladesh</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Transportation Section Ending Here -->


    <!-- ================> Work section start here <================== -->
    <div class="work work--style2 padding-top padding-bottom bg_img"
        style="background-image: url({{asset('frontend/assets/images/bg-img/01.jpg')}});">
        <div class="container">
            <div class="section__wrapper">
                <div class="row g-4 justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-12 wow fadeInLeft" data-wow-duration="1.5s">
                        <div class="work__item">
                            <div class="work__inner">
                                <div class="work__thumb">
                                    <img src="{{asset('frontend/assets/images/work/09.png')}}" alt="dating thumb">
                                </div>
                                <div class="work__content">
                                    <h3>Trust And Safety</h3>
                                    <p>Choose from one of our membership levels and unlock features you need. </p>
                                    <a href="policy.html" class="default-btn"><span>See More Details</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-8 col-12 wow fadeInRight" data-wow-duration="1.5s">
                        <div class="work__item">
                            <div class="work__inner">
                                <div class="work__thumb">
                                    <img src="{{asset('frontend/assets/images/work/10.png')}}" alt="dating thumb">
                                </div>
                                <div class="work__content">
                                    <h3>Simple Membership</h3>
                                    <p>Choose from one of our membership levels and unlock features you need. </p>
                                    <a href="membership.html" class="default-btn reverse"><span>Membership
                                            Details</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ================> Work section end here <================== -->


    <!-- ================> App section start here <================== -->
    <div class="app app--style2 padding-top padding-bottom">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-xxl-6 col-12">
                    <div class="app__item wow fadeInUp" data-wow-duration="1.5s">
                        <div class="app__inner">
                            <div class="app__content text-center">
                                <h4>Download App Our Ollya</h4>
                                <h2>Easy Connect To Everyone</h2>
                                <p>You find us, finally and you are already in love. More than 5.000.000 around the
                                    world already shared the same experience andng ares uses our system Joining us today
                                    just got easier!</p>
                                <ul class="justify-content-center">
                                    <li><a href="#"><img src="assets/images/app/01.jpg" alt="dating thumb"></a></li>
                                    <li><a href="#"><img src="assets/images/app/02.jpg" alt="dating thumb"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ================> App section end here <================== -->


    <!-- ================> Footer section start here <================== -->
    <footer class="footer footer--style2">
        <div class="footer__top bg_img"
            style="background-image: url({{asset('frontend/assets/images/footer/bg.jpg')}})">
            <div class="footer__newsletter wow fadeInUp" data-wow-duration="1.5s">
                <div class="container">
                    <div class="row g-4 justify-content-center">
                        <div class="col-lg-6 col-12">
                            <div class="footer__newsletter--area">
                                <div class="footer__newsletter--title">
                                    <h4>Newsletter Sign up</h4>
                                </div>
                                <div class="footer__newsletter--form">
                                    <form action="#">
                                        <input type="email" placeholder="Your email address">
                                        <button type="submit" class="default-btn"><span>Subscribe</span></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="footer__newsletter--area justify-content-xxl-end">
                                <div class="footer__newsletter--title me-xl-4">
                                    <h4>Join Community</h4>
                                </div>
                                <div class="footer__newsletter--social">
                                    <ul>
                                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-twitch"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-dribbble"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-facebook-messenger"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__toparea padding-top padding-bottom wow fadeInUp" data-wow-duration="1.5s">
                <div class="container">
                    <div class="row g-4">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="footer__item footer--about">
                                <div class="footer__inner">
                                    <div class="footer__content">
                                        <div class="footer__content--title">
                                            <h4>About Ollya</h4>
                                        </div>
                                        <div class="footer__content--desc">
                                            <p>Ollya is a friendly dating theme based on HTML template for the community
                                                functionality</p>
                                        </div>
                                        <div class="footer__content--info">
                                            <p><b>Address :</b> Suite-13 Tropical Center New Elephant Road 1205</p>
                                            <p><b>Contact :</b> +30 226 4881 514 www.yoursitename.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="footer__item footer--feature">
                                <div class="footer__inner">
                                    <div class="footer__content">
                                        <div class="footer__content--title">
                                            <h4>Featured Members</h4>
                                        </div>
                                        <div class="footer__content--desc">
                                            <ul>
                                                <li>
                                                    <div class="thumb position-relative">
                                                        <img src="{{asset('frontend/assets/images/footer/feature/01.jpg')}}"
                                                            alt="member-img">
                                                        <span class="feature__activity"></span>
                                                    </div>
                                                    <div class="content">
                                                        <a href="member-single.html">
                                                            <h6>Samantha Lee</h6>
                                                        </a>
                                                        <p>Active</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="thumb position-relative">
                                                        <img src="{{asset('frontend/assets/images/footer/feature/02.jpg')}}"
                                                            alt="member-img">
                                                        <span
                                                            class="feature__activity feature__activity--ofline"></span>
                                                    </div>
                                                    <div class="content">
                                                        <a href="member-single.html">
                                                            <h6>Peter McMillan</h6>
                                                        </a>
                                                        <p>2 Hours Ago</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="thumb position-relative">
                                                        <img src="{{asset('frontend/assets/images/footer/feature/03.jpg')}}"
                                                            alt="member-img">
                                                        <span class="feature__activity"></span>
                                                    </div>
                                                    <div class="content">
                                                        <a href="member-single.html">
                                                            <h6>Tluagtea Tualzik</h6>
                                                        </a>
                                                        <p>Active</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="footer__item footer--support">
                                <div class="footer__inner">
                                    <div class="footer__content">
                                        <div class="footer__content--title">
                                            <h4>Contacts & Support</h4>
                                        </div>
                                        <div class="footer__content--desc">
                                            <ul>
                                                <li><a href="#"><i class="fa-solid fa-angle-right"></i> About Us</a>
                                                </li>
                                                <li><a href="#"><i class="fa-solid fa-angle-right"></i> Our Team</a>
                                                </li>
                                                <li><a href="#"><i class="fa-solid fa-angle-right"></i> Testimonials</a>
                                                </li>
                                                <li><a href="#"><i class="fa-solid fa-angle-right"></i> Get in Touch</a>
                                                </li>
                                                <li><a href="#"><i class="fa-solid fa-angle-right"></i> FAQ</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="footer__item footer--activity">
                                <div class="footer__inner">
                                    <div class="footer__content">
                                        <div class="footer__content--title">
                                            <h4>Recent Activity</h4>
                                        </div>
                                        <div class="footer__content--desc">
                                            <ul>
                                                <li>
                                                    <div class="thumb">
                                                        <a href="group-single.html"><img
                                                                src="{{asset('frontend/assets/images/footer/activity/01.jpg')}}"
                                                                alt="dating thumb"></a>
                                                    </div>
                                                    <div class="content">
                                                        <a href="group-single.html">
                                                            <h6>Where to find a good...</h6>
                                                        </a>
                                                        <p>August 13, 2022</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="thumb">
                                                        <a href="group-single.html"><img
                                                                src="{{asset('frontend/assets/images/footer/activity/02.jpg')}}"
                                                                alt="dating thumb"></a>
                                                    </div>
                                                    <div class="content">
                                                        <a href="group-single.html">
                                                            <h6>Where to find a good...</h6>
                                                        </a>
                                                        <p>August 13, 2022</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="thumb">
                                                        <a href="group-single.html"><img
                                                                src="{{asset('frontend/assets/images/footer/activity/03.jpg')}}"
                                                                alt="dating thumb"></a>
                                                    </div>
                                                    <div class="content">
                                                        <a href="group-single.html">
                                                            <h6>Where to find a good...</h6>
                                                        </a>
                                                        <p>August 13, 2022</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer__bottom wow fadeInUp" data-wow-duration="1.5s">
            <div class="container">
                <div class="footer__content text-center">
                    <p class="mb-0">All Rights Reserved &copy; <a href="index.html">Ollya</a> || Design By: CodexCoder
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- ================> Footer section end here <================== -->


    <!-- All Needed JS -->
    <script src="{{asset('frontend/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/modernizr-3.11.2.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/swiper.min.js')}}"></script>
    <!-- <script src="assets/js/all.min.js"></script> -->
    <script src="{{asset('frontend/assets/js/wow.js')}}"></script>
    <script src="{{asset('frontend/assets/js/counterup.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/lightcase.js')}}"></script>
    <script src="{{asset('frontend/assets/js/waypoints.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins.js')}}"></script>
    <script src="{{asset('frontend/assets/js/main.js')}}"></script>


    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
        window.ga = function () {
			ga.q.push(arguments)
		};
		ga.q = [];
		ga.l = +new Date;
		ga('create', 'UA-XXXXX-Y', 'auto');
		ga('set', 'anonymizeIp', true);
		ga('set', 'transport', 'beacon');
		ga('send', 'pageview')
    </script>
    <script src="../../../../www.google-analytics.com/analytics.js" async></script>
</body>

<!-- Mirrored from demos.codexcoder.com/themeforest/html/ollya/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Dec 2023 08:37:08 GMT -->

</html>