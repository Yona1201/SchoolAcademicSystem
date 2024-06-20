<!--

=========================================================
* Volt Free - Bootstrap 5 Dashboard
=========================================================

* Product Page: https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard
* Copyright 2021 Themesberg (https://www.themesberg.com)
* License (https://themesberg.com/licensing)

* Designed and coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Please contact us to request a removal.

-->
<!DOCTYPE html>
<html lang="en">

<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<!-- Primary Meta Tags -->
		<title>sistem akademik</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="title" content="Volt - Free Bootstrap 5 Dashboard">
		<meta name="author" content="Themesberg">
		<link rel="canonical" href="https://themesberg.com/product/admin-dashboard/volt-premium-bootstrap-5-dashboard">

		<!-- Open Graph / Facebook -->
		<meta property="og:type" content="website">
		<meta property="og:url" content="https://demo.themesberg.com/volt-pro">
		<meta property="og:title" content="Volt - Free Bootstrap 5 Dashboard">
		<meta property="og:description"
				content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
		<meta property="og:image"
				content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

		<!-- Twitter -->
		<meta property="twitter:card" content="summary_large_image">
		<meta property="twitter:url" content="https://demo.themesberg.com/volt-pro">
		<meta property="twitter:title" content="Volt - Free Bootstrap 5 Dashboard">
		<meta property="twitter:description"
				content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
		<meta property="twitter:image"
				content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

		<!-- Favicon -->
		<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets') }}/img/favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets') }}/img/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets') }}/img/favicon/favicon-16x16.png">
		<link rel="manifest" href="{{ asset('assets') }}/img/favicon/site.webmanifest">
		<link rel="mask-icon" href="{{ asset('assets') }}/img/favicon/safari-pinned-tab.svg" color="#ffffff">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="theme-color" content="#ffffff">

		<!-- Sweet Alert -->
		<link type="text/css" href="{{ asset('vendor') }}/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

		<!-- Notyf -->
		<link type="text/css" href="{{ asset('vendor') }}/notyf/notyf.min.css" rel="stylesheet">

		<!-- Volt CSS -->
		<link type="text/css" href="{{ asset('css') }}/volt.css" rel="stylesheet">

		<!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->
		<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
		{{-- font awesome  --}}
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
				integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
				crossorigin="anonymous" referrerpolicy="no-referrer" />

		@stack('css')
		<style>
		</style>
</head>

<body>


		{{-- sweet alert --}}
		@include('sweetalert::alert')

		<!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

		@include('layouts.partials.sidebar')

		<main class="content">


				@include('layouts.partials.topbar')


				@yield('content')




				<footer class="absolute mb-4 mt-4 rounded bg-white p-5 shadow">
						<div class="row">
								<div class="col-12 mb-md-0 mb-4">
										<p class="mb-0 text-center">©<span class="current-year"></span> - <a class="text-primary fw-normal"
														href="/">Sistem Akademik</a></p>
								</div>
						</div>
				</footer>
		</main>

		<!-- Core -->
		<script src="{{ asset('vendor') }}/@popperjs/core/dist/umd/popper.min.js"></script>
		<script src="{{ asset('vendor') }}/bootstrap/dist/js/bootstrap.min.js"></script>

		<!-- Vendor JS -->
		<script src="{{ asset('vendor') }}/onscreen/dist/on-screen.umd.min.js"></script>

		<!-- Slider -->
		<script src="{{ asset('vendor') }}/nouislider/distribute/nouislider.min.js"></script>

		<!-- Smooth scroll -->
		<script src="{{ asset('vendor') }}/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

		<!-- Charts -->
		<script src="{{ asset('vendor') }}/chartist/dist/chartist.min.js"></script>
		<script src="{{ asset('vendor') }}/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>

		<!-- Datepicker -->
		<script src="{{ asset('vendor') }}/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

		<!-- Sweet Alerts 2 -->
		<script src="{{ asset('vendor') }}/sweetalert2/dist/sweetalert2.all.min.js"></script>

		<!-- Moment JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

		<!-- Vanilla JS Datepicker -->
		<script src="{{ asset('vendor') }}/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

		<!-- Notyf -->
		<script src="{{ asset('vendor') }}/notyf/notyf.min.js"></script>

		<!-- Simplebar -->
		<script src="{{ asset('vendor') }}/simplebar/dist/simplebar.min.js"></script>

		<!-- Github buttons -->
		<script async defer src="https://buttons.github.io/buttons.js"></script>

		<!-- Volt JS -->
		<script src="{{ asset('assets') }}/js/volt.js"></script>

		{{-- sweet alert js --}}
		@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])


</body>

</html>
