@extends('layouts.app')
@section('title', $template->title)
@section('content')
<div class="pc-container">
	<div class="pcoded-content">
		<x-breadcrumb :title="$template->title" :links="$template->breadcrumb" />
		<div class="row">
			<div class="col-12">
				<form method="POST" action="{{ route($template->option['route'] . (isset($data) ? '.update': '.store'), [isset($data) ? $data->id: '']) }}">
					@csrf
					@if(isset($data))
						@method('PUT')
					@endif
					<div class="card">
						<div class="card-header">
							<h5>@if(isset($data)) Edit @else Create @endif</h5>
							<span class="d-block m-t-5">Please ensure all fields are filled</span>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label for="name">Name</label>
								<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($data) ? $data->name : old('name') }}" required autocomplete="name" autofocus>
								@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection