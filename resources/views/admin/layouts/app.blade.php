<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <title>{{ config('app.name', 'Backend') }} | {{ !empty($custom_title) ? $custom_title : 'Admin Panel' }}</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

	@include('admin.layouts.includes.css')
	@stack('extra-css')

	@include('admin.layouts.includes.favicon')
</head>
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
	<div class="page-loader page-loader-base" id="overlayDocument">
        <div class="blockui">
            <span>Please wait...</span>
            <span>
                <div class="spinner spinner-primary"></div>
            </span>
        </div>
    </div>

    <div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
		<a href="{{ route('admin.dashboard.index') }}">
			<img alt="{{ env('APP_NAME') }}" style="width:90px" alt="{{ env('APP_NAME') }}" src="{{ asset($sitesetting['site_logo']) }}" />
		</a>
		<div class="d-flex align-items-center">
			<button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
				<span></span>
			</button>

			@if(count(auth()->user()->quickLinks) > 0)
                <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
                    <span></span>
                </button>
			@endif

			<button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
				<span class="svg-icon svg-icon-xl">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<polygon points="0 0 24 0 24 24 0 24" />
							<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
							<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
						</g>
					</svg>
				</span>
			</button>
		</div>
	</div>

	<div class="d-flex flex-column flex-root">
		<div class="d-flex flex-row flex-column-fluid page">

			@include('admin.layouts.includes.left-sidebar')

			<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

				@include('admin.layouts.includes.header')

				<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    @include('flash::message')

                        @stack('breadcrumb')

					<div class="d-flex flex-column-fluid">

						@yield('content')

					</div>
				</div>

				@include('admin.layouts.includes.footer')

			</div>
		</div>
	</div>

	@include('admin.layouts.includes.user-panel-right')

	<div id="kt_scrolltop" class="scrolltop">
		<span class="svg-icon">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					<polygon points="0 0 24 0 24 24 0 24" />
					<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
					<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
				</g>
			</svg>
		</span>
	</div>

	@include('admin.layouts.includes.js')

    @stack('extra-js-links')
    @stack('extra-js')

    <script type="text/javascript">
        $(document).ready(setTimeout(function() {
              removeOverlay();
          }, 350));
    </script>
</body>
</html>
