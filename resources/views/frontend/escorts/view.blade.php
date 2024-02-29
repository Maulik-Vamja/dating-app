@extends('frontend.layouts.app')
@php
$random_image = $escort->gallery_images()->inRandomOrder()->first();
@endphp

@section('og-meta')
<meta property="og:type" content="website">
<!-- Dynamic OG meta tags -->
<meta property="og:title"
    content="{{ $escort->full_name ? $escort->full_name . ' | ' : '' }}{{ $escort->home_addresses->isNotEmpty() ? $escort->home_addresses->first()?->city?->name . ', ' . $escort->home_addresses->first()?->state?->name . ', ' . $escort->home_addresses->first()?->country?->iso2 : 'iFindYou' }} / &#x2713;">
<meta property="og:description"
    content=" {{$escort->short_description ?? 'The Largest Adult Friend Finder Platform'}} | {{ str_limit($escort->description ?? 'The Largest Adult Friend Finder Platform', 100) }}">
<meta property="og:image"
    content="{{ $random_image ? (filter_var($random_image->image,FILTER_VALIDATE_URL) == false ? Storage::url($random_image->image) : $random_image->image) : asset('frontend/assets/images/allmedia/01.jpg')}}">
<meta property="og:url" content="{{ url()->current() }}">

<!-- Twitter -->
<meta name="twitter:card"
    content="{{ $random_image ? (filter_var($random_image->image, FILTER_VALIDATE_URL) == false ? Storage::url($random_image->image) : $random_image->image) : asset('frontend/assets/images/allmedia/01.jpg')}}">
<meta name="twitter:title"
    content="{{ $escort->full_name ? $escort->full_name . ' | ' : '' }}{{ $escort->home_addresses->isNotEmpty() ? $escort->home_addresses->first()?->city?->name . ', ' . $escort->home_addresses->first()?->state?->name . ', ' . $escort->home_addresses->first()?->country?->iso2 : 'iFindYou' }} &#x2713;">
<meta name="twitter:description"
    content="{{$escort->short_description ?? 'The Largest Adult Friend Finder Platform'}} | {{ str_limit($escort->description ?? 'The Largest Adult Friend Finder Platform', 100) }}">
<meta name="twitter:image"
    content="{{ $random_image ? (filter_var($random_image->image, FILTER_VALIDATE_URL) == false ? Storage::url($random_image->image) : $random_image->image) : asset('frontend/assets/images/allmedia/01.jpg')}}">
<meta name="twitter:url" content="{{ url()->current() }}">
@endsection


@section('content')
<!-- ================> Page Header section start here <================== -->

{{-- <div class="pageheader" style="padding: 0;">
    <div class="bg_img member-single-inner"
        style="background-image: url({{ $random_image ? (filter_var($random_image->image,FILTER_VALIDATE_URL) == false ? Storage::url($random_image->image) : $random_image->image) : asset('frontend/assets/images/allmedia/01.jpg')}});">
    </div>
    <div class="pageheader__content">
        <figure><img
                src="{{ $random_image ? (filter_var($random_image->image,FILTER_VALIDATE_URL) == false ? Storage::url($random_image->image) : $random_image->image) : asset('frontend/assets/images/allmedia/01.jpg')}}"
                alt="member"></figure>
    </div>
</div> --}}


<div class="col-md-12" style="">
    <div class="profile-gallery-block lazy slider">
        @foreach ($escort->gallery_images as $image)
        <div class="profile-slide">
            <img src="{{ filter_var($image->image,FILTER_VALIDATE_URL) == false ? Storage::url($image->image) : $image->image }}"
                alt="dating thumb">
        </div>
        @endforeach
    </div>
</div>


<!-- ================> Page Header section end here <================== -->

<!-- ================> Group section end here <================== -->

