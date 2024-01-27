@extends('admin.layouts.app')

@push('breadcrumb')
{!! Breadcrumbs::render('users_update', $user->id) !!}
@endpush

@section('content')
<style>
    .dropzone .dz-preview .dz-remove {
        font-size: 14px !important;
    }

    .update_profile_image {
        width: calc(100% - 30px);
        height: 200px;
        object-fit: cover;
        margin: 0 15px;
    }
</style>
<div class="container">
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="fas fa-user-edit text-primary"></i>
                </span>
                <h3 class="card-label text-uppercase">Edit {{ $custom_title }}</h3>
            </div>
        </div>
    </div>
    <div class="d-flex flex-row mt-3">
        <div class="flex-row-auto offcanvas-mobile w-300px" id="kt_profile_aside">
            <div class="card card-custom">
                <div class="card-body ">
                    <ul class="nav nav-tabs flex-column">
                        <li>
                            <a href="#basic_info_tab" data-toggle="tab"
                                class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block active">Basic</a>
                        </li>
                        <li>
                            <a href="#galler_images_tab" data-toggle="tab"
                                class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block">Gallery
                                Images</a>
                        </li>
                        <li>
                            <a href="#personal_details_tab" data-toggle="tab"
                                class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block">Personal
                                details</a>
                        </li>
                        <li>
                            <a href="#rates_tab" data-toggle="tab"
                                class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block">Rates</a>
                        </li>
                        <li>
                            <a href="#policies_tab" data-toggle="tab"
                                class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block">Policies</a>
                        </li>
                        <li>
                            <a href="#contacts_tab" data-toggle="tab"
                                class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block">Contacts</a>
                        </li>
                        <li>
                            <a href="#addresses_tab" data-toggle="tab"
                                class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block">Addresses</a>
                        </li>
                        <li>
                            <a href="#change_password" data-toggle="tab"
                                class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block">Change
                                Password</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="flex-row-fluid ml-lg-8">
            <div class="card card-custom gutter-b">
                <div class="tab-content">
                    <div class="tab-pane active" id="basic_info_tab">
                        <div class="card card-custom card-stretch">
                            <form class="form" action="{{ route('admin.escorts.update',$user->custom_id) }}"
                                method="POST" id="basic_info_form" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-header py-3">
                                    <div class="align-items-start flex-column">
                                        <h3 class="card-label font-weight-bolder text-dark">Basic Information</h3>
                                        <span class="text-muted font-weight-bold font-size-sm mt-1">Update your Basic
                                            Details</span>
                                    </div>
                                    <div class="card-toolbar">
                                        <button type="submit" class="btn btn-success mr-2 text-uppercase">Save
                                            Changes</button>
                                        <a href="{{ route('admin.escorts.index')}}"
                                            class="btn btn-secondary text-uppercase">Cancel</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    {{-- Full Name --}}
                                    <input type="hidden" name="action" value="update_basic">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="full_name">Full Name:</label>
                                            <input type="text" class="form-control" id="full_name" name="full_name"
                                                placeholder="Enter Your Full Name" value="{{ $user->full_name }}"
                                                required>
                                        </div>
                                    </div>
                                    {{-- Short Description --}}
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="short_description">Short Description:</label>
                                            <input type="text" class="form-control" id="short_description"
                                                name="short_description" placeholder="Enter Your Short Description"
                                                value="{{ $user->short_description }}" required>
                                        </div>
                                    </div>
                                    {{-- Gender --}}
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <div class="radio-inline">
                                                <label class="radio">
                                                    <input type="radio" name="gender" id="gender_male" value="male" {{
                                                        $user->gender == 'male' ? 'checked' : ''
                                                    }}
                                                    data-error-container="#gender_error">
                                                    <span></span>
                                                    Man
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="gender" id="gender_female" value="female"
                                                        {{ $user->gender == 'female' ? 'checked'
                                                    :'' }}
                                                    data-error-container="#gender_error">
                                                    <span></span>
                                                    Woman
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="gender" id="gender_non_binary"
                                                        value="non_binary" {{ $user->gender == 'non_binary' ?
                                                    'checked' : ''
                                                    }}
                                                    data-error-container="#gender_error">
                                                    <span></span>
                                                    Non Binary
                                                </label>
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
                                            <input type="text" class="form-control" id="pronouns" name="pronouns"
                                                placeholder="Enter Your Pronouns" value="{{ $user->pronouns }}"
                                                required>
                                        </div>
                                    </div>
                                    {{-- Description --}}
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group mb-3">
                                            <label for="description">Description</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror"
                                                id="description" name="description" placeholder="Enter description"
                                                autocomplete="description"
                                                spellcheck="true">{{ old('description') != null ? old('description') : $user->description }}</textarea>
                                            @if ($errors->has('description'))
                                            <span class="text-danger">
                                                <strong class="form-text">{{ $errors->first('description')
                                                    }}</strong>
                                            </span>
                                            @endif
                                            @php
                                            $countries = \App\Models\Country::all();
                                            @endphp
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="galler_images_tab">
                        <div class="card card-custom card-stretch">
                            <form class="form" action="{{ route('admin.escorts.update',$user->custom_id) }}"
                                method="POST" enctype="multipart/form-data" id="gallary_images_form">
                                @csrf
                                @method('PUT')
                                <div class="card-header py-3">
                                    <div class="align-items-start flex-column">
                                        <h3 class="card-label font-weight-bolder text-dark">Gallery Images</h3>
                                        <span class="text-muted font-weight-bold font-size-sm mt-1">Update your
                                            Images</span>
                                    </div>
                                    <div class="card-toolbar">
                                        <button type="submit" class="btn btn-success mr-2 text-uppercase">Save
                                            Changes</button>
                                        <a href="{{ route('admin.escorts.index')}}"
                                            class="btn btn-secondary text-uppercase">Cancel</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <input type="hidden" name="action" value="update_gallery_images">
                                    <input type="hidden" name="images" id="images">
                                    <input type="hidden" name="deleted_images" id="deleted_images">
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
                                    <div class="row mt-3">
                                        <div class="col-lg-12 col-md-9 col-sm-12">
                                            <div class="row">
                                                @foreach ($user->gallery_images as $image)
                                                <div class="col-lg-3 col-md-4 col-sm-6 mb-3" id="imagePreviewContainer">
                                                    <img src="{{ filter_var($image->image, FILTER_VALIDATE_URL) == false ? Storage::url($image->image) : $image->image }}"
                                                        alt="{{ $image->image }}"
                                                        class="update_profile_image img-fluid">
                                                    <div class="d-flex justify-content-center align-items-center mt-3">
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
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="personal_details_tab">
                        <div class="card card-custom card-stretch">
                            <form class="form" action="{{ route('admin.escorts.update',$user->custom_id) }}"
                                method="POST" enctype="multipart/form-data" id="personal_details_form">
                                @csrf
                                @method('PUT')
                                <div class="card-header py-3">
                                    <div class="align-items-start flex-column">
                                        <h3 class="card-label font-weight-bolder text-dark">Personal Information</h3>
                                        <span class="text-muted font-weight-bold font-size-sm mt-1">Update your personal
                                            informaiton</span>
                                    </div>
                                    <div class="card-toolbar">
                                        <button type="submit" class="btn btn-success mr-2 text-uppercase">Save
                                            Changes</button>
                                        <a href="{{ route('admin.escorts.index')}}"
                                            class="btn btn-secondary text-uppercase">Cancel</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <input type="hidden" name="action" value="update_personal_details">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group d-flex flex-column mb-0">
                                                @php
                                                $user_cater_to = explode(',',$user->caters_to);
                                                @endphp
                                                <label for="category"> Caters To:</label>
                                                <select name="caters_to[]" id="caters_to"
                                                    class="form-control @error('caters_to') is-invalid @enderror w-100"
                                                    data-error-container="#caters_to_error_container" multiple>
                                                    <option value="">Select Your Preference</option>
                                                    @foreach (config('utility.caters_to') as $item)
                                                    <option value="{{$item}}" {{ in_array($item,$user_cater_to)
                                                        ? 'selected' : '' }}>
                                                        {{ $item }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-0">
                                                <label for="age">Age:</label>
                                                <input type="text" class="form-control" id="age" name="age"
                                                    placeholder="Enter Your Age" value="{{ $user->age }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-0">
                                                <label for="height">Height(in Inch):</label>
                                                <input type="text" class="form-control" id="height" name="height"
                                                    placeholder="Enter Your height" value="{{ $user->height }}"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-0">
                                                <label for="body_type"> Body Type:</label>
                                                <select name="body_type" id="body_type" class="form-control">
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
                                        <div class="col-md-6">
                                            <div class="form-group mb-0">
                                                <label for="ethinicity">Ethinicity:</label>
                                                <select name="ethnicity" id="ethnicity" class="form-control">
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
                                        <div class="col-md-6">
                                            <div class="form-group mb-0">
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
                                        <div class="col-md-6">
                                            <div class="form-group mb-0">
                                                <label for="hair_color">Hair Color:</label>
                                                <select name="hair_color" id="hair_color" class="form-control">
                                                    <option value="">Select Your Hair Color</option>
                                                    @foreach (config('utility.hair_color') as $item)
                                                    <option value="{{$item}}" {{ $item==$user->hair_colour ?
                                                        'selected' : '' }}>
                                                        {{ $item }}
                                                    </option>
                                                    @endforeach
                                                    {{-- <input type="text" class="form-control" id="hair_color"
                                                        name="hair_color" placeholder="Enter Your hair_color"
                                                        value="{{ $user->hair_color }}" required> --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-0">
                                                <label for="eye_color"> Eye Color:</label>
                                                <select name="eye_color" id="eye_color" class="form-control">
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
                                        <div class="col-md-6">
                                            <div class="form-group mb-0">
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
                                        <div
                                            class="checkbox-inline d-flex align-items-center justify-content-center gap-2">
                                            @foreach (config('utility.availibility_days') as $item)
                                            <label class="checkbox">
                                                <input class="form-check-input" type="checkbox" value="true"
                                                    id="availibility[{{$item}}]" name="availibility[{{$item}}]"
                                                    @checked(isset($user_availibility[$item]))>
                                                <span></span>
                                                {{$item}}
                                            </label>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label for="availibility_description">Description</label>
                                        <textarea name="availibility_description" class="form-control"
                                            id="availibility_description"
                                            rows="5">{{ $user->availibility_description }}</textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane " id="rates_tab">
                        <div class="card card-custom card-stretch">
                            <form class="form" action="{{ route('admin.escorts.update',$user->custom_id) }}"
                                method="POST" id="rates_form">
                                @csrf
                                @method('PUT')
                                <div class="card-header py-3">
                                    <div class="align-items-start flex-column">
                                        <h3 class="card-label font-weight-bolder text-dark">Rates</h3>
                                        <span class="text-muted font-weight-bold font-size-sm mt-1">Please Update Your
                                            Rates</span>
                                    </div>
                                    <div class="card-toolbar">
                                        <button type="submit" class="btn btn-success mr-2 text-uppercase">Save
                                            Changes</button>
                                        <a href="{{ route('admin.escorts.index')}}"
                                            class="btn btn-secondary text-uppercase">Cancel</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <input type="hidden" name="action" value="update_rates">
                                    <div class="row">
                                        @foreach (\App\Models\RateType::all() as $rate_type)
                                        <div class="col-md-12">
                                            <div class="card mb-4">
                                                <div
                                                    class="card-header p-4 d-flex justify-content-between align-items-center">
                                                    <h6>{{ $rate_type->type }}</h6>
                                                    <button class="btn btn-primary" type="button"
                                                        data-rate-type="{{ $rate_type->type }}"
                                                        data-rate-type-id="{{ $rate_type->id }}" id="addMoreRate">
                                                        Add
                                                        +
                                                    </button>

                                                </div>
                                                @php
                                                $user_rates =
                                                $user->rates()->where('rate_type_id',$rate_type->id)->get();
                                                $rate_type_id = $rate_type->id;
                                                @endphp
                                                <div class="card-body">
                                                    <div id="{{$rate_type->type}}Container">
                                                        @forelse ($user_rates as $key => $rate)

                                                        <div class="row align-items-end" id="rateRow">
                                                            <input type="hidden"
                                                                name="rates[{{$rate_type_id}}][{{$key}}][rate_type_id]"
                                                                value="{{ $rate_type_id }}">
                                                            <div class="col-md-3">
                                                                <div class="form-group mb-0">
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
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-0">
                                                                    <label
                                                                        for="rates[{{$rate_type_id}}][{{$key}}][description]">description</label>
                                                                    <input type="text" value="{{ $rate->description }}"
                                                                        name="rates[{{$rate_type_id}}][{{$key}}][description]"
                                                                        id="rates[{{$rate_type_id}}][{{$key}}][description]"
                                                                        placeholder="Enter Description"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group mb-0">
                                                                    <label
                                                                        for="rates[{{$rate_type_id}}][{{$key}}][rate]">Rate</label>
                                                                    <input type="text" value="{{ $rate->rate }}"
                                                                        name="rates[{{$rate_type_id}}][{{$key}}][rate]"
                                                                        id="rates[{{$rate_type_id}}][{{$key}}][rate]"
                                                                        placeholder="Enter rate" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <button id="removeRate" type="button"
                                                                    class="btn btn-danger"
                                                                    data-rate-type="{{ $rate_type->type}}">Remove
                                                                </button>
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
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="policies_tab">
                        <div class="card card-custom card-stretch">
                            <form class="form" action="{{ route('admin.escorts.update',$user->custom_id) }}"
                                method="POST" enctype="multipart/form-data" id="policy_form">
                                @csrf
                                @method('PUT')
                                <div class="card-header py-3">
                                    <div class="align-items-start flex-column">
                                        <h3 class="card-label font-weight-bolder text-dark">Policies</h3>
                                        <span class="text-muted font-weight-bold font-size-sm mt-1">Update your Policy
                                            Information</span>
                                    </div>
                                    <div class="card-toolbar">
                                        <button type="submit" class="btn btn-success mr-2 text-uppercase">Save
                                            Changes</button>
                                        <a href="{{ route('admin.escorts.index')}}"
                                            class="btn btn-secondary text-uppercase">Cancel</a>
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
                                        <input type="hidden" name="policies[{{ $policy_type->type }}][policy_type_id]"
                                            value="{{ $policy_type->id }}">
                                        @php
                                        $user_policy =
                                        $user->policies()->where('policy_type_id',
                                        $policy_type->id)->first();
                                        @endphp
                                        <div class="col-md-12 mb-3">
                                            <div class="card">
                                                <div class="card-header p-4">
                                                    <h4>{{ $policy_type->type }}</h4>
                                                </div>
                                                <div class="card-body">
                                                    <textarea name="policies[{{ $policy_type->type }}][description]"
                                                        id="policies[{{ $policy_type->type }}][description]" cols="30"
                                                        class="form-control border-0 outline-0"
                                                        placeholder="Please add description about your {{ $policy_type->type }} Policy"
                                                        rows="5">{{ $user_policy->description ?? '' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="contacts_tab">
                        <div class="card card-custom card-stretch">
                            <form class="form" action="{{ route('admin.escorts.update',$user->custom_id) }}"
                                method="POST" id="contacts_form">
                                @csrf
                                @method('PUT')
                                <div class="card-header py-3">
                                    <div class="align-items-start flex-column">
                                        <h3 class="card-label font-weight-bolder text-dark">Contact Information</h3>
                                        <span class="text-muted font-weight-bold font-size-sm mt-1">Update your Contact
                                            Informaiton</span>
                                    </div>
                                    <div class="card-toolbar">
                                        <button type="submit" class="btn btn-success mr-2 text-uppercase">Save
                                            Changes</button>
                                        <a href="{{ route('admin.escorts.index')}}"
                                            class="btn btn-secondary text-uppercase">Cancel</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <input type="hidden" name="action" value="update_contacts">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="" class="h4 text-strong">Contact</label>
                                                <textarea name="contact_disclaimer" class="form-control" id="" cols="30"
                                                    rows="10">{{ $user->contact_disclaimer }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
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
                                                <input type="hidden" name="contacts[{{$media->name}}][contact_media_id]"
                                                    value="{{ $media->id }}">
                                                <label for="contacts[{{$media->name}}][value]"><i
                                                        class="{{ $media->icon }}" style="margin-right: 5px;"></i>{{
                                                    $media->name }}</label>
                                                <input type="{{ $input_type }}" name="contacts[{{$media->name}}][value]"
                                                    id="contacts[{{$media->name}}][value]" class="form-control"
                                                    placeholder="Please Enter Your {{ $media->name }} {{ $input_type == 'email' ? '' : $input_type }}"
                                                    value="{{$contact->value ?? null}}">
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="addresses_tab">
                        <div class="card card-custom card-stretch">
                            <form class="form" action="{{ route('admin.escorts.update',$user->custom_id) }}"
                                method="POST" id="addresses_form">
                                @csrf
                                @method('PUT')
                                <div class="card-header py-3">
                                    <div class="align-items-start flex-column">
                                        <h3 class="card-label font-weight-bolder text-dark">Address Information</h3>
                                        <span class="text-muted font-weight-bold font-size-sm mt-1">Update your Address
                                            Information</span>
                                    </div>
                                    <div class="card-toolbar">
                                        <button type="submit" class="btn btn-success mr-2 text-uppercase">Save
                                            Changes</button>
                                        <a href="{{ route('admin.escorts.index')}}"
                                            class="btn btn-secondary text-uppercase">Cancel</a>
                                    </div>
                                </div>
                                @php
                                $addressTypes =
                                \App\Models\AddressType::where('is_active','y')->get();
                                @endphp
                                <div class="card-body">
                                    <input type="hidden" name="action" value="update_addresses">
                                    @foreach ($addressTypes as $key => $address_type)
                                    <div class="card mb-4">
                                        <div class="card-header p-4 d-flex justify-content-between align-items-center">
                                            <h6>{{ $address_type->address_type }}</h6>
                                            <button type="button" class="btn btn-primary" id="AddMoreAddress"
                                                data-address_type="{{ str_slug($address_type->address_type) }}"
                                                data-address_type_id="{{ $address_type->id }}">Add
                                                +</button>
                                        </div>
                                        @php
                                        $user_addresses =
                                        $user->addresses()->where('address_type_id',$address_type->id)->get();
                                        @endphp
                                        <div class="card-body">
                                            <div class="" id="{{str_slug($address_type->address_type)}}Container">
                                                @foreach ($user_addresses as $key => $address)
                                                <div class="row align-items-end" id="addressRow">
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-0">
                                                            <label for="">Country</label>
                                                            <select
                                                                name="addresses[{{ $address_type->id }}][{{$key}}][country]"
                                                                class="form-control" id="addresses_country" required>
                                                                <option value="">Select Country
                                                                </option>

                                                                @foreach ($countries as $country)
                                                                <option value="{{ $country->id }}" @selected($address->
                                                                    country_id
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
                                                        <div class="form-group mb-0">
                                                            <label for="">State</label>
                                                            <select
                                                                name="addresses[{{ $address_type->id }}][{{$key}}][state]"
                                                                id="addresses_state" class="form-control" required>
                                                                <option value="">Select State
                                                                </option>
                                                                @foreach ($stored_states as $state)
                                                                <option value="{{ $state->id }}" @selected($address->
                                                                    state_id ==
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
                                                        <div class="form-group mb-0">
                                                            <label for="">City</label>
                                                            <select
                                                                name="addresses[{{ $address_type->id }}][{{$key}}][city]"
                                                                id="addresses_city" class="form-control" required>
                                                                <option value="">Select Country
                                                                </option>
                                                                @foreach ($stored_cities as $city)
                                                                <option value="{{ $city->id }}" @selected($address->
                                                                    city_id ==
                                                                    $city->id)>
                                                                    {{ $city->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 d-flex justify-content-end align-items-center">
                                                        <button class="btn btn-danger" id="removeAddress"
                                                            type="button">Remove</button>
                                                    </div>
                                                </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="change_password">
                        <div class="card card-custom">
                            <form class="form" id="change_password_form"
                                action="{{ route('admin.escorts.changePassword',$user->custom_id)}}" method="POST">
                                @csrf
                                <div class="card-header py-3">
                                    <div class="align-items-start flex-column">
                                        <h3 class="card-label font-weight-bolder text-dark">Change Password</h3>
                                        <span class="text-muted font-weight-bold font-size-sm mt-1">Change account
                                            Password</span>
                                    </div>
                                    <div class="card-toolbar">
                                        <button type="submit" class="btn btn-success mr-2">Update Password</button>
                                        <a href="{{ route('admin.escorts.index') }}"
                                            class="btn btn-secondary">Cancel</a>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-alert">New Password</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input type="password" class="form-control form-control-lg" value=""
                                                name="password" id="password" placeholder="New password" />
                                            @error('password')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-alert">Verify
                                            Password</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input type="password" class="form-control form-control-lg" value=""
                                                name="confirm_password" id="confirm_password"
                                                placeholder="Verify password" />
                                            @error('confirm_password')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

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
@endsection

@push('extra-js')
<script type="text/javascript">
    var summernoteImageUpload = '{{ route('admin.summernote.imageUpload') }}';
    var summernoteMediaDelete = '{{ route('admin.summernote.mediaDelete') }}';
</script>
<script>
    $(document).ready(function() {

        // Basic Info Tab Start =========
        var summernoteElement = $('#description');
        var imagePath = 'escorts/descriptions/images';
        summernoteElement.summernote({
                height: 300,
                callbacks: {
                    onImageUpload : function(files, editor, welEditable) {
                        for(var i = files.length - 1; i >= 0; i--) {
                            sendFile(files[i], this,imagePath);
                        }
                    },
                    onMediaDelete : function(target) {
                        deleteFile(target[0].src);
                    },
                }
        });
        $("#basic_info_form").validate({
            rules: {
                full_name: {
                    required: true,
                    not_empty: true,
                    minlength: 3,
                },
                short_description: {
                    required: true,
                    not_empty: true,
                    minlength: 3,
                },
                gender:{
                    required: true,
                },
                pronouns:{
                    required: true,
                    not_empty: true,
                    minlength: 3,
                },
            },
            messages: {
                full_name: {
                    required: "@lang('validation.required',['attribute'=>'Full Name'])",
                    not_empty: "@lang('validation.not_empty',['attribute'=>'Full Name'])",
                    minlength:"@lang('validation.min.string',['attribute'=>'Full Name','min'=>3])",
                },
                short_description: {
                    required: "@lang('validation.required',['attribute'=>'Short Description'])",
                    not_empty: "@lang('validation.not_empty',['attribute'=>'Short Description'])",
                    minlength:"@lang('validation.min.string',['attribute'=>'Short Description','min'=>3])",
                },
                gender: {
                    required: "@lang('validation.required',['attribute'=>'Gender'])",
                },
                pronouns: {
                    required: "@lang('validation.required',['attribute'=>'Pronouns'])",
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
        });
        $('#basic_info_form').submit(function (e) {
            if(summernoteElement.summernote('isEmpty')) {
                $('#description-error').remove();
                $('<span class="text-danger" id="description-error"><strong class="form-text">The description field is required.</strong></span>').insertBefore('.note-editor');
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
        // Basic Info Tab End =========

        // Gallery Image Tab Start =========
        var images = [];
        var total_uploaded_image = "{{ $user->gallery_images->count() }}";
        var deleted_images = [];

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
        $(document).on('click','#deleteImage',function(){
            var image_url = $(this).data('image_url');
            if(confirm('Are you sure want to delete this Image...?') == true){
                deleted_images.push(image_url);
                $(this).parent().closest('#imagePreviewContainer').remove();
                $('#deleted_images').val(deleted_images);
            }
        });
        // Gallery Image Tab End =========

        // Personal Details Tab Start =========
        $('#caters_to').select2({placeholder: "Please Select your Preference",});
        $('#body_type').select2({placeholder: "Please Select your Body Type",});
        $('#ethnicity').select2({placeholder: "Please Select your Ethnicity",});
        $('#cup_size').select2({placeholder: "Please Select your Cup Size",});
        $('#hair_color').select2({placeholder: "Please Select your Hair Colour",});
        $('#eye_color').select2({placeholder: "Please Select your Eye Colour",});
        $('#is_trans').select2({placeholder: "Please Select your preference",});

        // Personal Details Tab End =========

        // Rates Tab Start =========
        $(document).on('click','#addMoreRate',function(){
            var rate_type = $(this).data('rate-type');
            var rate_type_id = $(this).data('rate-type-id');
            var rate_row_count = $(`#${rate_type}Container`).children('div#rateRow').length;

            var newRow = `<div class="row align-items-end" id="rateRow">
                    <input type="hidden"
                        name="rates[${rate_type_id}][${rate_row_count}][rate_type_id]"
                        value="${rate_type_id}">
                    <div class="col-md-3">
                        <div class="form-group mb-0">
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
                    <div class="col-md-4">
                        <div class="form-group mb-0">
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
                        <div class="form-group mb-0">
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
                        class="col-md-2">
                        <button id="removeRate"
                            type="button"
                            class="btn btn-danger"
                            data-rate-type="{{ $rate_type->type}}">Remove</button>
                    </div>
                </div>`;

            $(`#${rate_type}Container`).append(newRow);

        });
        $(document).on('click','#removeRate',function(){
            $(this).parent().closest('div#rateRow').remove();
        });
        // Rates Tab End =========

        // Addresses Tab Start =========
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
        // Addresses Tab End =========
    });
    $(function(){
            $('#change_password_form').validate({
                errorElement: 'span',
                errorClass: 'help-block',
                focusInvalid: false,
                rules: {
                    password: {
                        required: true,
                        no_space:true,
                        minlength:8,
                        maxlength:16,
                    },
                    confirm_password: {
                        required: true,
                        no_space:true,
                        minlength:8,
                        maxlength:16,
                        equalTo: '#password'
                    },
                },
                messages: {
                    password: {
                        required: "The Password field is required.",
                        no_space: "The Password must not have space.",
                        minlength:"The Password must be at least 8 characters.",
                        maxlength:"The Password may not be greater than 16 characters."
                    },
                    confirm_password: {
                        required: "The Confirm Password field is required.",
                        no_space: "The Confirm Password must not have space.",
                        minlength:"The Confirm Password must be at least 8 characters.",
                        maxlength:"The Confirm Password may not be greater than 16 characters.",
                        equalTo: "The Confirm Password does not match Password.",
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
                    $(element).siblings('label').removeClass('text-danger'); // For Label
                },
                errorPlacement: function (error, element) {
                    if (element.attr("type") == "radio") {
                        error.appendTo('.a');
                    }else{
                        if (element.attr("data-error-container")) {
                            error.appendTo(element.attr("data-error-container"));
                        } else {
                            error.insertAfter(element);
                        }
                    }
                }
            });
            $(document).on('submit','#change_password_form',function(){
                if($("#change_password_form").valid()){
                    $(this).submit(function() {
                        return false;
                    });
                    addOverlay();
                    $("input[type=submit], input[type=button], button[type=submit]").prop("disabled", "disabled");
                    return true;
                }else{
                    return false;
                }
            });
        });
</script>
@endpush