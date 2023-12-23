@extends('frontend.layouts.auth')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('First Name')
                                }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text"
                                    class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                    value="{{ old('first_name') }}" required autocomplete="name" autofocus />

                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Last Name')
                                }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text"
                                    class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                    value="{{ old('last_name') }}" required autocomplete="name" />

                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                                }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" />

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
                                    required autocomplete="new-password" />

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm
                                Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password" />
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="contact_number" class="col-md-4 col-form-label text-md-end">{{ __('Contact
                                Number') }}</label>

                            <div class="col-md-6">
                                <input id="contact_number" type="number"
                                    class="form-control @error('contact_number') is-invalid @enderror"
                                    name="contact_number" value="{{ old('contact_number') }}" required
                                    autocomplete="phone" />

                                @error('contact_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

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
            <div class="image">
            </div>
            <div class="col-lg-7">
                <div class="log-reg-inner">
                    <div class="section-header">
                        <h2 class="title">Welcome to Ollya </h2>
                        <p>Let's create your profile! Just fill in the fields below, and we’ll get a new account. </p>
                    </div>
                    <div class="main-content">
                        <form action="#">
                            <h4 class="content-title">Acount Details</h4>
                            <div class="form-group">
                                <label>Username*</label>
                                <input type="text" class="my-form-control" placeholder="Enter Your Usewrname">
                            </div>
                            <div class="form-group">
                                <label>Email Address*</label>
                                <input type="email" class="my-form-control" placeholder="Enter Your Email">
                            </div>
                            <div class="form-group">
                                <label>Password*</label>
                                <input type="text" class="my-form-control" placeholder="Enter Your Password">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password*</label>
                                <input type="text" class="my-form-control" placeholder="Enter Your Password">
                            </div>
                            <h4 class="content-title mt-5">Profile Details</h4>
                            <div class="form-group">
                                <label>Name*</label>
                                <input type="text" class="my-form-control" placeholder="Enter Your Full Name">
                            </div>
                            <div class="form-group">
                                <label>Birthday*</label>
                                <input type="date" class="my-form-control">
                            </div>
                            <div class="form-group">
                                <label>I am a*</label>
                                <div class="banner__inputlist">
                                    <div class="s-input me-3">
                                        <input type="radio" name="gender1" id="males1"><label for="males1">Man</label>
                                    </div>
                                    <div class="s-input">
                                        <input type="radio" name="gender1" id="females1"><label
                                            for="females1">Woman</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Looking for a*</label>
                                <div class="banner__inputlist">
                                    <div class="s-input me-3">
                                        <input type="radio" name="gender2" id="males"><label for="males">Man</label>
                                    </div>
                                    <div class="s-input">
                                        <input type="radio" name="gender2" id="females"><label
                                            for="females">Woman</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Marial status*</label>
                                <div class="banner__inputlist">
                                    <select>
                                        <option value="Single" selected>Single</option>
                                        <option value="Marid">Marid</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>City*</label>
                                <input type="text" class="my-form-control" placeholder="Enter Your City">
                            </div>
                            <button class="default-btn reverse" data-toggle="modal"
                                data-target="#email-confirm"><span>Create Your Profile</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection