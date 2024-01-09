<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from demos.codexcoder.com/themeforest/html/ollya/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Dec 2023 08:36:56 GMT -->

<head>
    <meta charset="utf-8">
    <title>Ollya</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! $sitesetting['meta_tags'] !!}
    <!-- site favicon -->
    <link rel="icon" type="image/png" href="{{asset('frontend/assets/images/favicon.png')}}">
    <!-- Place favicon.ico in the root directory -->
    @include('frontend.layouts.includes.css')
</head>

<body>
    <!-- preloader start here -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- preloader ending here -->


    <!-- scrollToTop start here -->
    <a href="#" class="scrollToTop"><i class="fa-solid fa-angle-up"></i></a>
    <!-- scrollToTop ending here -->


    <!-- ================> header section start here <================== -->
    @include('frontend.layouts.includes.header')
    <!-- ================> header section end here <================== -->

    @yield('content')

    <!-- ================> Footer section start here <================== -->

    @include('frontend.layouts.includes.footer')

    <!-- ================> Footer section end here <================== -->

    @include('frontend.layouts.includes.js')
</body>

<!-- Mirrored from demos.codexcoder.com/themeforest/html/ollya/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Dec 2023 08:37:08 GMT -->

</html>