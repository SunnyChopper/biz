@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class='container pt-64 pb-64'>
		<div class='row'>
			<div class='col-12'>
				<a href='{{ url('/beta/kit/' . $kit->id . '/dashboard') }}' class="btn btn-sm btn-info"><span class="icon-arrow-left mr-2"></span> Back to Kit Dashboard</a>
			</div>
		</div>

		<div class='row mt-16 justify-content-center'>
			@if(count($pages) > 0)
				<div class='col-lg-4 col-md-4 col-sm-12 col-12'>
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<?php $i = 0; ?>
						@foreach($pages as $page)
	  					<a class="nav-link <?php if ($i == 0) { echo "active"; } ?>" id="vt-{{ $page->id }}" data-toggle="pill" href="#v-pills-{{ $page->id }}" role="tab" aria-controls="v-pills-{{ $page->id }}" aria-selected="<?php if ($i == 0) { echo "true"; } else { echo "false"; } ?>">{{ $page->section }}.{{ $page->order  }} - {{ $page->title }}</a>
	  					<?php $i++; ?>
	  					@endforeach
  					</div>
				</div>

				<div class='col-lg-8 col-md-8 col-sm-12 col-12'>
					<div class="tab-content" id="v-pills">
						<?php $i = 0; ?>
						@foreach($pages as $page)
						<div class="tab-pane fade <?php if ($i == 0) { echo "show active"; } ?>" id="v-pills-{{ $page->id }}" role="tabpanel" aria-labelledby="vt-{{ $page->id }}">
							{!! $page->body !!}
						</div>
						<?php $i++; ?>
						@endforeach
					</div>
				</div>
			@else
				<div class='col-lg-7 col-md-8 col-sm-10 col-12'>
					<div style='background: hsl(0, 0%, 96%); padding: 24px; border-radius: 5px;'>
						<h3 class='text-center'>No Pages Found</h3>
						<p class='text-center mb-0'>There are currently no pages that go along with the {{ $kit->title }}. Check back later as we are still updating many parts of the site.</p>
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