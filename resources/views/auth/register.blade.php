@extends('auth/base')
@section('content')
	<div class="limiter">
		<div class="container-login100" style="background-image: url('/template/images/rsiy.jpg'); background-size: 100%;">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url('/template/images/rs-islam-logo.png'); background-size: auto;">
					<span class="login100-form-title-1">
                    {{ __('Register') }}
					</span>
				</div>

                    <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="wrap-input100 validate-input m-b-26">
                            <label for="name" class="label-input100">{{ __('Name') }}</label>
                            <div>
                                <input id="name" type="text" class="input100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                            </div>
                        </div>

                        <div class="wrap-input100 validate-input m-b-26{{ $errors->has('number') ? ' has-error' : '' }}">
                            <label for="number" class="label-input100">{{ __('Nomor Perawat') }}</label>
                            <div>
                                <input id="number" type="text" class="input100 @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" required autocomplete="name" autofocus placeholder="">
								@error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                            </div>
                        </div>

                        <div class="wrap-input100 validate-input m-b-26">
                            <label for="email" class="label-input100">{{ __('E-Mail Address') }}</label>

                            <div>
                                <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="wrap-input100 validate-input m-b-26">
                            <label for="password" class="label-input100">{{ __('Password') }}</label>

                            <div>
                                <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" autofocus placeholder="">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="wrap-input100 validate-input m-b-26">
                            <label for="password-confirm" class="label-input100">{{ __('Confirm Password') }}</label>

                            <div>
                                <input id="password-confirm" type="password" class="input100" name="password_confirmation" required autocomplete="new-password" autofocus placeholder="">
                            </div>
                        </div>
						
						<div class="container-login100-form-btn">
							<button type="submit" class="login100-form-btn">
                            {{ __('Register') }}
							</button>
						</div>
                    </form>
			</div>
		</div>
	</div>
	@endsection