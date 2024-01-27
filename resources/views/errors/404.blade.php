<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Not Found ! iFindYou</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- site favicon -->
    <link rel="icon" type="image/png" href="{{asset('frontend/assets/images/fav-icon.png')}}">
    <!-- Place favicon.ico in the root directory -->
    @include('frontend.layouts.includes.css')

</head>

<body>

    <!-- ================> login section start here <================== -->
    <section class="log-reg forezero">
        <div class="container">
            <div class="row justify-content-end">
                <div class="image image-404"></div>
                <div class="col-lg-7 ">
                    <div class="log-reg-inner">
                        <div class="main-thumb mb-5">
                            <a  href="{{ route('welcome') }}"><img style="max-height: 40px;"
                                src="{{asset('frontend/assets/images/logo/logo.png')}}" alt="logo"></a>
                        </div>
                        <div class="main-content inloginp">
                            <div class="text-content text-center">
                                <h2>Ops! This Page Not Pound</h2>
                                <p>We are Really Sorry But the Page you Requested is Missing :( </p>
                                <a href="/" class="default-btn reverse"><span>Back to Home</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================> login section end here <================== -->

</body>
</html>
