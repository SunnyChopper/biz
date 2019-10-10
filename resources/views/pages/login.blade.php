@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class='container pt-64 pb-64'>
		<div class='row justify-content-center'>
			<div class='col-lg-7 col-md-8 col-sm-9 col-12'>
				<div style='background: hsl(0, 0%, 95%); border-radius: 5px; padding: 24px; border-bottom: 2px solid hsl(0, 0%, 85%);'>
					<form action='{{ url('/beta/login/attempt') }}' method='POST'>
						{{ csrf_field() }}
						<div class='form-group row'>
							<div class='col-lg-6 col-md-6 col-sm-12 col-12'>
								<label>Username:</label>
								<input type='text' value='{{ old('username') }}' class='form-control' name='username' required>
							</div>

							<div class='col-lg-6 col-md-6 col-sm-12 col-12 mt-16-mobile'>
								<label>Password:</label>
								<input type='password' class='form-control' name='password' required>
							</div>
						</div>

						@if(session()->has('error'))
						<p class='text-center red mt-1 mb-0'>{{ session()->get('error') }}</p>
						@endif

						<div class='form-group row mt-32 mb-8'>
							<div class='col-12'>
								<input type='submit' class='btn btn-primary centered' value='Login'>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
	<script type='text/javascript'>
		
	</script>
@endsection