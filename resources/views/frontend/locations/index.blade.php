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
<div class="country-state-content mt-5 mb-5">
    <div class="container">
        @foreach ($countries as $country)
        <div class="col-md-12">
            <div class="d-flex justify-content-between nation-title pb-2 mb-3">
                <h4 class="mb-0">{{ $country->name }}</h4>
                <p class="view-all-link mb-0"><a
                        href="{{ route('get.escorts.by.location',['country' => strtolower(str_replace(' ','_',$country->iso2))]) }}">View
                        all in {{ $country->name }}</a></p>
            </div>
        </div>
        <div class="col col-12 columns mb-5">
            @foreach ($country->states as $state)
            <div class="saparet-col">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h4 class="mb-0">{{ $state->name }}</h4>
                    <a href="{{ route('get.escorts.by.location',['country' => strtolower(str_replace(' ','_',$country->iso2)),'state' => strtolower(str_replace(' ','_',$state->name))]) }}"
                        class="font-weight-bold whitespace-nowrap">View all</a>
                </div>
                <ul class="list-unstyled list-inline mb-4">
                    @foreach ($state->cities as $city)
                    <li class="list-inline-item">
                        <a class="decorated" style="text-decoration: underline;"
                            href="{{ route('get.escorts.by.location',['country'=>strtolower(str_replace(' ','_',$country->iso2)),'state'=>strtolower(str_replace(' ','_',$state->name)),'city'=>strtolower(str_replace(' ','_',$city->name))]) }}">
                            {{$city->name }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>
<!-- ================> Page Header section end here <================== -->
@endsection