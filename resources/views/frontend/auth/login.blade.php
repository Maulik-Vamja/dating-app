@extends('frontend.layouts.auth')
@section('content')
<section class="log-reg">
    <div class="top-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-7">
                    <div class="logo">
                        <a href="index.html"><img src="{{asset('frontend/assets/images/logo/logo.png')}}"
                                alt="logo"></a>
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
                        <h2 class="title">Welcome to Ollya</h2>
                    </div>
                    <div class="main-content inloginp">
                        <form action="#">
                            <div class="form-group">
                                <label>Your Address</label>
                                <input type="email" class="my-form-control" placeholder="Enter Your Email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="my-form-control" placeholder="Enter Your Password">
                            </div>
                            <p class="f-pass">Forgot your password? <a href="#">recover password</a></p>
                            <div class="text-center">
                                <button type="submit" class="default-btn"><span>Sign IN</span></button>
                            </div>
                            <div class="or">
                                <p>OR</p>
                            </div>
                            <div class="or-content">
                                <p>Sign up with your email</p>
                                <a href="#" class="default-btn reverse"><img
                                        src="{{asset('frontend/assets/images/login/google.png')}}" alt="google">
                                    <span>Sign Up with Google</span></a>
                                <p class="or-signup"> Don't have an account? <a href="{{ route('register') }}">Sign up
                                        here</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
{{-- @extends('frontend.layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                                }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password')
                                }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                        old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}