<div class="group group--single pb-5">
    <div class="group__top">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="gt1-tab" data-bs-toggle="tab" data-bs-target="#gt1"
                                type="button" role="tab" aria-controls="gt1" aria-selected="true"><i
                                    class="fa-solid fa-house"></i> Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="gt2-tab" data-bs-toggle="tab" data-bs-target="#gt2"
                                type="button" role="tab" aria-controls="gt2" aria-selected="false"><i class="fa fa-user"
                                    aria-hidden="true"></i> Personal details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="gt3-tab" data-bs-toggle="tab" data-bs-target="#gt3"
                                type="button" role="tab" aria-controls="gt3" aria-selected="false"><i
                                    class="fa-solid fa-usd"></i> Rates
                                <!-- <span>06</span> -->
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="gt4-tab" data-bs-toggle="tab" data-bs-target="#gt4"
                                type="button" role="tab" aria-controls="gt4" aria-selected="false"><i
                                    class="fa-solid fa-th-large"></i> Policies
                                <!-- <span>16</span> -->
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="gt6-tab" data-bs-toggle="tab" data-bs-target="#gt6"
                                type="button" role="tab" aria-controls="gt6" aria-selected="false"><i
                                    class="fa-solid fa-phone-square"></i> Contacts
                                <!-- <span>06</span> -->
                            </button>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="group__bottom">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="group__bottom--left">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="gt1" role="tabpanel" aria-labelledby="gt1-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="group__bottom--area group__bottom--memberactivity">
                                            <div class="basic-info-profile d-flex justify-content-center">
                                                {{-- <button class="ic-activiy"><i class="fa-solid fa-clock"></i> Last
                                                    active
                                                    today</button> --}}
                                                @if ($escort->home_addresses)
                                                @foreach ($escort->home_addresses as $address)
                                                <button class="ic-location"><i class="fa-solid fa-house"></i> {{
                                                    $address?->city?->name
                                                    }}, {{ $address?->state?->name }},
                                                    {{ $address?->country?->iso2 }}</button>
                                                @endforeach
                                                @endif
                                                <button class="ic-gender"><i class="fa-solid fa-venus"></i>
                                                    {{ ucfirst($escort->gender) }}</button>
                                            </div>
                                        </div>
                                        <div class="cmn-txt-area pt-4 pb-3">
                                            <div class="title-main-txt text-center">
                                                <h2 class="title-txt">{{ $escort->full_name }}</h2>
                                                <h4 class="mt-2 text-capitalize">{{ $escort->short_description }}</h4>
                                                <p>{{ $escort->pronouns }} </p>
                                            </div>
                                            <div class="cmn-txt-block">
                                                <p>{!! $escort->description !!}</p>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-12" style="margin-top: 50px">
                                        <div class="profile-gallery-block lazy slider">
                                            @foreach ($escort->gallery_images as $image)
                                            <div class="profile-slide">
                                                <img src="{{ filter_var($image->image,FILTER_VALIDATE_URL) == false ? Storage::url($image->image) : $image->image }}"
                                                    alt="dating thumb">
                                            </div>
                                            @endforeach
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="gt2" role="tabpanel" aria-labelledby="gt2-tab">
                                <div class="container">
                                    <div class="info">
                                        <div class="info-card mb-4">
                                            <div class="info-card-title">
                                                <h6>Base Info</h6>
                                            </div>
                                            <div class="info-card-content">
                                                <ul class="info-list">
                                                    <li>
                                                        @if ($escort->based_in_addresses)
                                                        <p class="info-name">Based In Address</p>
                                                        <div class="info-details">
                                                            @foreach ($escort->based_in_addresses as $address)
                                                            <p>{{ $address?->city?->name
                                                                }}, {{ $address?->state?->name }},
                                                                {{ $address?->country?->iso2 }}.</p>
                                                            @endforeach
                                                        </div>
                                                        @endif
                                                    </li>
                                                    <li>
                                                        <p class="info-name">Caters to</p>
                                                        <p class="info-details">{{ $escort->caters_to }}</p>
                                                    </li>
                                                    @if ($escort->gender && $escort->gender != '')
                                                    <li>
                                                        <p class="info-name">Gender</p>
                                                        <p class="info-details"><i class="fa-solid fa-venus"></i> {{
                                                            ucfirst($escort->gender) }} ({{$escort->pronouns }})</p>
                                                    </li>
                                                    @endif
                                                    @if ($escort->age && $escort->age != '')
                                                    <li>
                                                        <p class="info-name">Age</p>
                                                        <p class="info-details">{{ $escort->age }}</p>
                                                    </li>
                                                    @endif
                                                    @if ($escort->body_type && $escort->body_type != '')
                                                    <li>
                                                        <p class="info-name">Body Type</p>
                                                        <p class="info-details">{{ $escort->body_type }}</p>
                                                    </li>
                                                    @endif
                                                    @if ($escort->height && $escort->height != '')
                                                    <li>
                                                        <p class="info-name">Height</p>
                                                        <p class="info-details">{{ $escort->height }}</p>
                                                    </li>
                                                    @endif
                                                    @if ($escort->ethnicity && $escort->ethnicity != '')
                                                    <li>
                                                        <p class="info-name">Ethnicitiy</p>
                                                        <p class="info-details">{{ $escort->ethnicity }}</p>
                                                    </li>
                                                    @endif
                                                    @if ($escort->cup_size && $escort->cup_size != '')
                                                    <li>
                                                        <p class="info-name">Cup Size</p>
                                                        <p class="info-details">{{ $escort->cup_size }}</p>
                                                    </li>
                                                    @endif
                                                    @if ($escort->hair_colour && $escort->hair_colour != '')
                                                    <li>
                                                        <p class="info-name">Hair Color</p>
                                                        <p class="info-details">{{ $escort->hair_colour }}</p>
                                                    </li>
                                                    @endif
                                                    @if ($escort->shoe_size && $escort->shoe_size != '')
                                                    <li>
                                                        <p class="info-name">Shoe Size</p>
                                                        <p class="info-details">{{ $escort->shoe_size }}</p>
                                                    </li>
                                                    @endif
                                                    @if ($escort->eye_colour && $escort->eye_colour != '')
                                                    <li>
                                                        <p class="info-name">Eye Color</p>
                                                        <p class="info-details">{{ $escort->eye_colour }}</p>
                                                    </li>
                                                    @endif
                                                </ul>

                                            </div>
                                        </div>

                                        <div class="info-card">
                                            <div class="info-card-title">
                                                <h6>Availability</h6>
                                            </div>
                                            <div class="info-card-content">
                                                <ul class="info-list">
                                                    @php
                                                    $days = config('utility.availibility_days');
                                                    $escort_availibility
                                                    = json_decode($escort->availibility,true);
                                                    @endphp
                                                    @foreach ($days as $day)
                                                    <li>
                                                        <p class="info-name">{{ substr(strtoupper($day),0,3) }}</p>
                                                        <p class="info-details"><i
                                                                class="{{ isset($escort_availibility[$day]) ? 'fas fa-check text-success' : 'fas fa-times text-danger' }} "></i>
                                                        </p>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                <div class="info-profile-content">
                                                    {!! $escort->availibility_description !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="gt3" role="tabpanel" aria-labelledby="gt3-tab">

                                <div class="container">
                                    <div class="site">
                                        <div class="col-12">
                                            <div class="row">
                                                @php
                                                $rates = \App\Models\RateType::where('is_active','y')->get();
                                                @endphp
                                                @foreach ($rates as $rate)
                                                @php
                                                $escort_rates =
                                                $escort->rates()->where('rate_type_id',$rate->id)->get();
                                                @endphp
                                                @if($escort_rates->count() > 0)
                                                <div class="col-md-6">
                                                    <div class="info-card mb-4">
                                                        <div class="info-card-title">
                                                            <h6>{{ $rate->type }}</h6>
                                                        </div>
                                                        <div class="info-card-content">
                                                            <ul class="info-list rate-listing">
                                                                @foreach ($escort_rates as $escort_rate)
                                                                <li>
                                                                    <div
                                                                        class="rate-txt d-flex justify-content-between">
                                                                        <p class="strong-txt">{{ $escort_rate->duration
                                                                            }}
                                                                        </p>
                                                                        <p><span>$</span>{{ $escort_rate->rate }}</p>
                                                                    </div>

                                                                    <p class="cmn-txt-rate">{{ $escort_rate->description
                                                                        ??
                                                                        '' }}
                                                                    </p>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach
                                                {{-- <div class="col-md-6">
                                                    <div class="info-card mb-4">
                                                        <div class="info-card-title">
                                                            <h6>Incall</h6>
                                                        </div>
                                                        <div class="info-card-content">
                                                            <ul class="info-list rate-listing">
                                                                <li>
                                                                    <div
                                                                        class="rate-txt d-flex justify-content-between">
                                                                        <p class="strong-txt">Video Session (30 minutes)
                                                                        </p>
                                                                        <p><span>$</span> 120</p>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div
                                                                        class="rate-txt d-flex justify-content-between">
                                                                        <p class="strong-txt">Sexting session (30
                                                                            minutes)</p>
                                                                        <p><span>$</span> 120</p>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div
                                                                        class="rate-txt d-flex justify-content-between">
                                                                        <p class="strong-txt">Video Session (1 hour)</p>
                                                                        <p><span>$</span> 180</p>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div
                                                                        class="rate-txt d-flex justify-content-between">
                                                                        <p class="strong-txt">Custom video requests</p>
                                                                        <p><span>$</span> 200</p>
                                                                    </div>
                                                                    <p class="cmn-txt-rate">Donation ranges by length of
                                                                        video, what the video contains, and how much
                                                                        time I will have to put in to record and edit
                                                                    </p>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="info-card mb-4">
                                                        <div class="info-card-title">
                                                            <h6>Outcall</h6>
                                                        </div>
                                                        <div class="info-card-content">
                                                            <ul class="info-list rate-listing">
                                                                <li>
                                                                    <div
                                                                        class="rate-txt d-flex justify-content-between">
                                                                        <p class="strong-txt">Video Session (30 minutes)
                                                                        </p>
                                                                        <p><span>$</span> 120</p>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div
                                                                        class="rate-txt d-flex justify-content-between">
                                                                        <p class="strong-txt">Sexting session (30
                                                                            minutes)</p>
                                                                        <p><span>$</span> 120</p>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div
                                                                        class="rate-txt d-flex justify-content-between">
                                                                        <p class="strong-txt">Video Session (1 hour)</p>
                                                                        <p><span>$</span> 180</p>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div
                                                                        class="rate-txt d-flex justify-content-between">
                                                                        <p class="strong-txt">Fly Me to You ✈️</p>
                                                                        <p><span>$</span> 2900</p>
                                                                    </div>
                                                                    <p class="cmn-txt-rate">Fly Me to You bookings are
                                                                        my absolute favorite! I thoroughly enjoy
                                                                        traveling to different cities, and am always
                                                                        passport ready. I ask that you secure our time
                                                                        together at least 2 weeks in advance. Please
                                                                        inquire about the donation, as there are
                                                                        different factors involved 🤍</p>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="gt4" role="tabpanel" aria-labelledby="gt4-tab">
                                <div class="container">
                                    <div class="site">
                                        <div class="col-12">
                                            <div class="row">
                                                @php
                                                $policies = \App\Models\PolicyType::where('is_active','y')->get();
                                                @endphp
                                                @foreach ($policies as $policy)
                                                @php
                                                $escort_policy =
                                                $escort->policies()->where('policy_type_id',$policy->id)->first();
                                                @endphp
                                                @if($escort_policy)
                                                <div class="col-md-6">
                                                    <div class="info-card mb-4">
                                                        <div class="info-card-title">
                                                            <h6>{{ $policy->type }}</h6>
                                                        </div>
                                                        <div class="info-card-content policies-content">
                                                            <p>{!! $escort_policy->description !!}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="gt6" role="tabpanel" aria-labelledby="gt6-tab">
                                <div class="container">
                                    <div class="site">
                                        <div class="col-12">
                                            <div class="row">
                                                @if ($escort->contact_disclaimer != '' && $escort->contact_disclaimer)
                                                <div class="col-md-6">
                                                    <div class="info-card mb-4">
                                                        <div class="info-card-title">
                                                            <h6>Contact</h6>
                                                        </div>
                                                        <div class="info-card-content policies-content">
                                                            <p>{!! $escort->contact_disclaimer !!}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif

                                                <div class="col-md-6">
                                                    <div class="info-card mb-4">
                                                        <div class="info-card-content">
                                                            @php
                                                            $contact_medias =
                                                            \App\Models\ContactMedia::where('is_active','y')->get();
                                                            @endphp

                                                            <ul class="info-list rate-listing">
                                                                @foreach ($contact_medias as $media)
                                                                @php
                                                                $escort_contact_media =
                                                                $escort->contacts()->where('contact_media_id',$media->id)->first();
                                                                @endphp
                                                                @if($escort_contact_media &&
                                                                $escort_contact_media->value !=
                                                                null)
                                                                <li>
                                                                    <div
                                                                        class="rate-txt d-flex justify-content-between">
                                                                        <p class="strong-txt"><i
                                                                                class="{{ $media->icon }}"></i> {{
                                                                            $media->name
                                                                            }}
                                                                        </p>
                                                                        <p>{{
                                                                                $escort_contact_media->value }}
                                                                        </p>
                                                                    </div>
                                                                </li>
                                                                @endif
                                                                @endforeach
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
                    </div>
                </div>
                <div class="section__wrapper wow fadeInUp" data-wow-duration="1.5s">
                    <div class="member member--style2 mt-5">
                        <div class="container">
                            <div class="row g-0 justify-content-center">
                                <h3 class="mb-3">Similar Profiles</h3>
                                @forelse ($similar_escorts as $escort)
                                @php
                                $random_image = $escort->gallery_images()->inRandomOrder()->first();
                                @endphp
                                <div class="member__item">
                                    <div class="member__inner">
                                        <div class="member__thumb">
                                            <a class="member-link-page"
                                                href="{{ route('get.escort',$escort->user_name) }}">
                                                <figure><img
                                                        src="{{ $random_image ? (filter_var($random_image->image,FILTER_VALIDATE_URL) == false ? Storage::url($random_image->image) : $random_image->image) : asset('frontend/assets/images/allmedia/01.jpg')}}"
                                                        alt="member-img">
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="member__content">
                                            <a class="member-link-page"
                                                href="{{ route('get.escort',$escort->user_name) }}">
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
                                                <p class="d-flex align-items-center text-capitalize"><span
                                                        class="{{ isset($availableOrNot[$today])  ? '' : 'not-avail' }} availibity-members"></span>available
                                                </p>
                                            </div>
                                            <div class="member-bio">
                                                <p class="member__desc-txt">{!! $escort->description !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <h4>Oops...No Similar Profiles Found..!</h4>
                                @endforelse

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('frontend-extra-js')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
    integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script type="text/javascript">
    $(".lazy").slick({
        dots: false,
        lazyLoad: 'ondemand', // ondemand progressive anticipated
        infinite: true,
        slidesToShow: 4,
        pauseOnHover: false,
        autoplay: true,
        speed: 1000,
        slidesToScroll: 1,
        responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        ]
      });
</script>
@endpush
