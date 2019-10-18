@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class='container pt-64 pb-64'>
		<div class='row justify-content-center'>
			<div class='col-lg-9 col-md-10 col-sm-12 col-12'>
				<div class='gray-box'>
					<form id='create_kit_form' action='{{ url('/admin/kits/create') }}' method='post'>
						{{ csrf_field() }}
						<input type='hidden' name='from' value='web'>
						<div class='form-group row'>
							<div class='col-12'>
								<label>Image URL:</label>
								<input type='text' class='form-control' name='image_url' required>
							</div>
						</div>

						<div class='form-group row'>
							<div class='col-12'>
								<label>Title:</label>
								<input type='text' class='form-control' name='title' required>
							</div>
						</div>

						<div class='form-group row'>
							<div class='col-12'>
								<label>Description:</label>
								<textarea form='create_kit_form' name='description' class='form-control' rows='8'></textarea>
							</div>
						</div>

						<div class='form-group row'>
							<div class='col-12'>
								<input type='submit' class='btn btn-primary centered' value='Create Kit'>
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