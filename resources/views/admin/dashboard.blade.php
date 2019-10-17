@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class='container pt-64 pb-64'>
		<div class='row justify-content-center'>
			<div class='col-lg-6 col-md-6 col-sm-12 col-12'>
				@if(count($kits) > 0)
					<h3>Manage Your Kits</h3>
					<ul class='list-group mt-16'>
						@foreach($kits as $kit)
						<li class='list-group-item'>
							<div class='row' style='display: flex;'>
								<div class='col-lg-8 col-md-8 col-sm-12 col-12' style='margin: auto;'>
									<h6 class='mb-0' style='float: left;'>{{ $kit->title }}</h6>
								</div>

								<div class='col-lg-4 col-md-4 col-sm-12 col-12' style='margin: auto;'>
									<a href='{{ url('/admin/kit/' . $kit->id . '/edit') }}' class='btn btn-warning btn-sm' style='float: right;'>Edit</a>
								</div>
							</div>
						</li>
						@endforeach
					</ul>
				@else
					<h3>Create a Kit</h3>
					<p>Get started on creating the first starter kit for the site.</p>

				@endif
			</div>

			<div class='col-lg-6 col-md-6 col-sm-12 col-12'>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
	<script type='text/javascript'>
		
	</script>
@endsection