@extends('frontend.layouts.app')

@section('seo-meta')
<title>Find Your Perfect Adult friend at IFindYou | Incall Adult Service</title>
<meta name="description"
    content="Best platform to find Adult entertainers around the world. Just specify what you are looking for in the search and you can meet the one you desire.">
<link rel="canonical" href="{{ url()->current() }}" />
@endsection


@section('og-meta')
<meta property="og:type" content="website">
<!-- Dynamic OG meta tags -->
<meta property="og:title" content="Find Your Perfect Adult friend at IFindYou | Incall Adult Service">
<meta property="og:description"
    content="Best platform to find Adult entertainers around the world. Just specify what you are looking for in the search and you can meet the one you desire.">
<meta property="og:image" content="{{asset('frontend/og_images/home.jpg')}}">
<meta property="og:url" content="{{ url()->current() }}">
@endsection
@section('content')
<!-- ================> Banner section start here <================== -->
<div class="banner banner--style2  bg_img"
    style="background-image: url({{asset('frontend/assets/images/banner/bg-2.jpg')}});">
    <div class="video-container">
        <video src="{{asset('i-find-you-video.mp4')}}" autoplay loop muted></video>
    </div>
    <div class="about about--style2" style="max-width: 992px;margin:0 auto;">
        <div class="container">
            <div class="section__wrapper wow fadeInUp" data-wow-duration="1.5s">
                <div class="row g-0 justify-content-center row-cols-lg-2 row-cols-1">
                    <div class="col">
                        <div class="about__left h-100">
                            <div class="about__top">
                                <div class="about__content">
                                    <h1 class="font-weight-bold" style="font-size: 25px;">Find Your Adult Entertainer
                                    </h1>
                                    <p>You find us, finally, and you are already in love. More than 300 female & Male
                                        Adult Entertrainer around the world.</p>
                                    @auth
                                    <a href="{{ route('profile.edit') }}" class="default-btn style-2">
                                        <span>Update Profile</span>
                                    </a>
                                    @endauth
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

                                            @foreach ($escorts as $escort)
                                            @php
                                            $random_image = $escort->gallery_images()->inRandomOrder()->first();
                                            @endphp
                                            <div class="swiper-slide">
                                                <div class="ragi__thumb">
                                                    <a href="{{ route('get.escort',$escort->user_name) }}">
                                                        <img class="rounded-circle"
                                                            style="width: 100px; height: 100px; object-fit: cover;"
                                                            src="{{$random_image ? (filter_var($random_image->image,FILTER_VALIDATE_URL) == false ? Storage::url($random_image->image) : $random_image->image) : asset('frontend/assets/images/allmedia/01.jpg')}}"
                                                            alt="{{$escort->full_name}}">

                                                    </a>
                                                </div>
                                            </div>

                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="about__right ">
                            <div class="about__title">
                                <h2 style="font-size: 25px;">Find Your best Match</h2>
                            </div>
                            <form action="{{ route('get.escorts') }}" method="GET">
                                <div class="banner__list">
                                    <div class="row">
                                        <div class="col-6 ">
                                            <label>I am a </label>
                                            <div class="banner__inputlist">
                                                <select>
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
                                                <select name="gender" id="gender">
                                                    <option>Select Gender</option>
                                                    <option value="male">Male</option>
                                                    <option selected value="female">Female</option>
                                                    <option value="non-binary">Non Binary</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="min_age" id="min_age" value="18">
                                <input type="hidden" name="max_age" id="max_age" value="40">
                                <div class="banner__list">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <label class="m-0">Age</label>
                                            <div class="range-slider">
                                                <span class="rangeValues"></span>
                                                <input value="18" min="18" max="60" step="1" type="range">
                                                <input value="40" min="18" max="60" step="1" type="range">
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
                                    <div class="col-12" style="margin-top: 10px;">
                                        <div class="row">
                                            <div class="col-6">
                                                <label>State</label>
                                                <div class="banner__inputlist">
                                                    <select id="state" name="state">
                                                        <option value="">Select Country First</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <label>City</label>
                                                <div class="banner__inputlist">
                                                    <select id="city" name="city">
                                                        <option value="">Select State First</option>
                                                    </select>
                                                </div>
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
</div>

