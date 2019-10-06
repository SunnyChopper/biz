<!doctype html>
<html lang="en">

<head>
	@if(isset($page_title))
	<title>{{ $page_title }}</title>
	@else
	<title>{{ config('app.name') }}</title>
	@endif

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Muli:400,700" rel="stylesheet">

	<link rel="stylesheet" href="{{ URL::asset('fonts/icomoon/style.css') }}">

	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datepicker.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/jquery.fancybox.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('fonts/flaticon/font/flaticon.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/aos.css') }}">

	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/layouts.css') }}">
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
	<div class="site-wrap" id="home-section">
		@include('layouts.header')
		@yield('content')
		@include('layouts.footer')
	</div>
	@include('layouts.js')
</body>
</html>

