<footer class="site-footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<h2 class="footer-heading mb-3">Our Mission</h2>
				<p>The value of taking action towards building a business and gaining experience is only increasing. Our mission is to help guide you with well thought out guides and systems to help you start taking action.</p>
			</div>
			<div class="col-lg-8 ml-auto">
				<div class="row">
					<div class="col-lg-6 ml-auto">
						<h2 class="footer-heading mb-4">Quick Links</h2>
						<ul class="list-unstyled">
							@if(Auth::guest())
							<li><a href="{{ url('/') }}">Home</a></li>
							<li><a href="{{ url('/beta') }}">Register</a></li>
							<li><a href="{{ url('/login') }}">Login</a></li>
							@else
							<li><a href="{{ url('/beta/dashboard') }}">Dashboard</a></li>
							<li><a href="{{ url('/beta/kits') }}">Starter Kits</a></li>
							<li><a href="{{ url('/beta/logout') }}">Logout</a></li>
							@endif
						</ul>
					</div>
					<div class="col-lg-6">
						{{-- <h2 class="footer-heading mb-4">Connect</h2>
						<div class="social_29128 white mb-5">
							<a href="#"><span class="icon-facebook"></span></a>  
							<a href="#"><span class="icon-instagram"></span></a>  
							<a href="#"><span class="icon-twitter"></span></a>  
						</div>
						<h2 class="footer-heading mb-4">Newsletter</h2>
						<form action="#" class="d-flex" class="subscribe">
							<input type="text" class="form-control mr-3" placeholder="Email">
							<input type="submit" value="Send" class="btn btn-primary">
						</form> --}}
					</div>

				</div>
			</div>
		</div>
		<div class="row pt-5 mt-5 text-center">
			<div class="col-md-12">
				<div class="border-top pt-5">
					<p>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p>
				</div>
			</div>

		</div>
	</div>
</footer>