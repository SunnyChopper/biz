@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class='container pt-64 pb-64'>
		<div class='row'>
			<div class='col-12'>
				<a href='{{ url('/beta/dashboard') }}' class='btn btn-sm btn-warning'><span class="icon-arrow-left mr-2"></span> Back to Main Dashboard</a>
			</div>
		</div>

		<div class='row mt-32 justify-content-center'>
			<div class='col-lg-9 col-md-8 col-sm-12 col-12'>
				<h3>Your Downloadables</h3>

				@if(count($downloadables) > 0)
				<div style="overflow: auto;">
					<table class='table table-striped'>
						<thead>
							<tr>
								<th style="min-width: 200px;">Title</th>
								<th style="min-width: 300px;">Description</th>
								<th style="min-width: 75px;">Category</th>
								<th style="min-width: 150px;"></th>
							</tr>
						</thead>
						<tbody>
							@foreach($downloadables as $d)
							<tr>
								<td style='vertical-align: middle;'>{{ $d->title }}</td>
								<td style='vertical-align: middle;'>{{ $d->description }}</td>

								@if($d->category == 1)
								<td style='vertical-align: middle;'>PDF</td>
								@elseif($d->category == 2)
								<td style='vertical-align: middle;'>Word Document</td>
								@elseif($d->category == 3)
								<td style='vertical-align: middle;'>Text File</td>
								@elseif($d->category == 4)
								<td style='vertical-align: middle;'>MP3 Audio</td>
								@elseif($d->category == 5)
								<td style='vertical-align: middle;'>WAV Audio</td>
								@elseif($d->category == 6)
								<td style='vertical-align: middle;'>MP4 Video</td>
								@elseif($d->category == 7)
								<td style='vertical-align: middle;'>MOV Video</td>
								@elseif($d->category == 8)
								<td style='vertical-align: middle;'>Excel Sheet</td>
								@elseif($d->category == 9)
								<td style='vertical-align: middle;'>PowerPoint Presentation</td>
								@else
								<td style='vertical-align: middle;'>Other</td>
								@endif

								@if($d->status == 1)
								<td style='vertical-align: middle;'>
									<a href='{{ url('/beta/download/' . $d->id) }}' target='_blank' class='btn btn-sm btn-secondary'>Download</a>
								</td>
								@else
								<td style='vertical-align: middle;'>Link Coming Soon</td>
								@endif
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				@else
				<div class='mt-16' style='background: hsl(0, 0%, 97%); padding: 24px;'>
					<p class='text-center font-gray-6 mb-0'><small>No downloadables found for this starter kit. Check back later.</small></p>
				</div>
				@endif
			</div>

			<div class='col-lg-3 col-md-4 col-sm-12 col-12 mt-32-mobile'>
				<div style='background-color: hsl(0, 0%, 97%); padding: 24px; border-radius: 5px;'>
					<h5 class='text-center'>Read the Pages</h5>
					<p class='text-center'>Want to understand how to use this starter kit better? Read the pages for this starter kit! It will help you execute and figure your way out.</p>
					<a href='{{ url('/beta/kit/' . $kit->id . '/pages') }}' class='btn btn-primary full-width'>Access the Pages</a>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
	<script type='text/javascript'>

	</script>
@endsection