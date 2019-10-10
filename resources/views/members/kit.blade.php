@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class='container pt-64 pb-64'>
		<div class='row justify-content-center'>
			<div class='col-lg-8 col-md-8 col-sm-12 col-12'>
				<img src='{{ $kit->image_url }}' class='regular-image-100'>
				<h3 class='mt-4 mb-2'>{{ $kit->title }}</h3>
				<div id='kit_description'>
					{!! $kit->description !!}
				</div>


				<section id='downloadables' class='mt-32'>
					<h5>Your Downloadables</h5>
					@if(count($downloadables) > 0)
						<ul class='list-group mt-16'>
							@foreach($downloadables as $d)
							<li class='list-group-item'>
								<h6 class="mb-0" style='float: left;'>{{ $d->title }}</h6>

								@if($d->category == 1)
								<h6 class="mb-0" style='float: right;'>PDF</h6>
								@elseif($d->category == 2)
								<h6 class="mb-0" style='float: right;'>Word Document</h6>
								@elseif($d->category == 3)
								<h6 class="mb-0" style='float: right;'>Text File</h6>
								@elseif($d->category == 4)
								<h6 class="mb-0" style='float: right;'>MP3 Audio</h6>
								@elseif($d->category == 5)
								<h6 class="mb-0" style='float: right;'>WAV Audio</h6>
								@elseif($d->category == 6)
								<h6 class="mb-0" style='float: right;'>MP4 Video</h6>
								@elseif($d->category == 7)
								<h6 class="mb-0" style='float: right;'>MOV Video</h6>
								@elseif($d->category == 8)
								<h6 class="mb-0" style='float: right;'>Excel Sheet</h6>
								@elseif($d->category == 9)
								<h6 class="mb-0" style='float: right;'>PowerPoint Presentation</h6>
								@else
								<h6 class="mb-0" style='float: right;'>Other</h6>
								@endif

							</li>
							@endforeach
						</ul>
					@else
						<div class='mt-16' style='background: hsl(0, 0%, 98%); padding: 24px;'>
							<p class='mt-32 mb-32 text-center'><small>There are no downloadables available as of now.</small></p>
						</div>
					@endif
				</section>
			</div>

			<div class='col-lg-4 col-md-4 col-sm-12 col-12 mt-32-mobile'>
				<div style='background: hsl(0, 0%, 97%); border-radius: 5px; padding: 24px;'>
					<h5 id='sidebar_title' class='mb-3'></h5>
					<p id='sidebar_description' class='mb-3'></p>
					<button id='import_button' type='button' class='btn btn-primary full-width import' style="display: none;">Import to Library</button>
					<a id='access_button' href="{{ url('/beta/kit/' . $kit->id . '/pages') }}" class="btn btn-primary full-width" style="display: none;">Access Kit Pages</a>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
	<script type='text/javascript'>
		var _token = '{{ csrf_token() }}';

		function hasUserImported() {
			$.ajax({
				url : '/api/users/kits/imported',
				type : 'GET',
				data : {
					'kit_id' : {{ $kit->id }},
					'user_id' : {{ Auth::id() }}
				},
				success : function(data) {
					if (data == false) {
						$('#sidebar_title').html('Import to Library');
						$('#sidebar_description').html('"{{ $kit->title }}" is currently not part of your library. Click below to import this kit to your library.');
						$('#import_button').show();
						$('#access_button').hide();
					} else {
						$('#sidebar_title').html('View in Library');
						$('#sidebar_description').html('"{{ $kit->title }}" has already been imported into your library. Click below to access this kit.');
						$('#import_button').hide();
						$('#access_button').show();
					}
				}
			});
		}

		$('.import').on('click', function() {
			var button = $(this);
			button.prop('disabled', true);
			button.html('Importing...');
			button.removeClass('btn-primary');
			button.addClass('btn-disabled');

			$.ajax({
				url : '/api/imports/create',
				type : 'POST',
				data : {
					'_token' : _token,
					'user_id' : {{ Auth::id() }},
					'kit_id' : {{ $kit->id }}
				},
				success : function(data) {
					if (data == true) {
						hasUserImported();
					}
				}
			});
		});

		$(document).ready(function() {
			hasUserImported();
		});
	</script>
@endsection