<!-- ================> Banner section end here <================== -->
<!-- ================> Member section start here <================== -->
<div class="member member--style2 padding-top">
    <div class="container">
        <div class="section__header style-2 text-center wow fadeInUp" data-wow-duration="1.5s">
            <h2>Recent Active Members</h2>
            <p>Find your match from recently active members. Who is still waiting for your knock.</p>
        </div>
        <div class="section__wrapper wow fadeInUp" data-wow-duration="1.5s">
            <div class="tab-content mx-12-none">
                <div class="row g-0 justify-content-center">
                    @foreach ($escorts as $escort)
                    @php
                    $random_image = $escort->gallery_images()->inRandomOrder()->first();
                    @endphp
                    <div class="member__item">
                        <div class="member__inner">
                            <div class="member__thumb">
                                <a class="member-link-page" href="{{ route('get.escort',$escort->user_name) }}">
                                    <figure><img
                                            src="{{$random_image ? (filter_var($random_image->image,FILTER_VALIDATE_URL) == false ? Storage::url($random_image->image) : $random_image->image) : asset('frontend/assets/images/allmedia/01.jpg')}}"
                                            alt="{{ $escort->full_name }}">
                                    </figure>
                                </a>
                            </div>
                            <div class="member__content w-100">
                                <a class="member-link-page" href="{{ route('get.escort',$escort->user_name) }}">
                                    <h5>{{ $escort->full_name }}</h5>
                                </a>
                                @php
                                $today = Carbon\Carbon::now()->format('l');
                                $availableOrNot = json_decode($escort->availibility,true);
                                @endphp
                                <p class="short__desc mt-1">{{ $escort->short_description }}</p>
                                <div class="city-availibity mt-2 d-flex justify-content-between">
                                    <p><i class="fa-solid fa-house"></i>{{ $escort->home_address?->city?->name }}, {{
                                        $escort->home_address?->state?->name }},
                                        {{ $escort->home_address?->country?->iso2 }}</p>
                                    <p class="d-flex align-items-center text-capitalize">
                                        <span
                                            class="{{ isset($availableOrNot[$today])  ? '' : 'not-avail' }} availibity-members"></span>available
                                    </p>
                                </div>
                                <div class="member-bio">
                                    <p class="member__desc-txt">{!! $escort->description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('get.escorts') }}" class="default-btn"><span>See More</span></a>
            </div>
        </div>
    </div>
</div>
<!-- ================> Member section end here <================== -->
<div class="about padding-top padding-bottom">
    <div class="container">
        <div class="section__header style-2 text-center wow fadeInUp" data-wow-duration="1.5s">
            <h2>It all begins with a Knock</h2>
            <p>There are many members in different activities. You can browse the listing and checkout them Like
                Megapersonals & Eros</p>
        </div>
        <div class="section__wrapper">
            <div class="row g-4 justify-content-center row-cols-xl-4 row-cols-lg-3 row-cols-sm-2 row-cols-1">
                <div class="col wow fadeInUp" data-wow-duration="1.5s">
                    <div class="about__item text-center">
                        <div class="about__inner">
                            <div class="about__thumb">
                                <img src="{{asset('frontend/assets/images/about/icon/01.png')}}" alt="Total Members">
                            </div>
                            <div class="about__content">
                                <h3><span class="counter" data-to="{{ $counts['total_escorts'] }}"
                                        data-speed="1500"></span></h3>
                                <p>Members in Total</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col wow fadeInUp" data-wow-duration="1.6s">
                    <div class="about__item text-center">
                        <div class="about__inner">
                            <div class="about__thumb">
                                <img src="{{asset('frontend/assets/images/about/icon/02.png')}}"
                                    alt="Available memebers">
                            </div>
                            <div class="about__content">
                                <h3><span class="counter" data-to="{{ $counts['total_online_escorts'] }}"
                                        data-speed="1500"></span></h3>
                                <p>Members Available</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col wow fadeInUp" data-wow-duration="1.7s">
                    <div class="about__item text-center">
                        <div class="about__inner">
                            <div class="about__thumb">
                                <img src="{{asset('frontend/assets/images/about/icon/03.png')}}" alt="Women Online">
                            </div>
                            <div class="about__content">
                                <h3><span class="counter" data-to="{{ $counts['total_female_escorts'] }}"
                                        data-speed="1500"></span></h3>
                                <p>Women Online</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col wow fadeInUp" data-wow-duration="1.8s">
                    <div class="about__item text-center">
                        <div class="about__inner">
                            <div class="about__thumb">
                                <img src="{{asset('frontend/assets/images/about/icon/04.png')}}" alt="Men Online">
                            </div>
                            <div class="about__content">
                                <h3><span class="counter" data-to="{{ $counts['total_male_escorts'] }}"
                                        data-speed="1500"></span></h3>
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
                                        alt="{{$blog->title  }}"
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


