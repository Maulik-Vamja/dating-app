@extends('frontend.layouts.auth')
@section('content')
<section class="log-reg">
    <div class="top-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-7">
                    <div class="logo">
                        <a href="/"><img style="max-height: 50px"
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
                        <form action="{{route('login')}}" method="POST" id="">
                            @csrf
                            <div class="form-group">
                                <label>Your Address</label>
                                <input type="email" name="email" id="email" class="my-form-control"
                                    placeholder="Enter Your Email" value="{{ old('email') }}">
                                @error('email')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" id="password" class="my-form-control"
                                    placeholder="Enter Your Password">
                                @error('email')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            {{-- <p class="f-pass">Forgot your password? <a href="#">recover password</a></p> --}}
                            <div class="">
                                <button type="submit" class="default-btn"><span>Sign IN</span></button>
                            </div><br><br>
                            <p class="or-signup"> Don't have an account?

                            </p>

                            <a class="btn btn-info" href="{{ route('register') }}">Sign up
                                here</a>

                            {{-- <div class="or">
                                <p>OR</p>
                            </div>
                            <div class="or-content">
                                <p>Sign up with your email</p>
                                <a href="#" class="default-btn reverse"><img
                                        src="{{asset('frontend/assets/images/login/google.png')}}" alt="google">
                                    <span>Sign Up with Google</span></a>

                            </div> --}}
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
            },
            messages: {
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
