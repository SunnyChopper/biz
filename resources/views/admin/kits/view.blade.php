@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	

	<div class='container pt-64 pb-64'>
		<div class='row justify-content-center'>
			@if(count($kits) > 0)
				@foreach($kits as $kit)
				<div class='col-lg-4 col-md-4 col-sm-12 col-12 mt-16 mb-16'>
					<a href="{{ url('/admin/kits/' . $kit->id . '/edit') }}">
						<div class='image-box'>
							<div style='background-image: url("{{ $kit->image_url }}"); height: 250px; width: 100%; background-size: cover; background-position: center;'></div>
							<div style='background: white; padding: 24px;'>
								<h4>{{ $kit->title }}</h4>
								<p class='font-gray-8 mb-2'>{{ substr(strip_tags($kit->description), 0, 128) }}...</p>
							</div>
						</div>
					</a>
				</div>
				@endforeach
			@else
			<div class='col-lg-7 col-md-8 col-sm-10 col-12'>
				<div class='gray-box'>
					<h3 class='text-center'>No Kits Found</h3>
					<p class='text-center'>There are currently no kits on the site. Click below to create the first starter kit.</p>
					<a href="{{ url('/admin/kits/new') }}" class='btn btn-primary centered'>Create New Kit</a>
				</div>
			</div>
			@endif
		</div>

		@if(count($kits) > 0)
		<div class='row mt-32'>
			<div class='col-12'>
				<a href='{{ url('/admin/kits/new') }}' class='btn btn-primary centered'>Create New Kit</a>
			</div>
		</div>
		@endif
	</div>
@endsection

@section('page_js')
	<script type='text/javascript'>
		
	</script>
@endsection