<!-- ================> About section start here <================== -->
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
                                <img src="{{asset('frontend/assets/images/about/01.jpg')}}" alt="Free Adult Directory">
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
                                <img src="{{asset('frontend/assets/images/about/02.jpg')}}" alt="Smart Matching">
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
                                <img src="{{asset('frontend/assets/images/about/03.jpg')}}" alt="happy Community">
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
                                <img src="{{asset('frontend/assets/images/about/04.jpg')}}" alt="Smart Matching">
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


<!-- Transportation Section Start Here -->
<section class="transportation padding-top padding-bottom">
    <div class="container">
        <div class="section__wrapper">
            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="left">
                        <div class="section__header style-2 mb-lg-0 wow fadeInUp" data-wow-duration="1.5s">
                            <h2>Lets create a vibrant adult community</h2>
                            <p>If you want to meet local adult Entertrainer for dating, Adult Job, Video Call
                                ,Companionship,
                                Friendship or even more,
                                you have come to the right place.</p>
                            <ul>
                                <li>
                                    <div class="thumb"> <img alt="United Kingdom Flag"
                                            src="{{asset('frontend/assets/images/transport/01.jpg')}}"></div>
                                    <div class="content"><a href="#">United Kingdom</a></div>
                                </li>
                                <li>
                                    <div class="thumb"> <img alt="Germany Flag"
                                            src="{{asset('frontend/assets/images/transport/02.jpg')}}"></div>
                                    <div class="content"><a href="#">Germany</a></div>
                                </li>
                                <li>
                                    <div class="thumb"> <img alt="United States Flag"
                                            src="{{asset('frontend/assets/images/transport/03.jpg')}}"></div>
                                    <div class="content"><a href="#">United States</a></div>
                                </li>
                                <li>
                                    <div class="thumb"> <img alt="Brazil Flag"
                                            src="{{asset('frontend/assets/images/transport/04.jpg')}}"></div>
                                    <div class="content"><a href="#">Brazil</a></div>
                                </li>
                                <li>
                                    <div class="thumb"> <img alt="Falkland Islands Flag"
                                            src="{{asset('frontend/assets/images/transport/05.jpg')}}"></div>
                                    <div class="content"><a href="#">Falkland Islands</a></div>
                                </li>
                                <li>
                                    <div class="thumb"> <img alt="Portugal Flag"
                                            src="{{asset('frontend/assets/images/transport/06.jpg')}}"></div>
                                    <div class="content"><a href="#">Portugal</a></div>
                                </li>
                                <li>
                                    <div class="thumb"> <img alt="Australia Flag"
                                            src="{{asset('frontend/assets/images/transport/07.jpg')}}"></div>
                                    <div class="content"><a href="#">Australia</a></div>
                                </li>
                                <li>
                                    <div class="thumb"> <img alt="India Flag"
                                            src="{{asset('frontend/assets/images/transport/08.jpg')}}"></div>
                                    <div class="content"><a href="#">India</a></div>
                                </li>
                                <li>
                                    <div class="thumb"> <img alt="South Africa Flag"
                                            src="{{asset('frontend/assets/images/transport/09.jpg')}}"></div>
                                    <div class="content"><a href="#">South Africa</a></div>
                                </li>
                                {{-- <li>
                                    <div class="thumb"> <img src="{{asset('frontend/assets/images/transport/10.jpg')}}"
                                            alt="lab-trensport"></div>
                                    <div class="content"><a href="#">Thailand</a></div>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12">
                    <div class="right wow fadeInUp" data-wow-duration="1.5s">
                        <div class="lab-line">
                            <span></span>
                            <div class="lab-tooltip"><a href="#">United kingdom</a></div>
                        </div>
                        <div class="lab-line">
                            <span></span>
                            <div class="lab-tooltip"><a href="#">United states</a></div>
                        </div>
                        <div class="lab-line">
                            <span></span>
                            <div class="lab-tooltip"><a href="#">Falkland islands</a></div>
                        </div>
                        <div class="lab-line">
                            <span></span>
                            <div class="lab-tooltip"><a href="#">Australia</a></div>
                        </div>
                        <div class="lab-line">
                            <span></span>
                            <div class="lab-tooltip"><a href="#">South Africa</a></div>
                        </div>
                        <div class="lab-line">
                            <span></span>
                            <div class="lab-tooltip"><a href="#">Germany</a></div>
                        </div>
                        <div class="lab-line">
                            <span></span>
                            <div class="lab-tooltip"><a href="#">Brazil</a></div>
                        </div>
                        <div class="lab-line">
                            <span></span>
                            <div class="lab-tooltip"><a href="#">Portugal</a></div>
                        </div>
                        <div class="lab-line">
                            <span></span>
                            <div class="lab-tooltip"><a href="#">India</a></div>
                        </div>
                        {{-- <div class="lab-line">
                            <span></span>
                            <div class="lab-tooltip"><a href="#">Thailand</a></div>
                        </div> --}}
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
                                <img src="{{asset('frontend/assets/images/work/09.png')}}" alt="Google Play">
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
                                <img src="{{asset('frontend/assets/images/work/10.png')}}" alt="Apple Store">
                            </div>
                            <div class="work__content">
                                <h3>Simple Membership</h3>
                                <p>Dont be late, Currently we are offering free Registration. </p>
                                <a href="/register" class="default-btn reverse"><span>Create
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
                            <p>You find us, finally and you are already in love. More than 300 around the
                                world already shared the same experience with Joining us today!</p>
                            <ul class="justify-content-center">
                                <li><a href="#"><img src="{{asset('frontend/assets/images/app/01.jpg')}}"
                                            alt="Google Play"></a></li>
                                <li><a href="#"><img src="{{asset('frontend/assets/images/app/02.jpg')}}"
                                            alt="Apple Play"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ================> App section end here <================== -->
<!-- ================> Modal Start here <================== -->
<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Launch static backdrop modal
</button> --}}

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 385px;">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center" id="modelLogo">
                    <img style="max-height: 40px;" src="{{asset('frontend/assets/images/logo/logo.png')}}" alt="logo">
                    <div class="h5 text-dark mt-2">
                        This website contains adult content
                    </div>
                </div>
                <div class="">
                    By continuing to use iFindYou, you agree you're <span class="fw-bold text-dark"> over the age
                        of
                        18
                    </span>
                    and have <span class="fw-bold text-dark">
                        read and agreed </span> to our
                    <a href="#" class="link-underline-primary">terms.</a>
                </div>
                <div class="mt-2">
                    <span class="fw-bold text-dark">Parents/guardians,</span> you can learn more about online
                    safety
               for
                    adult content.
                </div>

            </div>
            <div class="modal-footer justify-content-center border-0 pt-0 mt-0">
                <button type="button" class="default-btn style-2 text-white" id="agreeTermsButton">Agree and
                    Close</button>
                <button type="button" class="default-btn" data-bs-dismiss="modal">Decline</button>
            </div>
        </div>
    </div>
