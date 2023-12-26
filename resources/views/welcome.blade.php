@extends('frontend.layouts.app')

@section('content')
<!-- ================> Banner section start here <================== -->
<div class="banner banner--style2 padding-top bg_img"
    style="background-image: url({{asset('frontend/assets/images/banner/bg-2.jpg')}});">
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
                        <form action="{{ route('get.escorts') }}" method="GET">
                            <div class="banner__list">
                                <div class="row">
                                    <div class="col-6">
                                        <label>I am a</label>
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
                                                    <select name="min_age">
                                                        @for ($i = 18; $i <= 40; $i++) <option value="{{$i}}" {{ $i==18
                                                            ? 'selected' : '' }}>{{ $i }}
                                                            </option>
                                                            @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="banner__inputlist">
                                                    <select name="max_age">
                                                        @for ($i = 18; $i <= 40; $i++) <option value="{{$i}}" {{ $i==25
                                                            ? 'selected' : '' }}>{{ $i }}
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

<!-- ================> Member section start here <================== -->
<div class="member member--style2 padding-top">
    <div class="container">
        <div class="section__header style-2 text-center wow fadeInUp" data-wow-duration="1.5s">
            <h2>Most Popular Members</h2>
            <p>Learn from them and try to make it to this board. This will for sure boost you visibility and increase
                your chances to find you loved one.</p>
        </div>
        <div class="section__wrapper wow fadeInUp" data-wow-duration="1.5s">
            <div class="tab-content mx-12-none">
                <div class="row g-0 justify-content-center">
                    @foreach ($escorts as $escort)
                    <div class="member__item">
                        <div class="member__inner">
                            <div class="member__thumb">
                                <a class="member-link-page" href="{{ route('get.escort',$escort->user_name) }}">
                                    <figure><img src="{{asset($escort->thumbnail_image)}}" alt="member-img">
                                    </figure>
                                </a>
                            </div>
                            <div class="member__content">
                                <a class="member-link-page" href="{{ route('get.escort',$escort->user_name) }}">
                                    <h5>{{ $escort->full_name }}</h5>
                                </a>
                                <p class="short__desc mt-1">{{ $escort->short_description }}</p>
                                <div class="city-availibity mt-2 d-flex justify-content-between">
                                    <p><i class="fa-solid fa-house"></i>Sarasota, FL, US</p>
                                    @php
                                    $today = Carbon\Carbon::now()->format('l');
                                    $availableOrNot =
                                    $escort->availability()->where('availibility->'.$today,true)->first();

                                    @endphp
                                    <p class="d-flex align-items-center text-capitalize">
                                        <span
                                            class="{{ $availableOrNot ? '' : 'not-avail'}} availibity-members"></span>available
                                    </p>
                                </div>
                                <div class="member-bio">
                                    <p class="member__desc-txt">{!! $escort->description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="member__item">
                        <div class="member__inner">
                            <div class="member__thumb">
                                <a class="member-link-page" href="member-single.html">
                                    <figure><img src="{{asset('frontend/assets/images/allmedia/06.jpg')}}"
                                            alt="member-img"></figure>
                                </a>
                            </div>
                            <div class="member__content">
                                <a class="member-link-page" href="member-single.html">
                                    <h5>Amanda Rodrigues</h5>
                                </a>
                                <p class="short__desc mt-1">Can you feel the Chemistry?</p>
                                <div class="city-availibity mt-2 d-flex justify-content-between">
                                    <p><i class="fa-solid fa-house"></i>Sarasota, FL, US</p>
                                    <p class="d-flex align-items-center text-capitalize"><span
                                            class="availibity-members"></span>available</p>
                                </div>
                                <div class="member-bio">
                                    <p class="member__desc-txt">Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="members.html" class="default-btn"><span>See More Popular</span></a>
            </div>
        </div>
    </div>
</div>
<!-- ================> Member section end here <================== -->


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
                                <img src="{{asset('frontend/assets/images/about/icon/02.png')}}" alt="dating thumb">
                            </div>
                            <div class="about__content">
                                <h3><span class="counter" data-to="{{ $counts['total_online_escorts'] }}"
                                        data-speed="1500"></span></h3>
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
                                <img src="{{asset('frontend/assets/images/about/icon/04.png')}}" alt="dating thumb">
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
            <h2>Ollya Stories From Our Lovers</h2>
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
                                <a href="{{ route('blogs.show',$blog->slug) }}"><img src="{{$blog->image}}"
                                        alt="dating thumb"></a>
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
                {{-- <div class="col wow fadeInUp" data-wow-duration="1.6s">
                    <div class="story__item">
                        <div class="story__inner">
                            <div class="story__thumb">
                                <a href="blog-single.html"><img src="{{asset('frontend/assets/images/story/02.jpg')}}"
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
                                <a href="blog-single.html"><img src="{{asset('frontend/assets/images/story/03.jpg')}}"
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
                </div> --}}
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
                                    <div class="thumb"> <img src="{{asset('frontend/assets/images/transport/01.jpg')}}"
                                            alt="lab-trensport"></div>
                                    <div class="content"><a href="members.html">United kingdom</a></div>
                                </li>
                                <li>
                                    <div class="thumb"> <img src="{{asset('frontend/assets/images/transport/02.jpg')}}"
                                            alt="lab-trensport"></div>
                                    <div class="content"><a href="members.html">Germany</a></div>
                                </li>
                                <li>
                                    <div class="thumb"> <img src="{{asset('frontend/assets/images/transport/03.jpg')}}"
                                            alt="lab-trensport"></div>
                                    <div class="content"><a href="members.html">United states</a></div>
                                </li>
                                <li>
                                    <div class="thumb"> <img src="{{asset('frontend/assets/images/transport/04.jpg')}}"
                                            alt="lab-trensport"></div>
                                    <div class="content"><a href="members.html">Brazil</a></div>
                                </li>
                                <li>
                                    <div class="thumb"> <img src="{{asset('frontend/assets/images/transport/05.jpg')}}"
                                            alt="lab-trensport"></div>
                                    <div class="content"><a href="members.html">Falkland islands</a></div>
                                </li>
                                <li>
                                    <div class="thumb"> <img src="{{asset('frontend/assets/images/transport/06.jpg')}}"
                                            alt="lab-trensport"></div>
                                    <div class="content"><a href="members.html">Portugal</a></div>
                                </li>
                                <li>
                                    <div class="thumb"> <img src="{{asset('frontend/assets/images/transport/07.jpg')}}"
                                            alt="lab-trensport"></div>
                                    <div class="content"><a href="members.html">Australia</a></div>
                                </li>
                                <li>
                                    <div class="thumb"> <img src="{{asset('frontend/assets/images/transport/08.jpg')}}"
                                            alt="lab-trensport"></div>
                                    <div class="content"><a href="members.html">India</a></div>
                                </li>
                                <li>
                                    <div class="thumb"> <img src="{{asset('frontend/assets/images/transport/09.jpg')}}"
                                            alt="lab-trensport"></div>
                                    <div class="content"><a href="members.html">South Africa</a></div>
                                </li>
                                <li>
                                    <div class="thumb"> <img src="{{asset('frontend/assets/images/transport/10.jpg')}}"
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