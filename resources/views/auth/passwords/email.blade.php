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

                     @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="login100-form validate-form" method="POST" action="{{ route('password.email') }}">
                    @csrf

                        <div class="wrap-input100 validate-input m-b-26">
                            <label for="number" class="label-input100">{{ __('E-Mail Address') }}</label>
                            <div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="container-login100-form-btn">
							<button class="login100-form-btn">
                            {{ __('Send Password Reset Link') }}
							</button>
						</div>
                    </form>
			</div>
		</div>
	</div>
	@endsection