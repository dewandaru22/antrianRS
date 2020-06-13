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

	<header class="site-navbar py-4 bg-white js-sticky-header site-navbar-target" role="banner">

	<div class="container">
	<div class="row align-items-center">
		
		<div class="col-6 col-xl-2">
		<h1 class="mb-0 site-logo"><a href="index.html" class="text-black mb-0">
			<img class="navbar-brand-full" src="{{('/template/images/rs-islam-logo.png')}}" width="150" height="40" alt="rsiy logo" href="/awal">
		</a></h1>
		</div>
		<div class="col-12 col-md-10 d-none d-xl-block">
		<nav class="site-navigation position-relative text-right" role="navigation">
		</nav>
		</div>


		<div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a></div>

	</div>
	</div>

	</header>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('/template/images/rsiy.jpg'); background-size: 100%;">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url('/template/images/rs-islam-logo.png'); background-size: auto;">
					<span class="login100-form-title-1">
						LOGIN
					</span>
				</div>

                    <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="wrap-input100 validate-input m-b-26{{ $errors->has('number') ? ' has-error' : '' }}">
                            <label for="number" class="label-input100">Nomor Perawat</label>
                            <div>
                                <input id="number" type="text" class="input100" name="number" value="{{ old('number') }}" required autocomplete="off" autofocus placeholder="">
								<span class="focus-input100"></span>  
                            </div>
                        </div>

                        <div class="wrap-input100 validate-input m-b-26{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="label-input100">Kata Sandi</label>
                            <div>
								<input id="password" type="password" class="input100" name="password" required placeholder="">
                                <span class="focus-input100"></span>
                            </div>
                        </div>
						<div>
								@if ($errors->has('number'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif

								@if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
						</div>

						<div class="flex-sb-m w-full p-b-30">
							<div>
								<a href="{{ route('password.request') }}" class="txt1">
									Lupa kata sandi?
								</a>
							</div>
						</div>
						
						<div class="container-login100-form-btn">
							<button class="login100-form-btn">
								Masuk
							</button>
						</div>
                    </form>
			</div>
		</div>
	</div>
	
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