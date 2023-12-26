<!-- All Needed JS -->
<script src="{{asset('frontend/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/vendor/modernizr-3.11.2.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/swiper.min.js')}}"></script>
<!-- <script src="assets/js/all.min.js"></script> -->
<script src="{{asset('frontend/assets/js/wow.js')}}"></script>
<script src="{{asset('frontend/assets/js/counterup.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/lightcase.js')}}"></script>
<script src="{{asset('frontend/assets/js/waypoints.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins.js')}}"></script>
<script src="{{asset('frontend/assets/js/slick.js')}}"></script>
<script src="{{asset('frontend/assets/js/main.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('assets/admin/plugins/jquery-validation/js/additional-methods.js') }}" type="text/javascript">
</script>
<script src="{{ asset('assets/admin/js/custom_validations.js') }}" type="text/javascript"></script>


<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
{{-- <script>
    window.ga = function () {
			ga.q.push(arguments)
		};
		ga.q = [];
		ga.l = +new Date;
		ga('create', 'UA-XXXXX-Y', 'auto');
		ga('set', 'anonymizeIp', true);
		ga('set', 'transport', 'beacon');
		ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async></script> --}}

@stack('frontend-extra-js')
