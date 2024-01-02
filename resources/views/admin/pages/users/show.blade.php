@extends('admin.layouts.app')

@push('breadcrumb')
{!! Breadcrumbs::render('users_show', $user->custom_id) !!}
@endpush

@section('content')
<div class="container">
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="fas fa-users text-primary"></i>
                </span>
                <h3 class="card-label text-uppercase">View {{ $custom_title }}</h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ route('admin.escorts.index') }}" class="btn btn-primary text-uppercase">Back</a>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col">
                    <label for="first_name">Escort Name:</label>
                    <h3> {{ $user->full_name ?? 'N/A' }} </h3>
                </div>
                <div class="col">
                    <label for="last_name">Short Description:</label>
                    <h3> {{ $user->short_description ?? 'N/A' }} </h3>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="email">Email:</label>
                    <h3> {{ $user->email ?? 'N/A' }} </h3>
                </div>
                <div class="col">
                    <label for="contact_number">Gender:</label>
                    <h3> {{ $user->gender ?? 'N/A' }} </h3>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="profile_photo">Profile Photo:</label>
                    <br>
                    <img height="150px" width="150px" src="{{ generate_url($user->profile_photo) }}" alt="">
                </div>
            </div>
        </div>

        <div class="card-footer">

        </div>
        <!--end::Form-->
    </div>
</div>
@endsection