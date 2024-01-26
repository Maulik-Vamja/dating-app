@extends('frontend.layouts.auth')
{{--
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request
                            another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@section('content')
<section class="log-reg">
    <div class="top-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-7">
                    <div class="logo">
                        <a href="/"><img style="max-height: 40px"
                                src="{{asset('frontend/assets/images/logo/logo.png')}}" alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-4 col-5">
                    <a href="{{route('welcome')}}" class="backto-home"><i class="fas fa-chevron-left"></i> Back to
                        Home</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="image image-log"></div>
            <div class="col-lg-7">
                <div class="log-reg-inner">
                    <div class="section-header inloginp">
                        <h3 class="title">Welcome to iFindYou</h3>
                    </div>
                    <div class="main-content inloginp">
                        @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to
                                request
                                another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
