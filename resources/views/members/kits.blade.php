@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class='container pt-64 pb-64'>
		<div class='row'>
			@if(count($kits) > 0)
				@foreach($kits as $kit)
				<div class='col-lg-4 col-md-4 col-sm-12 col-12 mt-16 mb-16'>
					<a href="{{ url('/beta/kit/' . $kit->id) }}">
						<div class='image-box'>
							<div style='background-image: url("{{ $kit->image_url }}"); height: 250px; width: 100%; background-size: cover; background-position: center;'></div>
							<div style='background: white; padding: 24px;'>
								<h4>{{ $kit->title }}</h4>
								<p class='font-gray-8 mb-2'>{{ substr(strip_tags($kit->description), 0, 128) }}...</p>
								@if(\App\Custom\KitsHelper::hasUserImported(Auth::id(), $kit->id) == false)
								<p class='red mb-0'><small>Not Imported</small></p>
								@else
								<p class='green mb-0'><small>Imported</small></p>
								@endif
							</div>
						</div>
					</a>
				</div>
				@endforeach
			@else
				<div class='col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-9 col-12'>
					<div style='background: hsl(0, 0%, 95%); padding: 24px; border-radius: 5px;'>
						<h4 class='text-center'>No Kits Found</h4>
						<p class='text-center mb-0'>There are currently no starter kits in the system. We will send out follow-up emails whenever a starter kit is created.</p>
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