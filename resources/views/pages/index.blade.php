@extends('layouts.app')

@section('content')
	@include('layouts.main-banner')

	<div class='site-section'>
		<div class='container'>
			<div class='row justify-content-center'>
				<div class='col-12'>
					<h3 class='text-center'>Start Taking Action Right Away</h3>
					<p class='text-center font-gray-5'>Don't waste a second. Start getting results from the moment you signup.</p>
				</div>
			</div>

			<div class='row mt-64 justify-content-center'>
				<div class='col-lg-4 col-md-4 col-sm-12 col-12'>
					<img src='https://image.flaticon.com/icons/svg/1006/1006536.svg' class='regular-image-40 mb-32 centered'>
					<h5 class='text-center mt-16 light-font'>Clear Your Mental Roadblocks</h5>
					<p class='text-center font-gray-9'>Using the step-by-step guides that go along with each kit, you'll be able to declutter your mindset and gain clarity of thought.</p>
				</div>

				<div class='col-lg-4 col-md-4 col-sm-12 col-12'>
					<img src='https://image.flaticon.com/icons/svg/148/148773.svg' class='regular-image-40 mb-32 centered'>
					<h5 class='text-center mt-16 light-font'>Focus on What Matters</h5>
					<p class='text-center font-gray-9'>Blindly working hard is no good. You're only going to burnout. Instead, we'll help guide you to focus on what will get you results.</p>
				</div>

				<div class='col-lg-4 col-md-4 col-sm-12 col-12'>
					<img src='https://image.flaticon.com/icons/svg/265/265733.svg' class='regular-image-40 mb-32 centered'>
					<h5 class='text-center mt-16 light-font'>Gain Valuable Experience</h5>
					<p class='text-center font-gray-9'>As a byproduct of taking action, you will gain experience and data. This will only help you make your next move even smarter.</p>
				</div>
			</div>

			<div class="row mt-32">
				<div class="col-12">
					<a href="{{ url('/beta') }}" class="btn btn-primary centered">Access Beta Program</a>
				</div>
			</div>
		</div>
	</div>

	<div class='site-section bg-light'>
		<div class='container'>
			<div class='row'>
				<div class='col-12'>
					<h3 class='text-center'>Frequently Asked Questions</h3>

					<div class="accordion mt-32" id="faq">
						<div class="card">
							<div class="card-header">
								<h2 class="mb-0">
									<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" aria-controls="collapse_1">When will I get my invite code?</button>
      							</h2>
    						</div>

    						<div id="collapse_1" class="collapse show" data-parent="#faq">
      							<div class="card-body">
   									You will get your beta invite code anywhere from a few minutes to a couple of days. There are a limited number of spots available due to quality purposes. However, we guarantee you won't have to wait more than 3 days for your invite code.
      							</div>
    						</div>
  						</div>

  						<div class="card">
    						<div class="card-header">
    							<h2 class="mb-0">
									<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse_2" aria-expanded="false" aria-controls="collapse_2">
										What's in each starter kit?
        							</button>
      							</h2>
    						</div>

    						<div id="collapse_2" class="collapse" data-parent="#faq">
      							<div class="card-body">
      								At the minimum, you will be given a roadmap. A roadmap gives you an overview of where you are in the process of that given starter kit. Depending on the starter kit, you will get extra documents that will aid you in moving through the starter kit. You may also be given Excel sheets that will help you keep track of data and help assist you in making decisions.
      							</div>
    						</div>
  						</div>

						<div class="card">
							<div class="card-header">
								<h2 class="mb-0">
									<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse_3" aria-expanded="false" aria-controls="collapse_3">
										Aren't these starter kits just "cookie cutter" steps?
									</button>
      							</h2>
							</div>

							<div id="collapse_3" class="collapse" data-parent="#faq">
								<div class="card-body">
									No, these starter kits are extremely flexible. Think of the starter kits as diagnostics tools. They help you identify what needs to be done next, not tell you what to do next. For example, imagine you've created a landing page for your business. You've collected some data about the performance of the page. From here, the starter kit does not tell you what to do, instead, it will ask you to analyze the data and pick an option. Each starter kit is not the same.
								</div>
							</div>
						</div>

						<div class="card">
							<div class="card-header">
								<h2 class="mb-0">
									<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_4" aria-expanded="false" aria-controls="collapse_4">When will I see results?</button>
      							</h2>
    						</div>

    						<div id="collapse_4" class="collapse" data-parent="#faq">
      							<div class="card-body">
   									It depends on how much work you put in. The starter kits only work if you work. You can think of the starter kits as the GPS, it helps guide you to where you need to go. However, without a car, a GPS is pretty useless. Your hard work is that metaphorical car. So if you've felt like you've worked hard in the past but haven't seen results, it's most likely because your GPS was broken. If you struggle at working hard, start to build up your work ethic and tolerance. Your business is going to need your fullest.
      							</div>
    						</div>
  						</div>
					</div>

					<a href="{{ url('/beta') }}" class="btn btn-primary centered mt-32">Access Beta Program</a>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
	<script type='text/javascript'>
		
	</script>
@endsection