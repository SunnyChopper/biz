@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class='container pt-64 pb-64'>
		<div class='row'>
			@if(count($imports) > 0)
				<div class='col-12'>
					<h4>Your Imported Starter Kits</h4>
				</div>

				@foreach($imports as $import)
				<div class='col-lg-4 col-md-4 col-sm-12 col-12 mt-16 mb-16'>
					<a href="{{ url('/beta/kit/' . $import->kit_id . '/dashboard') }}">
						<div class='image-box'>
							<div style='background-image: url("{{ $import->kit->image_url }}"); height: 250px; width: 100%; background-size: cover; background-position: center;'></div>
							<div style='background: white; padding: 24px;'>
								<h4>{{ $import->kit->title }}</h4>
								<p class='font-gray-8 mb-2'>{{ substr(strip_tags($import->kit->description), 0, 128) }}...</p>
							</div>
						</div>
					</a>
				</div>
				@endforeach

				<div class='col-12 mt-32'>
					<a href='{{ url('/beta/kits') }}' class='btn btn-primary centered'>View All Starter Kits</a>
				</div>
			@else
			<div class='col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-12'>
				<div style='background: hsl(0, 0%, 95%); padding: 24px; border-radius: 5px;'>
					<h4 class='text-center mb-2'>No Kits in Library</h4>
					<p class='text-center mb-3'>There are currently no starter kits in your personal library. Click below to browse through the full collection of starter kits.</p>
					<a href="{{ url('/beta/kits') }}" class='btn btn-primary centered'>View Starter Kits</a>
				</div>
			</div>
			@endif
		</div>
	</div>

	
@endsection

@section('page_js')
	<script type='text/javascript'>
		
	</script>
@endsection