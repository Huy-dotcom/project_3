<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>


    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets')}}/images/custom/logo.png">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/animate.css">
	<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/chosen.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/style.css">
	<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/color-01.css">
</head>

	<!--header-->
	@include('user.layouts.header')

	{{-- content --}}
    {{-- @include('user.layouts.content') --}}
    @yield('content')


    {{-- footer --}}
    @include('user.layouts.footer')


	<script src="{{asset('assets')}}/js/jquery-1.12.4.minb8ff.js?ver=1.12.4"></script>
	<script src="{{asset('assets')}}/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4"></script>
	<script src="{{asset('assets')}}/js/bootstrap.min.js"></script>
	<script src="{{asset('assets')}}/js/jquery.flexslider.js"></script>
	<script src="{{asset('assets')}}/js/chosen.jquery.min.js"></script>
	<script src="{{asset('assets')}}/js/owl.carousel.min.js"></script>
	<script src="{{asset('assets')}}/js/jquery.countdown.min.js"></script>
	<script src="{{asset('assets')}}/js/jquery.sticky.js"></script>
	<script src="{{asset('assets')}}/js/functions.js"></script>


</body>
</html>
