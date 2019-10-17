@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class='container pt-64 pb-64'>
		<div class='row justify-content-center'>
			<div class='col-lg-5 col-md-6 col-sm-8 col-12'>
				<form action='{{ url('/admin/login') }}' method='POST'>
					{{ csrf_field() }}
					<div class='card'>
						<div class='card-body'>
							<div class='form-group'>
								<label>Username:</label>
								<input type='text' name='username' class='form-control' value='{{ old('username') }}' required>
							</div>

							<div class='form-group'>
								<label>Password:</label>
								<input type='password' name='password' class='form-control' required>
							</div>

							@if(session()->has('error'))
							<div class='form-group'>
								<p class='text-center red'>{{ session()->get('error') }}</p>
							</div>
							@endif

							<div class='form-group'>
								<input type='submit' class='btn btn-primary centered' value='Login'>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
	<script type='text/javascript'>
		
	</script>
@endsection