@extends('frontend.layouts.app')

@push('frontend-extra-css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<style>
    /** add the dropzone beaty css */
    .dropzone {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border: 2px dashed #0087F7;
        border-radius: 5px;
        background: white;
        margin-top: 20px;
        height: 85%;
    }

    .dz-button {
        font-size: 20px !important;
        /* Adjust the font size as needed */
    }
</style>
@endpush

@section('content')
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
                                    class="fa-solid fa-user"></i> Basic</button>
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
                                <div class="container">
                                    <div class="card">
                                        <div class="card-body">
                                            {{-- Full Name --}}
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="full_name">Full Name:</label>
                                                    <input type="text" class="form-control" id="full_name"
                                                        name="full_name" placeholder="Enter Your Full Name"
                                                        value="{{ $user->full_name }}">
                                                </div>
                                            </div>
                                            {{-- Short Description --}}
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="full_name">Short Description:</label>
                                                    <input type="text" class="form-control" id="full_name"
                                                        name="full_name" placeholder="Enter Your Short Description"
                                                        value="{{ $user->short_description }}">
                                                </div>
                                            </div>
                                            {{-- Gender --}}
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <div class="banner__inputlist">
                                                    <div class="s-input me-3">
                                                        <input type="radio" name="gender" id="gender_male" value="male"
                                                            checked data-error-container="#gender_error"><label
                                                            for="gender_male">Man</label>
                                                    </div>
                                                    <div class="s-input me-3">
                                                        <input type="radio" name="gender" id="gender_female"
                                                            value="female" data-error-container="#gender_error"><label
                                                            for="gender_female">Woman</label>
                                                    </div>
                                                    <div class="s-input">
                                                        <input type="radio" name="gender" id="gender_non_binary"
                                                            value="non_binary"
                                                            data-error-container="#gender_error"><label
                                                            for="gender_non_binary">Non Binary</label>
                                                    </div>
                                                </div>
                                                @error('gender')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong></span>
                                                @enderror
                                                <span id="gender_error"></span>
                                            </div>
                                            {{-- Pronouns --}}
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="full_name">Pronouns:</label>
                                                    <input type="text" class="form-control" id="full_name"
                                                        name="full_name" placeholder="Enter Your Pronouns">
                                                </div>
                                            </div>
                                            {{-- Description --}}
                                            <div class="form-group mb-3">
                                                <label for="description">Description</label>
                                                <textarea
                                                    class="form-control @error('description') is-invalid @enderror"
                                                    id="description" name="description" placeholder="Enter description"
                                                    autocomplete="description"
                                                    spellcheck="true">{{ old('description') != null ? old('description') : $user->description }}</textarea>
                                                @if ($errors->has('description'))
                                                <span class="text-danger">
                                                    <strong class="form-text">{{ $errors->first('description')
                                                        }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            {{-- Gallery Images --}}
                                            <div class="form-group @error('upload_file') is-invalid @enderror">
                                                <div
                                                    class="form-group{{ $errors->has('dropzone') ? ' has-error' : '' }}">
                                                    <label for="myDropzone">Upload Gallary File</label>
                                                    <div id="myDropzone" class="dropzone"
                                                        data-error-container="#mydropzone-error" name="upload_file">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12">
                                        <div class="profile-gallery-block lazy slider">
                                            <div class="profile-slide">
                                                <img src="assets/images/allmedia/01.jpg" alt="dating thumb">
                                            </div>
                                            <div class="profile-slide">
                                                <img src="assets/images/allmedia/02.jpg" alt="dating thumb">
                                            </div>
                                            <div class="profile-slide">
                                                <img src="assets/images/allmedia/03.jpg" alt="dating thumb">
                                            </div>
                                            <div class="profile-slide">
                                                <img src="assets/images/allmedia/04.jpg" alt="dating thumb">
                                            </div>
                                            <div class="profile-slide">
                                                <img src="assets/images/allmedia/05.jpg" alt="dating thumb">
                                            </div>
                                            <div class="profile-slide">
                                                <img src="assets/images/allmedia/06.jpg" alt="dating thumb">
                                            </div>
                                            <div class="profile-slide">
                                                <img src="assets/images/allmedia/07.jpg" alt="dating thumb">
                                            </div>
                                            <div class="profile-slide">
                                                <img src="assets/images/allmedia/08.jpg" alt="dating thumb">
                                            </div>
                                            <div class="profile-slide">
                                                <img src="assets/images/allmedia/09.jpg" alt="dating thumb">
                                            </div>
                                            <div class="profile-slide">
                                                <img src="assets/images/allmedia/10.jpg" alt="dating thumb">
                                            </div>
                                            <div class="profile-slide">
                                                <img src="assets/images/allmedia/11.jpg" alt="dating thumb">
                                            </div>
                                            <div class="profile-slide">
                                                <img src="assets/images/allmedia/12.jpg" alt="dating thumb">
                                            </div>
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
                                                        <p class="info-name">Base in</p>
                                                        <p class="info-details"><a
                                                                href="/us/escorts/florida/miami">Miami, Florida, United
                                                                States</a></p>
                                                    </li>
                                                    <li>
                                                        <p class="info-name">Caters to</p>
                                                        <p class="info-details">Men</p>
                                                    </li>
                                                    <li>
                                                        <p class="info-name">Last active</p>
                                                        <p class="info-details">Today</p>
                                                    </li>
                                                    <li>
                                                        <p class="info-name">Gender</p>
                                                        <p class="info-details"><i class="fa-solid fa-venus"></i> Woman
                                                            (She)</p>
                                                    </li>
                                                    <li>
                                                        <p class="info-name">Age</p>
                                                        <p class="info-details">25</p>
                                                    </li>
                                                    <li>
                                                        <p class="info-name">Address</p>
                                                        <p class="info-details">Streop Rd, Peosur, Inphodux,
                                                            USA.</p>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>

                                        <div class="info-card">
                                            <div class="info-card-title">
                                                <h6>Availability</h6>
                                            </div>
                                            <div class="info-card-content">
                                                <ul class="info-list">
                                                    <li>
                                                        <p class="info-name">MON</p>
                                                        <p class="info-details"><i class="fa-solid fa-check"></i></p>
                                                    </li>
                                                    <li>
                                                        <p class="info-name">TUE</p>
                                                        <p class="info-details"><i class="fa-solid fa-check"></i></p>
                                                    </li>
                                                    <li>
                                                        <p class="info-name">WED</p>
                                                        <p class="info-details"><i class="fa-solid fa-check"></i></p>
                                                    </li>
                                                    <li>
                                                        <p class="info-name">THU</p>
                                                        <p class="info-details"><i class="fa-solid fa-check"></i></p>
                                                    </li>
                                                    <li>
                                                        <p class="info-name">FRI</p>
                                                        <p class="info-details"><i class="fa-solid fa-check"></i></p>
                                                    </li>
                                                    <li>
                                                        <p class="info-name">SAT</p>
                                                        <p class="info-details"><i class="fa-solid fa-check"></i></p>
                                                    </li>
                                                    <li>
                                                        <p class="info-name">SUN</p>
                                                        <p class="info-details"><i class="fa-solid fa-check"></i></p>
                                                    </li>
                                                </ul>
                                                <div class="info-profile-content">
                                                    <p>The sooner you send over your screening info and a deposit, the
                                                        sooner I can be all yours! </p>
                                                    <p>Same-day bookings (if I am able to accommodate) require a 90
                                                        minute minimum. This is not a required minimum if I am touring
                                                        your area, and have availability that day.</p>
                                                    <p>I will only accept bookings from those willing to go through
                                                        light screening for my safety.</p>
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
                                                <div class="col-md-6">
                                                    <div class="info-card mb-4">
                                                        <div class="info-card-title">
                                                            <h6>Online</h6>
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
                                                </div>
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
                                                <div class="col-md-6">
                                                    <div class="info-card mb-4">
                                                        <div class="info-card-title">
                                                            <h6>Deposits</h6>
                                                        </div>
                                                        <div class="info-card-content policies-content">
                                                            <p>Deposits are required for any and all desired
                                                                appointments.</p>
                                                            <p>Fly me to you adventures will incur a 50% deposit and
                                                                travel expenses are required.</p>
                                                            <p>Deposits are final and are non-refundable except in the
                                                                very rare case that I need to reschedule. If you are
                                                                canceling, your deposit will be applied to a future date
                                                                with me within 60 days of our initial date.</p>
                                                            <p>**Please understand that I reserve the right to end our
                                                                date if I get uncomfortable at any point.**</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="info-card mb-4">
                                                        <div class="info-card-title">
                                                            <h6>Cancellations</h6>
                                                        </div>
                                                        <div class="info-card-content policies-content">
                                                            <p>I ask that you politely ask that you schedule our date
                                                                with a clear idea of your availability, as cancellations
                                                                can cause unneeded stress for both parties.</p>
                                                            <p>In the event that you no-show or cancel, please
                                                                understand that your deposit will be forfeited and is
                                                                non-refundable. It will, however, be applied to a future
                                                                date with me within 60 days or our original date
                                                                planned.</p>
                                                            <p>In the event that you need to cancel 48 hours or less
                                                                before our date, I will expect 50% of the donation. In
                                                                the event that you need to cancel 24 hours or less
                                                                before our date, I will expect my donation in full. In
                                                                the event that you choose not to send the cancellation
                                                                fees, you will have no chance at meeting me again.</p>
                                                            <p>No-shows or cancellations within 36 hours of our
                                                                scheduled date, will result in forfeiture of your
                                                                deposit. I will wait 30 minutes at most for you to show
                                                                up to our date. Cancellations outside of that time can
                                                                be applied toward our future date.</p>
                                                            <p>Please respect my time, and I will respect yours. Thank
                                                                you! 💕</p>
                                                        </div>
                                                    </div>
                                                </div>
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
                                                <div class="col-md-6">
                                                    <div class="info-card mb-4">
                                                        <div class="info-card-title">
                                                            <h6>Contact</h6>
                                                        </div>
                                                        <div class="info-card-content policies-content">
                                                            <p>Deposits are required for any and all desired
                                                                appointments.</p>
                                                            <p>Fly me to you adventures will incur a 50% deposit and
                                                                travel expenses are required.</p>
                                                            <p>Deposits are final and are non-refundable except in the
                                                                very rare case that I need to reschedule. If you are
                                                                canceling, your deposit will be applied to a future date
                                                                with me within 60 days of our initial date.</p>
                                                            <p>**Please understand that I reserve the right to end our
                                                                date if I get uncomfortable at any point.**</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="info-card mb-4">
                                                        <div class="info-card-content">
                                                            <ul class="info-list rate-listing">
                                                                <li>
                                                                    <div
                                                                        class="rate-txt d-flex justify-content-between">
                                                                        <p class="strong-txt"><i
                                                                                class="fa-solid fa-link"></i> Website
                                                                        </p>
                                                                        <p><a href="https://www.missgabriellawestwood.com/"
                                                                                target="_blank"
                                                                                class="link-data">https://www.missgabriellawestwood.com/</a>
                                                                        </p>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div
                                                                        class="rate-txt d-flex justify-content-between">
                                                                        <p class="strong-txt"><i
                                                                                class="fa-solid fa-envelope"></i> Email
                                                                        </p>
                                                                        <p><a href="mailto:" target="_blank"
                                                                                class="link-data">in●●●●●@●●●●●.com</a>
                                                                        </p>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div
                                                                        class="rate-txt d-flex justify-content-between">
                                                                        <p class="strong-txt"><i
                                                                                class="fa-solid fa-mobile"></i> Mobile
                                                                        </p>
                                                                        <p><a href="tel:" target="_blank"
                                                                                class="link-data">+185●●●●●562</a></p>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div
                                                                        class="rate-txt d-flex justify-content-between">
                                                                        <p class="strong-txt"><i
                                                                                class="fa-brands fa-twitter"></i>
                                                                            Twitter</p>
                                                                        <p><a href="https://twitter.com/DateGabriellaXo"
                                                                                target="_blank"
                                                                                class="link-data">@DateGabriellaXo</a>
                                                                        </p>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div
                                                                        class="rate-txt d-flex justify-content-between">
                                                                        <p class="strong-txt"><i
                                                                                class="fa-brands fa-instagram"></i>
                                                                            Instagram</p>
                                                                        <p><a href="https://instagram.com/Gabriellawestwood4"
                                                                                target="_blank"
                                                                                class="link-data">@Gabriellawestwood4</a>
                                                                        </p>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div
                                                                        class="rate-txt d-flex justify-content-between">
                                                                        <p class="strong-txt"><i
                                                                                class="fa-solid fa-lock"></i> Fansly</p>
                                                                        <p><a href="https://fans.ly/https://fans.ly/gabriellawestwood4"
                                                                                target="_blank"
                                                                                class="link-data">@https://fans.ly/https://fans.ly/gabriellawestwood4</a>
                                                                        </p>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div
                                                                        class="rate-txt d-flex justify-content-between">
                                                                        <p class="strong-txt"><i
                                                                                class="fa-solid fa-lock"></i> Onlyfans
                                                                        </p>
                                                                        <p><a href="https://onlyfans.com/Gabinextdoor"
                                                                                target="_blank"
                                                                                class="link-data">@Gabinextdoor</a></p>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('frontend-extra-js')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
{{-- <script src="{{ asset('admin/plugins/summernote/summernotecustom.js') }}"></script> --}}
<script type="text/javascript">
    var summernoteImageUpload = '{{ route('admin.summernote.imageUpload') }}';
    var summernoteMediaDelete = '{{ route('admin.summernote.mediaDelete') }}';
</script>
<script>
    $(document).ready(function () {

        var DropZoneElement = new DropZone('#myDropzone',{
            dictDefaultMessage: " {{ __('DRAG_AND_DROP_FILE') }} ",
            maxFiles: 12,
            maxFilesize: 2024, // max individual file size 1024 MB
            chunking: false, // enable chunking
            acceptedFiles: "image/*,video/*",
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
                var randomString = Math.floor(Math.random() * (90000 - 1000 + 1)) + 90000;
                var originalName = file.name;
                var extension = originalName.slice(((originalName.lastIndexOf(".") - 1) >>> 0) + 2);
                return time + "_" + randomString + "." + extension;
            },
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            url: fileUploadUrl, // Rep
            init: function() {
                this.on("sending", function(file, xhr, formData) {
                    formData.append("project_id", projectId);
                });
            },

            addRemoveLinks: true,
            timeout: 50000,
        });

        var summernoteElement = $('#description');
        var imagePath = 'summernote/cms/image';
        summernoteElement.summernote({
            height: 300,
        });
        /*  $("#frmEditcms").validate({
            rules: {
                url: {
                    required: true,
                    not_empty: true,
                    isurl:true,
                },
                image:{
                    required:false,
                    extension: "jpg|jpeg|png",
                },
            },
            messages: {
                title: {
                    required: "@lang('validation.required',['attribute'=>'title'])",
                    not_empty: "@lang('validation.not_empty',['attribute'=>'title'])",
                    minlength:"@lang('validation.min.string',['attribute'=>'title','min'=>3])",
                    remote:"@lang('validation.unique',['attribute'=>'title'])",
                },
                url: {
                    required: "@lang('validation.required',['attribute'=>'url'])",
                    not_empty: "@lang('validation.not_empty',['attribute'=>'url'])",
                },
                image: {
                    required: "@lang('validation.required',['attribute'=>'image'])",
                    extension:"@lang('validation.mimetypes',['attribute'=>'image','value'=>'jpg|png|jpeg'])",
                },
            },
            errorClass: 'invalid-feedback',
            errorElement: 'span',
            highlight: function (element) {
                $(element).addClass('is-invalid');
                $(element).siblings('label').addClass('text-danger'); // For Label
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
                $(element).siblings('label').removeClass('text-danger');
            },
            errorPlacement: function (error, element) {
                if (element.attr("data-error-container")) {
                    error.appendTo(element.attr("data-error-container"));
                } else {
                    error.insertAfter(element);
                }
            }
        }); */
        $('#frmEditcms').submit(function (e) {
        if(summernoteElement.summernote('isEmpty')) {
            $('#description-error').remove();
            $('<span class="text-danger" id="description-error"><strong class="form-text">The description field is required.</strong></span>').insertAfter('.note-editor');
            e.preventDefault();
            return false;
        }else {
            if ($(this).valid()) {
                addOverlay();
                $("input[type=submit], input[type=button], button[type=submit]").prop("disabled", "disabled");
                return true;
            } else {
                return false;
            }
        }
        });

        //tell the validator to ignore Summernote elements
        $('form').each(function () {
            if ($(this).data('validator'))
                $(this).data('validator').settings.ignore = ".note-editor *";
        });
    });
</script>
@endpush