</div>
<!-- ================> Model end here <================== -->

@endsection

@push('frontend-extra-js')
<script>
    $(document).ready(function(){
        // var agreed_to_terms_cookies = document.cookie.split(';');
        var agreed_to_terms_cookies = document.cookie.split(';').filter((item) => item.includes('agreed_to_terms'));
        if (agreed_to_terms_cookies.length > 0){
            $('#staticBackdrop').modal('hide');
        }else{
            $('#staticBackdrop').modal('show');
        }
        $('#agreeTermsButton').on('click',function(){
            document.cookie = " agreed_to_terms=true; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/";
            $('#staticBackdrop').modal('hide');
        });
        $('#country').on('change',function(){
            var country_id = $(this).val();
            $.ajax({
                url:"{{route('get.states')}}?country_id="+country_id,
                type:"GET",
                dataType:"json",
                success:function(data){
                    $("#state").empty();
                    $("#state").append(`<option value="">Select State</option>`)
                    if(data.length > 0){
                        $.each(data,function(key,value){
                            $("#state").append(`<option value="${value.id}">${value.name}</option>`);
                        });
                    }else{
                        $("#state").append(`<option value="">No State Available</option>`)
                    }
                },
                error:function(data){
                    console.log(data);
                }
            });
        });
        $('#state').on('change',function(){
            var state_id = $(this).val();
            $.ajax({
                url:"{{route('get.cities')}}?state_id="+state_id,
                type:"GET",
                dataType:"json",
                success:function(data){
                    $("#city").empty();
                    $("#city").append(`<option value="">Select City</option>`)
                    if(data.length > 0){
                        $.each(data,function(key,value){
                            $("#city").append(`<option value="${value.id}">${value.name}</option>`);
                        });
                    }else{
                        $("#city").append(`<option value="">No Cities Available Please Select another State.</option>`)
                    }
                },
                error:function(data){
                    console.log(data);
                }
            });
        });

    });

</script>
@endpush
