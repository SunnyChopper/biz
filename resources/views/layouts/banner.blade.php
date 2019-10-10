<div class="ftco-blocks-cover-1">
	<div class="site-section-cover inner overlay" style="background-image: url('https://flat-icons.com/preview')">
		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-md-7 text-center">
					@if(isset($page_header))
					<h1 class="mb-4 text-white">{{ $page_header }}</h1>
					@elseif(isset($page_title))
					<h1 class="mb-4 text-white">{{ $page_title }}</h1>
					@else
					<h1 class="mb-4 text-white">{{ config('app.name') }}</h1>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>