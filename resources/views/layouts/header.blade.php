<div class="site-mobile-menu site-navbar-target">
	<div class="site-mobile-menu-header">
		<div class="site-mobile-menu-close mt-3">
			<span class="icon-close2 js-menu-toggle"></span>
		</div>
	</div>
	<div class="site-mobile-menu-body"></div>
</div>

<header class="site-navbar site-navbar-target" role="banner">
	<div class="container">
		<div class="row align-items-center position-relative">
			<div class="col-9">
				<div class="site-logo">
					<a href="{{ url('/') }}" class="font-weight-bold">Quick Launch Kits</a>
				</div>
			</div>


			<div class="col-3 text-right">

				<span class="d-inline-block d-lg-block"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>
				<nav class="site-navigation text-right ml-auto d-none d-lg-none" role="navigation">
					@if(Auth::guest())
					<ul class="site-menu main-menu js-clone-nav ml-auto ">
						<li <?php if (request()->path() == '/') { echo 'class="active"'; } ?>><a href="/" class="nav-link">Home</a></li>
						<li <?php if (request()->path() == 'beta/login') { echo 'class="active"'; } ?>><a href="/beta/login" class="nav-link">Login</a></li>
						<li <?php if (request()->path() == 'beta') { echo 'class="active"'; } ?>><a href="/beta" class="nav-link">Register</a></li>
					</ul>
					@elseif(!Auth::guest() && \App\Custom\AdminHelper::isLoggedIn() == false)
					<ul class="site-menu main-menu js-clone-nav ml-auto ">
						<li <?php if (request()->path() == 'beta/dashboard') { echo 'class="active"'; } ?>><a href="/beta/dashboard" class="nav-link">Dashboard</a></li>
						<li <?php if (request()->path() == 'beta/kits') { echo 'class="active"'; } ?>><a href="/beta/kits" class="nav-link">Starter Kits</a></li>
						<li <?php if (request()->path() == 'beta/logout') { echo 'class="active"'; } ?>><a href="/beta/logout" class="nav-link">Logout</a></li>
					</ul>
					@elseif(!Auth::guest() && \App\Custom\AdminHelper::isLoggedIn() == true)
					<ul class="site-menu main-menu js-clone-nav ml-auto ">
						<li <?php if (request()->path() == 'admin/dashboard') { echo 'class="active"'; } ?>><a href="/admin/dashboard" class="nav-link">Dashboard</a></li>
						<li <?php if (request()->path() == 'admin/kits') { echo 'class="active"'; } ?>><a href="/admin/kits" class="nav-link">Starter Kits</a></li>
						<li <?php if (request()->path() == 'admin/logout') { echo 'class="active"'; } ?>><a href="/admin/logout" class="nav-link">Logout</a></li>
					</ul>
					@endif
				</nav>
			</div>
		</div>
	</div>
</header>
