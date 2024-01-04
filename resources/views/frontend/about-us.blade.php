@extends('frontend.layouts.app')

@section('content')
<!-- ================> Page Header section start here <================== -->
<div class="pageheader bg_img"
    style="background-image: url({{asset('frontend/assets/images/bg-img/pageheader.jpg')}});">
    <div class="container">
        <div class="pageheader__content text-center">
            <h2>About Our Ollya</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About Us</li>
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
                    <h2>Hello My Friend</h2>
                    <h5>We are here to build emotion, connect people and create happy stories.</h5>
                    <p>Seeko is a friendly dating theme based on BuddyPress for the community functionality. It allows
                        you to easily create and community for dating. You can add your own branding text and images
                        right away.</p>
                    <a href="membership.html" class="default-btn reverse"><span>Get A Membership</span></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="about padding-top padding-bottom bg_img"
    style="background-image: url({{asset('frontend/assets/images/bg-img/02.jpg')}});">
    <div class="container">
        <div class="section__header style-2 text-center">
            <h2>Why Choose Ollya</h2>
            <p>Our dating platform is like a breath of fresh air. Clean and trendy design with ready to use features we
                are sure you will love.</p>
        </div>
        <div class="section__wrapper">
            <div class="row g-4 justify-content-center row-cols-xl-4 row-cols-lg-3 row-cols-sm-2 row-cols-1">
                <div class="col">
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
                <div class="col">
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
                <div class="col">
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
                <div class="col">
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


<!-- ================> Story section start here <================== -->
<div class="story padding-top padding-bottom">
    <div class="container">
        <div class="section__header style-2 text-center">
            <h2>Ollya Success Stories</h2>
            <p>Listen and learn from our community members and find out tips and tricks to meet your love. Join us and
                be part of a bigger family.</p>
        </div>
        <div class="section__wrapper">
            <div class="row g-4 justify-content-center row-cols-lg-3 row-cols-sm-2 row-cols-1">
                @foreach ($blogs as $blog)
                <div class="col wow fadeInUp" data-wow-duration="1.5s">
                    <div class="story__item">
                        <div class="story__inner">
                            <div class="story__thumb">
                                <a href="{{ route('blogs.show',$blog->slug) }}"><img
                                        src="{{\Storage::url($blog->image)}}" alt="dating thumb"
                                        style="max-height:250px !important; height: 250px;"></a>
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


<!-- ================> Work section start here <================== -->
<div class="work work--style2 padding-top padding-bottom bg_img"
    style="background-image: url({{asset('frontend/assets/images/bg-img/01.jpg')}});">
    <div class="container">
        <div class="section__wrapper">
            <div class="row g-4 justify-content-center">
                <div class="col-xl-6 col-lg-8 col-12">
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
                <div class="col-xl-6 col-lg-8 col-12">
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
                <div class="app__item">
                    <div class="app__inner">
                        <div class="app__content text-center">
                            <h4>Download App Our Ollya</h4>
                            <h2>Easy Connect To Everyone</h2>
                            <p>You find us, finally and you are already in love. More than 5.000.000 around the world
                                already shared the same experience andng ares uses our system Joining us today just got
                                easier!</p>
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