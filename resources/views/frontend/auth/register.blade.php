@extends('frontend.layouts.auth')


@section('seo-meta')
    <title>Register to  get Escort Services, Massage Providers & BDSM Practitioners Nearby | iFindYou</title>
    <meta name="description" content="Register go get escort services, massage providers, and BDSM practitioners easily with iFindYou.">
    <link rel="canonical" href="{{ url()->current() }}" />
@endsection


@section('og-meta')
    <meta property="og:type" content="website">
    <meta property="og:title" content="Register to  get Escort Services, Massage Providers & BDSM Practitioners Nearby | iFindYou">
    <meta property="og:description" content="Register to get escort services, massage providers, and BDSM practitioners easily with iFindYou">
    <meta property="og:image" content="{{asset('frontend/og_images/home.jpg')}}">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection


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
                        <a href="{{ route('welcome') }}"><img style="max-height:40px;"
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
            <div class="image">
            </div>
            <div class="col-lg-7">
                <div class="log-reg-inner">
                    <div class="section-header">
                        <p>Let's create your profile! If you alrady have, <a style="color:red" href="/login">Please
                                login</a></p>
                    </div>
                    <div class="main-content">
                        <form action="{{ route('register') }}" method="POST" id="registerFrm">
                            @csrf
                            <h4 class="content-title">Acount Details</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    {{-- Name --}}
                                    <div class="form-group">
                                        <label>Name {!! $mend_sign !!}</label>
                                        <input type="text" class="my-form-control" name="full_name" id="full_name"
                                            placeholder="Enter Your Full Name" value="{{ old('full_name') }}">
                                        @error('full_name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{-- Username --}}
                                    <div class="form-group">
                                        <label>Username{!! $mend_sign !!}</label>
                                        <input type="text" class="my-form-control" placeholder="Enter Your Username"
                                            name="user_name" id="user_name" value="{{ old('user_name') }}">
                                        @error('user_name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    {{-- Email --}}
                                    <div class="form-group">
                                        <label>Email Address {!! $mend_sign !!}</label>
                                        <input type="email" class="my-form-control" placeholder="Enter Your Email"
                                            name="email" id="email" value="{{ old('email') }}">
                                        @error('email')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    {{-- Gender --}}
                                    <div class="form-group">
                                        <label>Gender{!! $mend_sign !!}</label>
                                        <div class="banner__inputlist">
                                            <select name="gender" id="gender" class=""
                                                data-error-container="#gender_error">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="non-binary">Non Binary</option>
                                            </select>

                                            {{-- <div class="s-input me-3">
                                                <input type="radio" name="gender" id="gender_male" value="male" checked
                                                    data-error-container="#gender_error"><label
                                                    for="gender_male">Man</label>
                                            </div>
                                            <div class="s-input">
                                                <input type="radio" name="gender" id="gender_female" value="female"
                                                    data-error-container="#gender_error"><label
                                                    for="gender_female">Woman</label>
                                            </div>--}}
                                        </div>
                                        @error('gender')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong></span>
                                        @enderror
                                        <span id="gender_error"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    {{-- Age --}}
                                    <div class="form-group">
                                        <label>Age {!! $mend_sign !!}</label>
                                        <div class="banner__inputlist mb-0">
                                            <select name="user_age" id="user_age" class=""
                                                data-error-container="#user_age_error">
                                                <option value="">Select Your Age</option>
                                                @for ($i = 18; $i <= 60; $i++) <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                            </select>
                                        </div>
                                        @error("user_age")
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong></span>
                                        @enderror
                                        <span id="user_age_error"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    {{-- Height --}}
                                    <div class="form-group">
                                        <label>Height {!! $mend_sign !!}</label>
                                        <input type="text" name="height" id="height" class="my-form-control"
                                            placeholder="Height in CM" value="{{ old('height') }}">
                                        @error('height')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {{-- Password --}}
                                    <div class="form-group">
                                        <label>Password {!! $mend_sign !!}</label>
                                        <input type="password" class="my-form-control" placeholder="Enter Your Password"
                                            name="password" id="password">
                                        @error('password')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{-- Confirm Pass --}}
                                    <div class="form-group">
                                        <label>Confirm Password {!! $mend_sign !!}</label>
                                        <input type="password" class="my-form-control" placeholder="Enter Your Password"
                                            name="password_confirmation" id="password_confirmation">
                                        @error('password_confirmation')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="default-btn reverse"><span>Create Your Profile</span></button>
                            <p class="or-signup mt-3"> Already have an account? <a href="{{ route('login') }}">Sign In
                                    here</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('frontend-extra-js')
<script>
    $(document).ready(function() {
        $("#registerFrm").validate({
            rules: {
                user_name: {
                    required: true,
                    not_empty: true,
                    minlength: 3,
                    remote: {
                        url: "{{ route('check.username') }}",
                        type: "post",
                        data: {
                            _token: "{{ csrf_token() }}",
                            username: function() {
                                return $("#user_name").val();
                            },
                        }
                    },
                },
                email: {
                    required: true,
                    maxlength: 80,
                    email: true,
                    valid_email: true,
                    remote: {
                        url: "{{ route('check.email') }}",
                        type: "post",
                        data: {
                            _token: "{{ csrf_token() }}",
                            type: "user",
                        }
                    },
                },
                password: {
                    required: true,
                    minlength: 8,
                },
                password_confirmation: {
                    required: true,
                    minlength: 8,
                    equalTo: "#password",
                },
                full_name: {
                    required: true,
                    not_empty: true,
                    minlength: 3,
                },
                short_description: {
                    required: false,
                    not_empty: false,
                    minlength: 3,
                },
                pronouns:{
                    required: false,
                    not_empty: false,
                    minlength: 3,
                },
                user_age: {
                    required: true,
                    not_empty: true,
                    digits: true,
                },
                body_type: {
                    required: false,
                },
                height:{
                    required: true,
                    not_empty: true,
                    digits: true,
                },
                ethnicity:{
                    required: false,
                },
            },
            messages: {
                user_name: {
                    required: "@lang('validation.required', ['attribute' => 'User Name'])",
                    not_empty: "@lang('validation.not_empty', ['attribute' => 'User Name'])",
                    minlength: "@lang('validation.min.string', ['attribute' => 'User Name', 'min' => 3])",
                    remote: "@lang('validation.unique', ['attribute' => 'User Name'])",
                },
                email: {
                    required: "@lang('validation.required', ['attribute' => 'Email address'])",
                    maxlength: "@lang('validation.max.string', ['attribute' => 'Email address', 'max' => 80])",
                    email: "@lang('validation.email', ['attribute' => 'Email address'])",
                    valid_email: "@lang('validation.email', ['attribute' => 'Email address'])",
                    remote: "@lang('validation.unique', ['attribute' => 'Email address'])",
                },
                password:{
                    required: "@lang('validation.required', ['attribute' => 'Password'])",
                    minlength: "@lang('validation.min.string', ['attribute' => 'Password', 'min' => 8])",
                },
                password_confirmation: {
                    required: "@lang('validation.required', ['attribute' => 'Confirm Password'])",
                    minlength: "@lang('validation.min.string', ['attribute' => 'Confirm Password', 'min' => 8])",
                    equalTo: "@lang('validation.same', ['attribute' => 'Confirm Password', 'other' => 'Password'])",
                },
                full_name: {
                    required: "@lang('validation.required', ['attribute' => 'last name'])",
                    not_empty: "@lang('validation.not_empty', ['attribute' => 'last name'])",
                    minlength: "@lang('validation.min.string', ['attribute' => 'last name', 'min' => 3])",
                },
                short_description: {
                    required: "@lang('validation.required', ['attribute' => 'Short Description'])",
                    not_empty: "@lang('validation.not_empty', ['attribute' => 'Short Description'])",
                    minlength: "@lang('validation.min.string', ['attribute' => 'Short Description', 'min' => 3])",
                },
                pronouns:{
                    required: "@lang('validation.required', ['attribute' => 'Pronouns'])",
                    not_empty: "@lang('validation.not_empty', ['attribute' => 'Pronouns'])",
                    minlength: "@lang('validation.min.string', ['attribute' => 'Pronouns', 'min' => 3])",
                },
                user_age: {
                    required: "@lang('validation.required', ['attribute' => 'Age'])",
                    not_empty: "@lang('validation.not_empty', ['attribute' => 'Age'])",
                    digits: "@lang('validation.numeric', ['attribute' => 'Age'])",
                },
                body_type: {
                    required: "@lang('validation.required', ['attribute' => 'Body Type'])",
                },
                height:{
                    required: "@lang('validation.required', ['attribute' => 'Height'])",
                    not_empty: "@lang('validation.not_empty', ['attribute' => 'Height'])",
                },
                ethnicity:{
                    required: "@lang('validation.required', ['attribute' => 'Ethnicity'])",
                },
            },
            errorClass: 'invalid-feedback',
            errorElement: 'span',
            highlight: function(element) {
                $(element).addClass('is-invalid');
                $(element).siblings('label').addClass('text-danger'); // For Label
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid');
                $(element).siblings('label').removeClass('text-danger'); // For Label
            },
            errorPlacement: function(error, element) {
                if (element.attr("data-error-container")) {
                    error.appendTo(element.attr("data-error-container"));
                } else {
                    error.insertAfter(element);
                }
            }
        });
        $('#registerFrm').submit(function() {
            if ($(this).valid()) {
                // addOverlay();
                $("input[type=submit], input[type=button], button[type=submit]").prop("disabled",
                    "disabled");
                return true;
            } else {
                return false;
            }
        });
    });
</script>
@endpush
