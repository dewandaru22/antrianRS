@extends('auth/base')
@section('content')
	<div class="limiter">
		<div class="container-login100" style="background-image: url('/template/images/rsiy.jpg'); background-size: 100%;">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url('/template/images/rs-islam-logo.png'); background-size: auto;">
					<span class="login100-form-title-1">
						Reset Kata Sandi
					</span>
				</div>

                    <form class="login100-form validate-form" method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                        <div class="wrap-input100 validate-input m-b-26">
                            <label for="number" class="label-input100">{{ __('E-Mail Address') }}</label>
                            <div>
                            <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="wrap-input100 validate-input m-b-26">
                            <label for="number" class="label-input100">{{ __('Password') }}</label>
                            <div>
                            <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="wrap-input100 validate-input m-b-26">
                            <label for="number" class="label-input100">{{ __('Confirm Password') }}</label>
                            <div>
                                <input id="password-confirm" type="password" class="input100" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
						
						<div class="container-login100-form-btn">
							<button type="submit" class="login100-form-btn">
                                {{ __('Atur Ulang Kata Sandi') }}
							</button>
						</div>
                    </form>
			</div>
		</div>
	</div>
	@endsection