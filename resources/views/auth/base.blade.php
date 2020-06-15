<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>Pendaftaran Rumah Sakit</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{('/assets/img/logokai.png')}}" sizes="any" />
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{('/asset/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{('/asset/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{('/asset/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{('/asset/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{('/asset/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{('/asset/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{('/asset/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{('/asset/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{('/asset/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{('/asset/css/main.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="/template/css/bootstrap.min.css">
    <link rel="stylesheet" href="/template/css/jquery-ui.css">
    <link rel="stylesheet" href="/template/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/template/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/template/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="/template/css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="/template/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="/template/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="/template/css/aos.css">

    <link rel="stylesheet" href="/template/css/style.css">
</head>
<body>

<!-- HEADER -->
@include('auth/header')

@yield('content')
	
<!--===============================================================================================-->
	<script src="{{('/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{('/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{('/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{('/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{('/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{('/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{('/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{('/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{('/js/main.js')}}"></script>

</body>
</html>