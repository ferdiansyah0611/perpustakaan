@extends('layouts.app')
@section('title', $title)
@section('content')
<div class="auth-wrapper">
	<form method="POST" action="{{ route('register') }}">
		@csrf
		<div class="card">
			<div class="row align-items-center">
				<div class="col-md-12 text-center">
					<div class="card-body">
						<img src="{{asset('images/logo-dark.svg')}}" alt="" class="img-fluid mb-4">
						<h4 class="mb-3 f-w-400">Sign Up</h4>
						<div class="input-group mb-3">
							<span class="input-group-text"><i data-feather="user"></i></span>
							<input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Full Name" required autofocus>
						</div>
						<div class="input-group mb-3">
							<span class="input-group-text"><i data-feather="mail"></i></span>
							<input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email address" required>
						</div>
						<div class="input-group mb-4">
							<span class="input-group-text"><i data-feather="lock"></i></span>
							<input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
						</div>
						<div class="input-group mb-4">
							<span class="input-group-text"><i data-feather="lock"></i></span>
							<input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
						</div>
						<div class="form-group text-left mt-2">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
								<label class="form-check-label" for="flexCheckChecked">
									Accept privacy & policy
								</label>
							</div>
						</div>
						<div>
							<button type="submit" class="btn btn-block btn-primary mb-4">Register</button>
							<p class="mb-0 text-muted">Have an account? <a href="{{route('signin')}}" class="f-w-400">Sign in</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection