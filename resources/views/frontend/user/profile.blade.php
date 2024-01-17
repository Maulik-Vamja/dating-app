@extends('frontend.layouts.app')

@section('content')
<!-- ================> Page Header section start here <================== -->
@php
$random_image = $user->gallery_images()->inRandomOrder()->first();
@endphp
<div class="pageheader" style="padding: 0;">
    <div class="bg_img member-single-inner"
        style="background-image: url({{ $random_image ? (filter_var($random_image->image,FILTER_VALIDATE_URL) == false ? Storage::url($random_image->image) : $random_image->image) : asset('frontend/assets/images/allmedia/01.jpg')}});">
    </div>
    <div class="pageheader__content">
        <figure><img
                src="{{ $random_image ? (filter_var($random_image->image,FILTER_VALIDATE_URL) == false ? Storage::url($random_image->image) : $random_image->image) : asset('frontend/assets/images/allmedia/01.jpg')}}"
                alt="member"></figure>
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
                                type="button" role="tab" aria-controls="gt2" aria-selected="false"><i
                                    class="fa-solid fa-users"></i> Personal details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="gt3-tab" data-bs-toggle="tab" data-bs-target="#gt3"
                                type="button" role="tab" aria-controls="gt3" aria-selected="false"><i
                                    class="fa-solid fa-video"></i> Rates
                                <!-- <span>06</span> -->
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="gt4-tab" data-bs-toggle="tab" data-bs-target="#gt4"
                                type="button" role="tab" aria-controls="gt4" aria-selected="false"><i
                                    class="fa-solid fa-users"></i> Policies
                                <!-- <span>16</span> -->
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="gt6-tab" data-bs-toggle="tab" data-bs-target="#gt6"
                                type="button" role="tab" aria-controls="gt6" aria-selected="false"><i
                                    class="fa-solid fa-photo-film"></i> Contacts
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
                                                <button class="ic-location"><i class="fa-solid fa-house"></i> Miami, FL,
                                                    US</button>
                                                <button class="ic-gender"><i class="fa-solid fa-venus"></i>
                                                    {{ ucfirst($user->gender) }}</button>
                                            </div>
                                        </div>
                                        <div class="cmn-txt-area pt-4 pb-3">
                                            <div class="title-main-txt text-center">
                                                <h2 class="title-txt">{{ $user->full_name }}</h2>
                                                <h4 class="mt-2 text-capitalize">{{ $user->short_description }}</h4>
                                                <p>{{ $user->pronouns }} </p>
                                            </div>
                                            <div class="cmn-txt-block">
                                                <p>{!! $user->description !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="profile-gallery-block lazy slider">
                                            @foreach ($user->gallery_images as $image)
                                            <div class="profile-slide">
                                                <img src="{{ filter_var($image->image,FILTER_VALIDATE_URL) == false ? Storage::url($image->image) : $image->image }}"
                                                    alt="dating thumb">
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
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
                                                    @if ($user->primary_address)

                                                    <li>
                                                        <p class="info-name">Base in</p>
                                                        <p class="info-details">{{ $user->primary_address?->city->name
                                                            }}, {{ $user->primary_address?->state->name }},
                                                            {{ $user->primary_address?->country->iso2 }}</p>
                                                    </li>
                                                    @endif
                                                    <li>
                                                        <p class="info-name">Caters to</p>
                                                        <p class="info-details">{{ $user->caters_to }}</p>
                                                    </li>
                                                    @if ($user->gender && $user->gender != '')
                                                    <li>
                                                        <p class="info-name">Gender</p>
                                                        <p class="info-details"><i class="fa-solid fa-venus"></i> {{
                                                            ucfirst($user->gender) }} ({{$user->pronouns }})</p>
                                                    </li>
                                                    @endif
                                                    @if ($user->age && $user->age != '')
                                                    <li>
                                                        <p class="info-name">Age</p>
                                                        <p class="info-details">{{ $user->age }}</p>
                                                    </li>
                                                    @endif
                                                    @if ($user->body_type && $user->body_type != '')
                                                    <li>
                                                        <p class="info-name">Body Type</p>
                                                        <p class="info-details">{{ $user->body_type }}</p>
                                                    </li>
                                                    @endif
                                                    @if ($user->height && $user->height != '')
                                                    <li>
                                                        <p class="info-name">Height</p>
                                                        <p class="info-details">{{ $user->height }}</p>
                                                    </li>
                                                    @endif
                                                    @if ($user->ethnicity && $user->ethnicity != '')
                                                    <li>
                                                        <p class="info-name">Ethnicitiy</p>
                                                        <p class="info-details">{{ $user->ethnicity }}</p>
                                                    </li>
                                                    @endif
                                                    @if ($user->cup_size && $user->cup_size != '')
                                                    <li>
                                                        <p class="info-name">Cup Size</p>
                                                        <p class="info-details">{{ $user->cup_size }}</p>
                                                    </li>
                                                    @endif
                                                    @if ($user->hair_colour && $user->hair_colour != '')
                                                    <li>
                                                        <p class="info-name">Hair Color</p>
                                                        <p class="info-details">{{ $user->hair_colour }}</p>
                                                    </li>
                                                    @endif
                                                    @if ($user->shoe_size && $user->shoe_size != '')
                                                    <li>
                                                        <p class="info-name">Shoe Size</p>
                                                        <p class="info-details">{{ $user->shoe_size }}</p>
                                                    </li>
                                                    @endif
                                                    @if ($user->eye_colour && $user->eye_colour != '')
                                                    <li>
                                                        <p class="info-name">Eye Color</p>
                                                        <p class="info-details">{{ $user->eye_colour }}</p>
                                                    </li>
                                                    @endif
                                                    @if ($user->is_trans)
                                                    <li>
                                                        <p class="info-name">Trans</p>
                                                        <p class="info-details">{{ $user->is_trans == 'y' ? 'Yes' : 'No'
                                                            }}</p>
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
                                                    $user_availibility = json_decode($user->availibility,true);
                                                    @endphp
                                                    @foreach ($days as $day)
                                                    <li>
                                                        <p class="info-name">{{ substr(strtoupper($day),0,3) }}</p>
                                                        <p class="info-details"><i
                                                                class="{{ isset($user_availibility[$day]) ? 'fas fa-check text-success' : 'fas fa-times text-danger' }} "></i>
                                                        </p>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                <div class="info-profile-content">
                                                    {!! $user->availibility_description !!}
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
                                                $user_rates = $user->rates()->where('rate_type_id',$rate->id)->get();
                                                @endphp
                                                @if($user_rates->count() > 0)
                                                <div class="col-md-6">
                                                    <div class="info-card mb-4">
                                                        <div class="info-card-title">
                                                            <h6>{{ $rate->type }}</h6>
                                                        </div>
                                                        <div class="info-card-content">
                                                            <ul class="info-list rate-listing">
                                                                @foreach ($user_rates as $user_rate)
                                                                <li>
                                                                    <div
                                                                        class="rate-txt d-flex justify-content-between">
                                                                        <p class="strong-txt">{{ $user_rate->duration }}
                                                                        </p>
                                                                        <p><span>$</span>{{ $user_rate->rate }}</p>
                                                                    </div>

                                                                    <p class="cmn-txt-rate">{{ $user_rate->description
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
                                                $user_policy =
                                                $user->policies()->where('policy_type_id',$policy->id)->first();
                                                @endphp
                                                @if($user_policy)
                                                <div class="col-md-6">
                                                    <div class="info-card mb-4">
                                                        <div class="info-card-title">
                                                            <h6>{{ $policy->type }}</h6>
                                                        </div>
                                                        <div class="info-card-content policies-content">
                                                            <p>{!! $user_policy->description !!}</p>
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
                                                @if ($user->contact_disclaimer != '' && $user->contact_disclaimer)
                                                <div class="col-md-6">
                                                    <div class="info-card mb-4">
                                                        <div class="info-card-title">
                                                            <h6>Contact</h6>
                                                        </div>
                                                        <div class="info-card-content policies-content">
                                                            <p>{!! $user->contact_disclaimer !!}</p>
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
                                                                $user_contact_media =
                                                                $user->contacts()->where('contact_media_id',$media->id)->first();
                                                                @endphp
                                                                @if($user_contact_media && $user_contact_media->value !=
                                                                null)
                                                                <li>
                                                                    <div
                                                                        class="rate-txt d-flex justify-content-between">
                                                                        <p class="strong-txt"><i
                                                                                class="{{ $media->icon }}"></i> {{
                                                                            $media->name
                                                                            }}
                                                                        </p>
                                                                        <p><a href="{{ $user_contact_media->value }}"
                                                                                target="_blank" class="link-data">{{
                                                                                $user_contact_media->value }}</a>
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