@extends('frontend.layouts.app')

@push('frontend-extra-css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.css" rel="stylesheet" />

{{-- <style>
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
</style> --}}
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
                            <button
                                class="nav-link {{ session()->has('form_action') ? (session()->get('form_action') == 'update_basic' ? 'active' : '' ) : 'active' }}"
                                id="gt1-tab" data-bs-toggle="tab" data-bs-target="#gt1" type="button" role="tab"
                                aria-controls="gt1" aria-selected="true"><i class="fa-solid fa-user"></i> Basic</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link {{ session()->has('form_action') ? (session()->get('form_action') == 'update_gallery_images' ? 'active' : '' ) : '' }}"
                                id="gt7-tab" data-bs-toggle="tab" data-bs-target="#gt7" type="button" role="tab"
                                aria-controls="gt7" aria-selected="true"><i class="fa-solid fa-image"></i> Gallery
                                Images</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link {{ session()->has('form_action') ? (session()->get('form_action') == 'update_personal_details' ? 'active' : '' ) : '' }}"
                                id="gt2-tab" data-bs-toggle="tab" data-bs-target="#gt2" type="button" role="tab"
                                aria-controls="gt2" aria-selected="false"><i class="fa-solid fa-users"></i> Personal
                                details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link {{ session()->has('form_action') ? (session()->get('form_action') == 'update_rates' ? 'active' : '' ) : '' }}"
                                id="gt3-tab" data-bs-toggle="tab" data-bs-target="#gt3" type="button" role="tab"
                                aria-controls="gt3" aria-selected="false"><i class="fa-solid fa-video"></i> Rates
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link {{ session()->has('form_action') ? (session()->get('form_action') == 'update_policies' ? 'active' : '' ) : '' }}"
                                id="gt4-tab" data-bs-toggle="tab" data-bs-target="#gt4" type="button" role="tab"
                                aria-controls="gt4" aria-selected="false"><i class="fa-solid fa-users"></i> Policies
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link {{ session()->has('form_action') ? (session()->get('form_action') == 'update_contacts' ? 'active' : '' ) : '' }}"
                                id="gt6-tab" data-bs-toggle="tab" data-bs-target="#gt6" type="button" role="tab"
                                aria-controls="gt6" aria-selected="false"><i class="fa-solid fa-photo-film"></i>
                                Contacts
                            </button>
                        </li>
                        <li class="nav-item " role="presentation">
                            <button
                                class="nav-link {{ session()->has('form_action') ? (session()->get('form_action') == 'update_addresses' ? 'active' : '' ) : '' }}"
                                id="gt8-tab" data-bs-toggle="tab" data-bs-target="#gt8" type="button" role="tab"
                                aria-controls="gt8" aria-selected="false"><i class="fa-solid fa-map"></i> Addresses
                            </button>
                        </li>
                        <li class="nav-item " role="presentation">
                            <button class="nav-link" id="gt8-tab" data-bs-toggle="tab" data-bs-target="#gt8"
                                type="button" role="tab" aria-controls="gt8" aria-selected="false"><i
                                    class="fa-solid fa-file-check"></i> Document Verification
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
                            @if (session('success'))
                            <div class="container">
                                <div class="alert alert-success" role="alert">
                                    <strong>{{ session('success') }}</strong>
                                </div>
                            </div>
                            @endif
                            <div class="tab-pane fade {{ session()->has('form_action') ? (session()->get('form_action') == 'update_basic' ? 'show active' : '' ) : 'show active' }}"
                                id="gt1" role="tabpanel" aria-labelledby="gt1-tab">
                                <div class="container">
                                    <form action="{{ route('profile.update',$user->user_name) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="action" value="update_basic">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Update Basic
                                                        Details</button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                {{-- Full Name --}}
                                                <div class="col-md-6 mb-3">
                                                    <div class="form-group">
                                                        <label for="full_name">Full Name:</label>
                                                        <input type="text" class="form-control" id="full_name"
                                                            name="full_name" placeholder="Enter Your Full Name"
                                                            value="{{ $user->full_name }}" required>
                                                    </div>
                                                </div>
                                                {{-- Short Description --}}
                                                <div class="col-md-6 mb-3">
                                                    <div class="form-group">
                                                        <label for="short_description">Short Description:</label>
                                                        <input type="text" class="form-control" id="short_description"
                                                            name="short_description"
                                                            placeholder="Enter Your Short Description"
                                                            value="{{ $user->short_description }}" required>
                                                    </div>
                                                </div>
                                                {{-- Gender --}}
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <div class="banner__inputlist">
                                                        <div class="s-input me-3">
                                                            <input type="radio" name="gender" id="gender_male"
                                                                value="male" {{ $user->gender == 'male' ? 'checked' : ''
                                                            }}
                                                            data-error-container="#gender_error"><label
                                                                for="gender_male">Man</label>
                                                        </div>
                                                        <div class="s-input me-3">
                                                            <input type="radio" name="gender" id="gender_female"
                                                                value="female" {{ $user->gender == 'female' ? 'checked'
                                                            :'' }}
                                                            data-error-container="#gender_error"><label
                                                                for="gender_female">Woman</label>
                                                        </div>
                                                        <div class="s-input">
                                                            <input type="radio" name="gender" id="gender_non_binary"
                                                                value="non_binary" {{ $user->gender == 'non-binary' ?
                                                            'checked' : ''
                                                            }}
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
                                                        <label for="pronouns">Pronouns:</label>
                                                        <input type="text" class="form-control" id="pronouns"
                                                            name="pronouns" placeholder="Enter Your Pronouns"
                                                            value="{{ $user->pronouns }}" required>
                                                    </div>
                                                </div>
                                                {{-- Description --}}
                                                <div class="form-group mb-3">
                                                    <label for="description">Description</label>
                                                    <textarea
                                                        class="form-control @error('description') is-invalid @enderror"
                                                        id="description" name="description"
                                                        placeholder="Enter description" autocomplete="description"
                                                        spellcheck="true"
                                                        required>{{ old('description') != null ? old('description') : $user->description }}</textarea>
                                                    @if ($errors->has('description'))
                                                    <span class="text-danger">
                                                        <strong class="form-text">{{ $errors->first('description')
                                                            }}</strong>
                                                    </span>
                                                    @endif
                                                    @php
                                                    $countries = \App\Models\Country::all();
                                                    @endphp
                                                    {{-- Address --}}
                                                    {{-- <div class="row mt-3">
                                                        <label for="">
                                                            <h4>Primary Address</h4>
                                                        </label>
                                                        @php
                                                        $countries = \App\Models\Country::all();
                                                        $user_address = $user->primary_address;
                                                        @endphp
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="country">Country</label>
                                                                <select
                                                                    class="form-control @error('country') is-invalid @enderror"
                                                                    name="country" id="country" required>
                                                                    <option value="">Select Country</option>
                                                                    @foreach ($countries as $country)
                                                                    <option value="{{ $country->id }}" {{
                                                                        $user_address?->country_id == $country->id ?
                                                                        'selected' : ''
                                                                        }}>
                                                                        {{ $country->name }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        @php
                                                        $states =
                                                        \App\Models\State::where('country_id',$user_address?->country_id)->get();
                                                        @endphp
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="state">State</label>
                                                                <select class="form-control" name="state" id="state"
                                                                    required>
                                                                    <option value="">Select Country</option>
                                                                    @foreach ($states as $state)
                                                                    <option value="{{ $state->id }}" {{ $user_address?->
                                                                        state_id == $state->id ? 'selected' : '' }}>
                                                                        {{ $state->name }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        @php
                                                        $cities =
                                                        \App\Models\City::where('state_id',$user_address?->state_id)->get();
                                                        @endphp
                                                        <div class="col-md-4">
                                                            <label for="city">City</label>
                                                            <select class="form-control" name="city" id="city" required>
                                                                <option value="">Select Country</option>
                                                                @foreach ($cities as $city)
                                                                <option value="{{ $city->id }}" {{ $user_address?->
                                                                    city_id==$city->id ? 'selected' : '' }}>
                                                                    {{ $city->name }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade {{ session()->has('form_action') ? (session()->get('form_action') == 'update_personal_details' ? 'show active' : '' ) : '' }}"
                                id="gt2" role="tabpanel" aria-labelledby="gt2-tab">
                                <div class="container">
                                    <form action="{{ route('profile.update',$user->user_name) }}" method="POST">
                                        @csrf
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Update Personal
                                                        Details</button>
                                                </div>
                                            </div>
                                            <div class="card-body">

                                                <input type="hidden" name="action" value="update_personal_details">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <div class="form-group d-flex flex-column">
                                                            @php
                                                            $user_cater_to = explode(',',$user->caters_to);
                                                            @endphp
                                                            <label for="category"> Caters To:</label>
                                                            <select name="caters_to[]" id="caters_to"
                                                                class="form-control @error('caters_to') is-invalid @enderror w-100"
                                                                data-error-container="#caters_to_error_container"
                                                                multiple>
                                                                <option value="">Select Your Preference</option>
                                                                @foreach (config('utility.caters_to') as $item)
                                                                <option value="{{$item}}" {{
                                                                    in_array($item,$user_cater_to) ? 'selected' : '' }}>
                                                                    {{ $item }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="age">Age:</label>
                                                            <input type="text" class="form-control" id="age" name="age"
                                                                placeholder="Enter Your Age" value="{{ $user->age }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <div class="form-group">
                                                            <label for="height">Height(in Inch):</label>
                                                            <input type="text" class="form-control" id="height"
                                                                name="height" placeholder="Enter Your height"
                                                                value="{{ $user->height }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <div class="form-group">
                                                            <label for="body_type"> Body Type:</label>
                                                            <select name="body_type" id="body_type"
                                                                class="form-control">
                                                                <option value="">Select Your Body Type</option>
                                                                @foreach (config('utility.body_type') as $item)
                                                                <option value="{{$item}}" {{ $item==$user->body_type ?
                                                                    'selected' : '' }}>
                                                                    {{ $item }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                            {{-- <input type="text" class="form-control" id="body_type"
                                                                name="body_type" placeholder="Enter Your Body Type"
                                                                value="{{ $user->body_type }}" required> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <div class="form-group">
                                                            <label for="ethinicity">Ehinicity:</label>
                                                            <select name="ethnicity" id="ethnicity"
                                                                class="form-control">
                                                                <option value="">Select Your Ethinicity</option>
                                                                @foreach (config('utility.ethinicity') as $item)
                                                                <option value="{{$item}}" {{ $item==$user->ethnicity ?
                                                                    'selected' : '' }}>
                                                                    {{ $item }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <div class="form-group">
                                                            <label for="cup_size"> Cup Size:</label>
                                                            <select name="cup_size" id="cup_size" class="form-control">
                                                                <option value="">Select Your Cup Size</option>
                                                                @foreach (config('utility.cup_size') as $item)
                                                                <option value="{{$item}}" {{ $item==$user->cup_size ?
                                                                    'selected' : '' }}>
                                                                    {{ $item }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                            {{-- <input type="text" class="form-control" id="cup_size"
                                                                name="cup_size" placeholder="Enter Your Body Type"
                                                                value="{{ $user->cup_size }}" required> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <div class="form-group">
                                                            <label for="hair_color">Hair Color:</label>
                                                            <select name="hair_color" id="hair_color"
                                                                class="form-control">
                                                                <option value="">Select Your Hair Color</option>
                                                                @foreach (config('utility.hair_color') as $item)
                                                                <option value="{{$item}}" {{ $item==$user->hair_colour ?
                                                                    'selected' : '' }}>
                                                                    {{ $item }}
                                                                </option>
                                                                @endforeach
                                                                {{-- <input type="text" class="form-control"
                                                                    id="hair_color" name="hair_color"
                                                                    placeholder="Enter Your hair_color"
                                                                    value="{{ $user->hair_color }}" required> --}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <div class="form-group">
                                                            <label for="eye_color"> Eye Color:</label>
                                                            <select name="eye_color" id="eye_color"
                                                                class="form-control">
                                                                <option value="">Select Your Eye Color</option>
                                                                @foreach (config('utility.eye_color') as $item)
                                                                <option value="{{$item}}" {{ $item==$user->eye_colour ?
                                                                    'selected' : '' }}>
                                                                    {{ $item }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                            {{-- <input type="text" class="form-control" id="eye_color"
                                                                name="eye_color" placeholder="Enter Your Body Type"
                                                                value="{{ $user->eye_color }}" required> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <div class="form-group">
                                                            <label for="is_trans">Trans:</label>
                                                            <select name="is_trans" id="is_trans" class="form-control">
                                                                <option value="y" {{ $user->is_trans == 'y' ? 'selected'
                                                                    : '' }}>Yes</option>
                                                                <option value="n" {{ $user->is_trans == 'n' ? 'selected'
                                                                    : '' }}>No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="h4">Availibility</div>
                                                @php
                                                $user_availibility =json_decode($user->availibility,true);
                                                @endphp
                                                <div class="form-group">
                                                    <label for="availibility">Availibility:</label>
                                                    <div class="d-flex align-items-center justify-content-center gap-2">
                                                        @foreach (config('utility.availibility_days') as $item)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true"
                                                                id="availibility[{{$item}}]"
                                                                name="availibility[{{$item}}]"
                                                                @checked(isset($user_availibility[$item]))>
                                                            <label class="form-check-label"
                                                                for="availibility[{{$item}}]">
                                                                {{$item}}
                                                            </label>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="availibility_description">Description</label>
                                                    <textarea name="availibility_description" class="form-control"
                                                        id="availibility_description"
                                                        rows="5">{{ $user->availibility_description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade {{ session()->has('form_action') ? (session()->get('form_action') == 'update_rates' ? 'show active' : '' ) : '' }}"
                                id="gt3" role="tabpanel" aria-labelledby="gt3-tab">
                                <div class="container">
                                    <div class="site">
                                        <div class="col-12">
                                            <form action="{{ route('profile.update',$user->user_name) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="action" value="update_rates">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-primary">Update
                                                                Rates</button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            @foreach (\App\Models\RateType::all() as $rate_type)
                                                            <div class="col-md-12">
                                                                <div class="card mb-4">
                                                                    <div class="card-header">
                                                                        <div
                                                                            class="d-flex justify-content-between align-items-center">
                                                                            <h6>{{ $rate_type->type }}</h6>
                                                                            <button class="btn btn-primary"
                                                                                type="button"
                                                                                data-rate-type="{{ $rate_type->type }}"
                                                                                data-rate-type-id="{{ $rate_type->id }}"
                                                                                id="addMoreRate">
                                                                                Add
                                                                                +
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    @php
                                                                    $user_rates =
                                                                    $user->rates()->where('rate_type_id',$rate_type->id)->get();
                                                                    $rate_type_id = $rate_type->id;
                                                                    @endphp
                                                                    <div class="card-body">
                                                                        <div id="{{$rate_type->type}}Container">
                                                                            @forelse ($user_rates as $key => $rate)

                                                                            <div class="row align-items-center"
                                                                                id="rateRow">
                                                                                <input type="hidden"
                                                                                    name="rates[{{$rate_type_id}}][{{$key}}][rate_type_id]"
                                                                                    value="{{ $rate_type_id }}">
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label for="">Duration</label>
                                                                                        <input
                                                                                            type="rates[{{$rate_type_id}}][{{$key}}][duration]"
                                                                                            class="form-control"
                                                                                            value="{{ $rate->duration }}"
                                                                                            name="rates[{{$rate_type_id}}][{{$key}}][duration]"
                                                                                            id="rates[{{$rate_type_id}}][{{$key}}][duration]"
                                                                                            placeholder="Enter Duration">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="rates[{{$rate_type_id}}][{{$key}}][description]">description</label>
                                                                                        <input type="text"
                                                                                            value="{{ $rate->description }}"
                                                                                            name="rates[{{$rate_type_id}}][{{$key}}][description]"
                                                                                            id="rates[{{$rate_type_id}}][{{$key}}][description]"
                                                                                            placeholder="Enter Description"
                                                                                            class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="rates[{{$rate_type_id}}][{{$key}}][rate]">Rate</label>
                                                                                        <input type="text"
                                                                                            value="{{ $rate->rate }}"
                                                                                            name="rates[{{$rate_type_id}}][{{$key}}][rate]"
                                                                                            id="rates[{{$rate_type_id}}][{{$key}}][rate]"
                                                                                            placeholder="Enter rate"
                                                                                            class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-md-3 d-flex justify-content-end">
                                                                                    <button id="removeRate"
                                                                                        type="button"
                                                                                        class="btn btn-danger"
                                                                                        data-rate-type="{{ $rate_type->type}}">Remove
                                                                                        Rate</button>
                                                                                </div>
                                                                            </div>
                                                                            @empty

                                                                            @endforelse
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade {{ session()->has('form_action') ? (session()->get('form_action') == 'update_policies' ? 'show active' : '' ) : '' }}"
                                id="gt4" role="tabpanel" aria-labelledby="gt4-tab">
                                <div class="container">
                                    <div class="site">
                                        <div class="col-12">
                                            <form action="{{ route('profile.update',$user->user_name) }}" method="POST">
                                                @csrf
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-primary">Update
                                                                Policies</button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        @php
                                                        $policy_types =
                                                        \App\Models\PolicyType::where('is_active','y')->get();
                                                        @endphp

                                                        <input type="hidden" name="action" value="update_policies">
                                                        <div class="row">
                                                            @foreach ($policy_types as $policy_type)
                                                            <input type="hidden"
                                                                name="policies[{{ $policy_type->type }}][policy_type_id]"
                                                                value="{{ $policy_type->id }}">
                                                            @php
                                                            $user_policy =
                                                            $user->policies()->where('policy_type_id',
                                                            $policy_type->id)->first();
                                                            @endphp
                                                            <div class="col-md-6 mb-3">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h4>{{ $policy_type->type }}</h4>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <textarea
                                                                            name="policies[{{ $policy_type->type }}][description]"
                                                                            id="policies[{{ $policy_type->type }}][description]"
                                                                            cols="30"
                                                                            rows="10">{{ $user_policy->description ?? '' }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade {{ session()->has('form_action') ? (session()->get('form_action') == 'update_contacts' ? 'show active' : '' ) : '' }}"
                                id="gt6" role="tabpanel" aria-labelledby="gt6-tab">
                                <div class="container">
                                    <div class="site">
                                        <div class="col-12">
                                            <form action="{{ route('profile.update',$user->user_name) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="action" value="update_contacts">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-primary">Update
                                                                Contacts</button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="" class="h4 text-strong">Contact</label>
                                                                    <textarea name="contact_disclaimer"
                                                                        class="form-control" id="" cols="30"
                                                                        rows="10">{{ $user->contact_disclaimer }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                @php
                                                                $medias =
                                                                \App\Models\ContactMedia::where('is_active','y')->get();
                                                                @endphp
                                                                @foreach ($medias as $media)
                                                                @php
                                                                $contact =
                                                                $user->contacts()->where('contact_media_id',$media->id)->first();
                                                                $input_type = strtolower($media->name) == 'email' ?
                                                                'email' : (strtolower($media->name) == 'mobile' ?
                                                                'number' : 'url');
                                                                $pattern = strtolower($media->name) == 'mobile' ?
                                                                "pattern=''" :
                                                                '';
                                                                @endphp
                                                                <div class="form-group mb-3">
                                                                    <input type="hidden"
                                                                        name="contacts[{{$media->name}}][contact_media_id]"
                                                                        value="{{ $media->id }}">
                                                                    <label for="contacts[{{$media->name}}][value]"><i
                                                                            class="{{ $media->icon }}"
                                                                            style="margin-right: 5px;"></i>{{
                                                                        $media->name }}</label>
                                                                    <input type="{{ $input_type }}"
                                                                        name="contacts[{{$media->name}}][value]"
                                                                        id="contacts[{{$media->name}}][value]"
                                                                        class="form-control"
                                                                        placeholder="Please Enter Your {{ $media->name }} {{ $input_type == 'email' ? '' : $input_type }}"
                                                                        value="{{$contact->value ?? null}}">
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade {{ session()->has('form_action') ? (session()->get('form_action') == 'update_gallery_images' ? 'show active' : '' ) : '' }}"
                                id="gt7" role="tabpanel" aria-labelledby="gt7-tab">
                                <div class="container">
                                    <div class="site">
                                        <div class="col-12">
                                            <form action="{{ route('profile.update',$user->user_name) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="action" value="update_gallery_images">
                                                <input type="hidden" name="images" id="images">
                                                <input type="hidden" name="deleted_images" id="deleted_images">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-primary">Update
                                                                Gallery Images</button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <div class="col-lg-12 col-md-9 col-sm-12">
                                                                <div class="dropzone dropzone-default dropzone-primary dz-clickable"
                                                                    id="upload_file">
                                                                    <div class="dropzone-msg dz-message needsclick">
                                                                        <h3 class="dropzone-msg-title">Drop files here
                                                                            or click
                                                                            to upload.</h3>
                                                                        <span class="dropzone-msg-desc">Upload up to {{
                                                                            12 - $user->gallery_images->count() }}
                                                                            files</span>
                                                                    </div>
                                                                </div>
                                                                <span id="dropzone-error"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-lg-12 col-md-9 col-sm-12">
                                                        <div class="row">
                                                            @foreach ($user->gallery_images as $image)
                                                            <div class="col-lg-3 col-md-4 col-sm-6 mb-3"
                                                                id="imagePreviewContainer">
                                                                <img src="{{ filter_var($image->image, FILTER_VALIDATE_URL) == false ? Storage::url($image->image) : $image->image }}"
                                                                    alt="{{ $image->image }}"
                                                                    class="update_profile_image img-fluid">
                                                                <div
                                                                    class="d-flex justify-content-center align-items-center mt-3">
                                                                    <button type="button" class="btn btn-danger btn-sm"
                                                                        data-image-id="{{ $image->id }}"
                                                                        data-image_url="{{ $image->image }}"
                                                                        id="deleteImage">Delete</button>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade {{ session()->has('form_action') ? (session()->get('form_action') == 'update_addresses' ? 'show active' : '' ) : '' }}"
                                id="gt8" role="tabpanel" aria-labelledby="gt8-tab">
                                <div class="container">
                                    <div class="site">
                                        <div class="col-12">
                                            <form action="{{ route('profile.update',$user->user_name) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="action" value="update_addresses">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-primary">Update
                                                                Addresses</button>
                                                        </div>
                                                    </div>
                                                    @php
                                                    $addressTypes =
                                                    \App\Models\AddressType::where('is_active','y')->get();
                                                    @endphp
                                                    <div class="card-body">
                                                        @foreach ($addressTypes as $key => $address_type)
                                                        <div class="card mb-4">
                                                            <div
                                                                class="card-header d-flex justify-content-between align-items-center">
                                                                <h6>{{ $address_type->address_type }}</h6>
                                                                <button type="button" class="btn btn-primary"
                                                                    id="AddMoreAddress"
                                                                    data-address_type="{{ str_slug($address_type->address_type) }}"
                                                                    data-address_type_id="{{ $address_type->id }}">Add
                                                                    +</button>
                                                            </div>
                                                            @php
                                                            $user_addresses =
                                                            $user->addresses()->where('address_type_id',$address_type->id)->get();
                                                            @endphp


                                                            <div class="card-body">
                                                                <div class=""
                                                                    id="{{str_slug($address_type->address_type)}}Container">
                                                                    @foreach ($user_addresses as $key => $address)
                                                                    <div class="row" id="addressRow">
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="">Country</label>
                                                                                <select
                                                                                    name="addresses[{{ $address_type->id }}][{{$key}}][country]"
                                                                                    class="form-control"
                                                                                    id="addresses_country" required>
                                                                                    <option value="">Select Country
                                                                                    </option>

                                                                                    @foreach ($countries as $country)
                                                                                    <option value="{{ $country->id }}"
                                                                                        @selected($address->country_id
                                                                                        == $country->id)>
                                                                                        {{$country->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        @php
                                                                        $stored_states =
                                                                        \App\Models\State::where('country_id',$address->country_id)->get();
                                                                        @endphp
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="">State</label>
                                                                                <select
                                                                                    name="addresses[{{ $address_type->id }}][{{$key}}][state]"
                                                                                    id="addresses_state"
                                                                                    class="form-control" required>
                                                                                    <option value="">Select State
                                                                                    </option>
                                                                                    @foreach ($stored_states as $state)
                                                                                    <option value="{{ $state->id }}"
                                                                                        @selected($address->state_id ==
                                                                                        $state->id)>
                                                                                        {{ $state->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        @php
                                                                        $stored_cities =
                                                                        \App\Models\City::where('state_id',$address->state_id)->get();
                                                                        @endphp
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="">City</label>
                                                                                <select
                                                                                    name="addresses[{{ $address_type->id }}][{{$key}}][city]"
                                                                                    id="addresses_city"
                                                                                    class="form-control" required>
                                                                                    <option value="">Select Country
                                                                                    </option>
                                                                                    @foreach ($stored_cities as $city)
                                                                                    <option value="{{ $city->id }}"
                                                                                        @selected($address->city_id ==
                                                                                        $city->id)>
                                                                                        {{ $city->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col-md-3 d-flex justify-content-end align-items-center">
                                                                            <button class="btn btn-danger"
                                                                                id="removeAddress"
                                                                                type="button">Remove</button>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach

                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </form>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{-- <script src="{{ asset('assets/js/pages/crud/file-upload/dropzonejs.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.js"></script>

{{-- <script src="{{ asset('admin/plugins/summernote/summernotecustom.js') }}"></script> --}}
<script type="text/javascript">
    var summernoteImageUpload = '{{ route('admin.summernote.imageUpload') }}';
    var summernoteMediaDelete = '{{ route('admin.summernote.mediaDelete') }}';
</script>
<script>
    Dropzone.autoDiscover = false;
    $(document).ready(function () {
        var images = [];
        var total_uploaded_image = "{{ $user->gallery_images->count() }}";
        var deleted_images = [];
        $('#country').select2({
            placeholder: "Please Select your Country",
        });
        $('#state').select2({
            placeholder: "Please Select your State",
        });
        $('#city').select2({
            placeholder: "Please Select your City",
        });
        $('#caters_to').select2({
            placeholder: "Please Select your Preference",
        });
        $('#upload_file').dropzone({
            url: "{{ route('store.image') }}",
            maxFiles: 12 - total_uploaded_image,
            maxfilesexceeded: function(file) {
                $(".dropzone").addClass("is-invalid");
                $("#dropzone-error").text('You have exceeded the File Upload Limit, You can not add more then 12 Images.').css('color', 'red');
                $("#dropzone-error").show();
                // this.addFile(file);
                this.removeFile(file);
            },
            maxFilesize: 1024, // MB
            timeout: null,
            addRemoveLinks: true,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            dictMaxFilesExceeded: "You can not upload any more files.",
            dictRemoveFile: "Remove file",
            clickable: true,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            params: {
                'type': "upload_file",
            },
            success: function(file, response) {
                images.push(response.image);
                var element = file.previewElement;
                $(element).attr('data-image_url', response.image);
                $('#images').val(images);
            },
            removedfile: function(file, element) {
                var element =file.previewElement;
                console.log(element);
                if(file.type == 'image/png' || file.type == 'image/jpeg' || file.type == 'image/jpg' || file.type == 'image/gif'){
                    var image_url = $(element).data('image_url');
                    // deleted_images.push(file.name);
                    $.ajax({
                        url: "{{ route('remove.image') }}",
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {
                            path: image_url,
                        },
                        success: function(response) {
                            $(element).remove();
                            // $('#deleted_images').val(deleted_images);
                        },
                    });

                }else{
                    // console.log('herhe 2');
                    $(element).remove();
                }

            },
            error: function(file, response) {
            },
        });
        var summernoteElement = $('#description');
        var imagePath = 'summernote/cms/image';
        summernoteElement.summernote({
            height: 300,
        });
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

        $(document).on('click','#addMoreRate',function(){
            var rate_type = $(this).data('rate-type');
            var rate_type_id = $(this).data('rate-type-id');
            var rate_row_count = $(`#${rate_type}Container`).children('div#rateRow').length;

            var newRow = `<div class="row align-items-center" id="rateRow">
                    <input type="hidden"
                        name="rates[${rate_type_id}][${rate_row_count}][rate_type_id]"
                        value="${rate_type_id}">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Duration</label>
                            <input
                                type="rates[${rate_type_id}][${rate_row_count}][duration]"
                                class="form-control"
                                name="rates[${rate_type_id}][${rate_row_count}][duration]"
                                id="rates[${rate_type_id}][${rate_row_count}][duration]"
                                placeholder="Enter Duration"
                                required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label
                                for="rates[${rate_type_id}][${rate_row_count}][description]">description</label>
                            <input type="text"
                                name="rates[${rate_type_id}][${rate_row_count}][description]"
                                id="rates[${rate_type_id}][${rate_row_count}][description]"
                                placeholder="Enter Description"
                                class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label
                                for="rates[${rate_type_id}][${rate_row_count}][rate]">Rate</label>
                            <input type="text"
                                name="rates[${rate_type_id}][${rate_row_count}][rate]"
                                id="rates[${rate_type_id}][${rate_row_count}][rate]"
                                placeholder="Enter rate"
                                class="form-control"
                                required>
                        </div>
                    </div>
                    <div
                        class="col-md-3 d-flex justify-content-end">
                        <button id="removeRate"
                            type="button"
                            class="btn btn-danger"
                            data-rate-type="{{ $rate_type->type}}">Remove
                            Rate</button>
                    </div>
                </div>`;

            $(`#${rate_type}Container`).append(newRow);

        });
        $(document).on('click','#removeRate',function(){
            $(this).parent().closest('div#rateRow').remove();
        });
        $('#country').change(function(){
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
        $('#state').change(function(){
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
                        $("#city").append(`<option value="">No city Available</option>`)
                    }
                },
                error:function(data){
                    console.log(data);
                }
            });
        });

        $(document).on('click','#deleteImage',function(){
            var image_url = $(this).data('image_url');
            if(confirm('Are you sure want to delete this Image...?') == true){
                deleted_images.push(image_url);
                $(this).parent().closest('#imagePreviewContainer').remove();
                $('#deleted_images').val(deleted_images);
            }
        });
        $(document).on('click','#AddMoreAddress',function(event){
            var address_type = $(this).data('address_type');
            var address_type_id = $(this).data('address_type_id');
            var address_row_count = $(`#${address_type}Container`).children('div#addressRow').length;
            var countries = JSON.parse(`{!! $countries->toJson() !!}`);

            // console.log(countries);
            var newAddressRowHtml = `
            <div class="row" id="addressRow">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Country</label>
                        <select
                            name="addresses[${address_type_id}][${address_row_count}][country]"
                            class="form-control" id="addresses_country" required>
                            <option value="">Select Country
                            </option>`;
                            $.each(countries,function(key,value){ newAddressRowHtml += `<option value="${value.id}">${value.name}</option>`; });
                    newAddressRowHtml += `</select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">State</label>
                        <select
                            name="addresses[${address_type_id}][${address_row_count}][state]"
                            id="addresses_state" class="form-control" required>
                            <option value="">Select State
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">City</label>
                        <select
                            name="addresses[${address_type_id}][${address_row_count}][city]"
                            id="addresses_city" class="form-control" required>
                            <option value="">Select City
                            </option>
                        </select>
                    </div>
                </div>
                <div
                    class="col-md-3 d-flex justify-content-end align-items-center">
                    <button class="btn btn-danger" id="removeAddress"
                        type="button">Remove</button>
                </div>
            </div>
            `;

            $(`#${address_type}Container`).append(newAddressRowHtml);
        });
        $(document).on('click','#removeAddress',function(){
            $(this).parent().closest('div#addressRow').remove();
        });

        $(document).on('change','#addresses_country',function(){
            var country_id = $(this).val();
            var nearest_state_element = $(this).parent().closest('div#addressRow').find('select#addresses_state');
            console.log(nearest_state_element,'nearest_state_element');
            $.ajax({
                url:"{{route('get.states')}}?country_id="+country_id,
                type:"GET",
                dataType:"json",
                success:function(data){
                    $(nearest_state_element).empty();
                    $(nearest_state_element).append(`<option value="">Select State</option>`)
                    if(data.length > 0){
                        $.each(data,function(key,value){
                            $(nearest_state_element).append(`<option value="${value.id}">${value.name}</option>`);
                        });
                    }else{
                        $(nearest_state_element).append(`<option value="">No State Available</option>`)
                    }
                },
                error:function(data){
                    console.log(data);
                }
            });
        })
        $(document).on('change','#addresses_state',function(){
            var state_id = $(this).val();
            var nearest_city_element = $(this).parent().closest('div#addressRow').find('select#addresses_city');
            $.ajax({
                url:"{{route('get.cities')}}?state_id="+state_id,
                type:"GET",
                dataType:"json",
                success:function(data){
                    $(nearest_city_element).empty();
                    $(nearest_city_element).append(`<option value="">Select City</option>`)
                    if(data.length > 0){
                        $.each(data,function(key,value){
                            $(nearest_city_element).append(`<option value="${value.id}">${value.name}</option>`);
                        });
                    }else{
                        $(nearest_city_element).append(`<option value="">No City Available, Select another State</option>`)
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
