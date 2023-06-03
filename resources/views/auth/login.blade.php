@extends('layouts.app')
@section('title', $title)
@section('content')
<div class="auth-wrapper">
	<form method="POST" action="{{ route('login') }}" class="auth-content">
		@csrf
		<div class="card">
			<div class="row align-items-center">
				<div class="col-md-12 text-center">
					<div class="card-body">
						<img src="{{asset('images/logo-dark.svg')}}" alt="" class="img-fluid mb-4">
						<h4 class="mb-3 f-w-400">Sign In</h4>
						<div class="input-group mb-3">
							<span class="input-group-text"><i data-feather="mail"></i></span>
							<input placeholder="Email" type="email" name="email" id="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}" required autofocus>
							@if ($errors->has('email'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
						</div>

						<div class="input-group mb-3">
							<span class="input-group-text"><i data-feather="lock"></i></span>
							<input placeholder="Password" type="password" name="password" id="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" required>
							@if ($errors->has('password'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
							@endif
						</div>

						<div class="form-group text-left mt-2">
							<input type="checkbox" name="remember" class="form-check-input" id="flexCheckChecked">
							<label class="form-check-label" for="flexCheckChecked">Remember me</label>
						</div>

						<button class="btn btn-lg btn-primary btn-block mb-4" type="submit">Login</button>
						<p class="text-muted">Don’t have an account? <a href="{{route('signup')}}" class="f-w-400">Signup</a></p>
						<p class="mb-0 text-muted"><a href="#" class="f-w-400">Forget Password</a></p>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection