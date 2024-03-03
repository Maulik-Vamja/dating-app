@extends('frontend.layouts.app')
@section('seo-meta')
<title>Know More About Secure Adult Entertainers Platform | IFindYou </title>
<meta name="description"
    content="Trusted and secure adult entertainers platform featuring at IFindYou, massage providers, and adult entertainers. Enjoy adult quality services. Sign up today!">
<link rel="canonical" href="{{ url()->current() }}" />
@endsection


@section('og-meta')
<meta property="og:type" content="website">
<!-- Dynamic OG meta tags -->
<meta property="og:title" content="Know More About Secure Adult Entertainers Platform | IFindYou ">
<meta property="og:description"
    content=" Trusted and secure adult entertainers platform featuring at IFindYou, massage providers, and adult entertainers. Enjoy adult quality services. Sign up today!">
<meta property="og:image" content="{{asset('frontend/og_images/home.jpg')}}">
<meta property="og:url" content="{{ url()->current() }}">
@endsection
@section('content')
<!-- ================> Page Header section start here <================== -->
<div class="pageheader bg_img"
    style="background-image: url({{asset('frontend/assets/images/bg-img/pageheader.jpg')}});">
    <div class="container">
        <div class="pageheader__content text-center">
            <h2> <u>iFindYou</u> Around the world</h2>
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
@endsection