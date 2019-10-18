@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class='container pt-64 pb-64'>
		<div class='row justify-content-center'>
			<div class='col-lg-7 col-md-8 col-sm-12 col-12'>
				<form action='{{ url('/beta/register') }}' method='POST'>
					{{ csrf_field() }}
					<div class='card'>
						<div class='card-body'>
							<h4>Register for Beta Account</h4>
							<p class="mb-4">Fields with <span class="red">*</span> are required.</p>
							<div class='form-group row'>
								<div class='col-lg-6 col-md-6 col-sm-12 col-12'>
									<label>First Name: <span class='red'>*</span></label>
									<input type='text' name='first_name' value='{{ old('first_name') }}' class='form-control' required>
								</div>

								<div class='col-lg-6 col-md-6 col-sm-12 col-12 mt-32-mobile'>
									<label>Last Name:</label>
									<input type='text' name='last_name' value='{{ old('last_name') }}' class='form-control'>
								</div>
							</div>

							<div class='form-group row mt-32'>
								<div class='col-12'>
									<label>Email: <span class='red'>*</span></label>
									<input type='email' id='register_email' name='email' class='form-control' value='{{ old('email') }}' required>
									<p id='email_error' class='red' style='display: none;'><small>Email already taken.</small></p>
								</div>
							</div>

							<div class='form-group row mt-32'>
								<div class='col-12'>
									<label>Username: <span class='red'>*</span></label>
									<input type='text' name='username' id='register_username' value='{{ old('username') }}' class='form-control' required>
									<p id='username_error' class='red' style='display: none;'><small>Username already taken.</small></p>
								</div>
							</div>

							<div class='form-group row mt-32'>
								<div class='col-12'>
									<label>Password: <span class='red'>*</span></label>
									<input type='password' name='password' class='form-control' required>
								</div>
							</div>

							<div class='form-group row mt-32'>
								<div class='col-12'>
									<label>Beta Invite Code: <span class='red'>*</span></label>
									<input type='text' name='code' class='form-control' required>
								</div>
							</div>

							@if(session()->has('error'))
							<p class='text-center mb-1 mt-2 red'>{{ session()->get('error') }}</p>
							@endif

							<div class='form-group row mt-32'>
								<div class='col-12'>
									<input type='submit' id='register_button' class='btn btn-primary centered' value='Signup'>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>

			<div class='col-lg-5 col-md-4 col-sm-12 col-12 mt-32-mobile'>
				<div style='background: hsl(0, 0%, 95%); padding: 24px;'>
					<h5 class='text-center'>Don't Have an Invite Code?</h5>
					<p class='text-center'>Enter in your email below and we'll send you an invite code. Limited spots available for quality purposes.</p>


					<div class='form-group row'>
						<div class='col-12'>
							<label class='mb-0'>Email:</label>
							<input type='email' id="invite_email" class='form-control' style='padding: 8px; height: 40px;'>
						</div>
					</div>

					<p id='submit_feedback' class='text-center' style='display: none;'></p>

					<div class='form-group row'>
						<div class='col-12'>
							<button type='button' class='btn btn-success centered submit_email'>Get Invite Code</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
	<script type='text/javascript'>
		var _token = '{{ csrf_token() }}';

		$('.submit_email').on('click', function() {
			$.ajax({
				url : '/api/email/submit',
				type : 'POST',
				data : {
					'_token' : _token,
					'email' : $('#invite_email').val()
				},
				success : function(data) {
					if (data == true) {
						$('#submit_feedback').removeClass('red');
						$('#submit_feedback').addClass('green');
						$('#submit_feedback').html('Email successfully submitted.');
						$('#submit_feedback').show();

						$('#invite_email').val('');
						$('#invite_email').css('border', '1px solid green');
					} else {
						$('#submit_feedback').removeClass('green');
						$('#submit_feedback').addClass('red');
						$('#submit_feedback').html('Email has already been submitted.');
						$('#submit_feedback').show();

						$('#invite_email').val('');
						$('#invite_email').css('border', '1px solid red');
					}
				}
			});
		});

		$('#register_email').on('change', function() {
			$.ajax({
				url : '/api/users/email/check',
				type : 'GET',
				data : {
					'email' : $('#register_email').val()
				},
				success : function(data) {
					if (data == false) {
						$('#register_button').prop('disabled', true);
						$('#register_button').removeClass('btn-primary');
						$('#register_button').addClass('btn-disabled');

						$('#register_email').css('border', '1px solid red');

						$('#email_error').show();
					} else {
						$('#register_button').prop('disabled', false);
						$('#register_button').removeClass('btn-disabled');
						$('#register_button').addClass('btn-primary');

						$('#register_email').css('border', '1px solid green');

						$('#email_error').hide();
					}
				}
			});
		});

		$('#register_username').on('change', function() {
			$.ajax({
				url : '/api/users/username/check',
				type : 'GET',
				data : {
					'username' : $('#register_username').val()
				},
				success : function(data) {
					if (data == false) {
						$('#register_button').prop('disabled', true);
						$('#register_button').removeClass('btn-primary');
						$('#register_button').addClass('btn-disabled');

						$('#register_username').css('border', '1px solid red');

						$('#username_error').show();
					} else {
						$('#register_button').prop('disabled', false);
						$('#register_button').removeClass('btn-disabled');
						$('#register_button').addClass('btn-primary');

						$('#register_username').css('border', '1px solid green');

						$('#username_error').hide();
					}
				}
			});
		});
	</script>
@endsection