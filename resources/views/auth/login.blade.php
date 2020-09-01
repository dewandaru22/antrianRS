@extends('auth/base')
@section('content')
	<div class="limiter">
		<div class="container-login100" >
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-color: #00923F; background-size: auto;">
					<span class="login100-form-title-1">
						Masuk
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
	@endsection