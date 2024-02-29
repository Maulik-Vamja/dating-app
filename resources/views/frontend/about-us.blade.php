@extends('frontend.layouts.app')
@section('seo-meta')
    <title>Know More About Secure Adult Entertainers Platform | IFindYou </title>
    <meta name="description" content="Trusted and secure adult entertainers platform featuring at IFindYou, massage providers, and adult entertainers. Enjoy adult quality services. Sign up today!">
    <link rel="canonical" href="{{ url()->current() }}" />
@endsection


@section('og-meta')
    <meta property="og:type" content="website">
    <!-- Dynamic OG meta tags -->
    <meta property="og:title" content="Know More About Secure Adult Entertainers Platform | IFindYou ">
    <meta property="og:description" content=" Trusted and secure adult entertainers platform featuring at IFindYou, massage providers, and adult entertainers. Enjoy adult quality services. Sign up today!">
    <meta property="og:image" content="{{asset('frontend/og_images/home.jpg')}}">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection
@section('content')
<!-- ================> Page Header section start here <================== -->
<div class="pageheader bg_img"
    style="background-image: url({{asset('frontend/assets/images/bg-img/pageheader.jpg')}});">
    <div class="container">
        <div class="pageheader__content text-center">
            <h2>About <u>iFindYou</u> </h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    {{-- <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About Us</li> --}}
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- ================> Page Header section end here <================== -->


<!-- ================> About section start here <================== -->
<div class="about about--style5 padding-top padding-bottom">
    <div class="container">
        <div class="row justify-content-center g-4 align-items-center">
            <div class="col-lg-6 col-12">
                <div class="about__thumb">
                    <img src="{{asset('frontend/assets/images/about/01.png')}}" alt="dating thumb">
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="about__content">
                    <h2>iFindYou.co</h2>
                    <h5>Trusted & Most Secure Adult Entertainer Platform</h5>
                    <p>Welcome to your new Home/iFindyou.co, where we prioritize the well-being and success of Adult Entertrainer, BDSM practitioners,
                    massage providers, and adult entertainers. Free for all Gender and demographics</p>
                    <p>With a commitment to fair pricing and ongoing improvement, we've become the go-to Tryst Alternative, Backpage
                    alternative, Megapersonals Alternative, that Adult Entertrainers worldwide have been seeking.</p>

                    <p>Join us for a reliable and enhanced experience. Currently we are offering a free profile & tailored to meet the unique
                    needs of the adult entertainment industry.</p>
                    <a href="/register" class="default-btn reverse"><span>Free Registration</span></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="about padding-top padding-bottom bg_img"
    style="background-image: url({{asset('frontend/assets/images/bg-img/02.jpg')}});">
    <div class="container">
        <div class="section__header style-2 text-center wow fadeInUp" data-wow-duration="1.5s">
            <h2>Why Choose iFindYou ?</h2>
            <p>Free Register today and effortlessly update your profile, ensuring visibility to a broad audience within
                our platform.</p>
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
                                <h4>Free Adult Directory</h4>
                                <p>Now We are Offering Free SingUp ! </p>
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
                                <p>We didnt shared listed data to 3rd party.</p>
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
                                <h4>Happy Community</h4>
                                <p>It's open to individuals worldwide.</p>
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
                                <h4>Smart Matching</h4>
                                <p>Connecting you with users who share common interests.</p>
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
            <h2>Read Most Sensual Article</h2>
            <p>Listen and learn from our community members and find out tips and tricks to meet your love. Join us
                and be part of a bigger family.</p>
        </div>
        <div class="section__wrapper">
            <div class="row g-4 justify-content-center row-cols-lg-3 row-cols-sm-2 row-cols-1">
                @foreach ($blogs as $blog)
                <div class="col wow fadeInUp" data-wow-duration="1.5s">
                    <div class="story__item">
                        <div class="story__inner">
                            <div class="story__thumb">

                                <a href="{{ route('blogs.show',$blog->slug) }}">
                                    <img src="{{ filter_var($blog->image, FILTER_VALIDATE_URL) == false ? \Storage::url($blog->image) : $blog->image }}"
                                        alt="dating thumb"
                                        style="max-height: 250px !important; height: auto; object-fit: cover;">
                                </a>
                                <span class="member__activity member__activity--ofline">{{
                                    $blog->category->name }}</span>
                            </div>
                            <div class="story__content">
                                <a href="{{ route('blogs.show',$blog->slug) }}">
                                    <h4>{{ $blog->title }}</h4>
                                </a>
                                <div class="story__content--author">
                                    <div class="story__content--thumb">
                                        <img height="50" width="50" src="{{ $blog->user->profile_photo }}"
                                            alt="dating thumb">
                                    </div>
                                    <div class="story__content--content">
                                        <h6>{{ $blog->user->full_name }}</h6>
                                        <p>{{ Carbon\Carbon::parse($blog->created_at)->format('M d,Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- ================> Story section end here <================== -->


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
                                <a href="/contact-us" class="default-btn"><span>Contact Us</span></a>
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
                                <p>Dont be late, Currently we are offering free  Registration. </p>
                                <a href="membership.html" class="default-btn reverse"><span>Create
                                        Profile</span></a>
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
                            <h4>Coming Soon</h4>
                            <h2>Easy Connect To Everyone</h2>
                            <p>You find us, finally and you are already in love. More than 4.000.000 around the
                                world already shared the same experience with Joining us today!</p>
                            <ul class="justify-content-center">
                                <li><a href="#"><img src="{{asset('frontend/assets/images/app/01.jpg')}}"
                                            alt="dating thumb"></a></li>
                                <li><a href="#"><img src="{{asset('frontend/assets/images/app/02.jpg')}}"
                                            alt="dating thumb"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ================> App section end here <================== -->
@endsection
