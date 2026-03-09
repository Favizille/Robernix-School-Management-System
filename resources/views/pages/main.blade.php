<!DOCTYPE html>
<html lang="en">
    {{-- TODO : Change Images, Route links --}}
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Robernix - Schoool Management System</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>

		<!-- Header -->
		<header id="header" class="transparent-nav">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a class="logo" href="index.html">
							<h3 style="color: #fff">RobernixSMS</h3>
						</a>
					</div>
					<!-- /Logo -->

					<!-- Mobile toggle -->
					<button class="navbar-toggle">
						<span></span>
					</button>
					<!-- /Mobile toggle -->
				</div>

				<!-- Navigation -->
				<nav id="nav">
					<ul class="main-menu nav navbar-nav navbar-right">
						<li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ request()->is('/') ? '#home' : url('/home') }}">Home</a></li>
						<li><a href="#about">About</a></li>
						<li><a href="#courses">Courses</a></li>
						<li class="{{ request()->is('contact') ? 'active' : '' }}"><a href="{{route('contact')}}">Contact</a></li>
						<li class="{{ request()->is('login') ? 'active' : '' }}"><a href="{{route('login')}}">login</a></li>
					</ul>
				</nav>
				<!-- /Navigation -->

			</div>
		</header>
		<!-- /Header -->

        @yield('content')
    
		<!-- Footer -->
		<footer id="footer" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<!-- footer logo -->
					<div class="col-md-6">
						<div class="footer-logo">
							<a class="logo" href="index.html">
								<h3 style="color: #fff">RobernixSMS</h3>
							</a>
						</div>
					</div>
					<!-- footer logo -->

					<!-- footer nav -->
					<div class="col-md-6">
						<ul class="footer-nav">
							<li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ request()->is('/') ? '#home' : url('/home') }}">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#courses">Courses</a></li>
                            <li class="{{ request()->is('contact') ? 'active' : '' }}"><a href="{{route('contact')}}">Contact</a></li>
                            <li class="{{ request()->is('login') ? 'active' : '' }}"><a href="{{route('login')}}">login</a></li>
						</ul>
					</div>
					<!-- /footer nav -->

				</div>
				<!-- /row -->

				<!-- row -->
				<div id="bottom-footer" class="row">

					<!-- social -->
					<div class="col-md-4 col-md-push-8">
						<ul class="footer-social">
							<li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
							<li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
						</ul>
					</div>
					<!-- /social -->

					<!-- copyright -->
					<div class="col-md-8 col-md-pull-4">
						<div class="footer-copyright">
							<span>Made by Robernix Enterprise </span>
						</div>
					</div>
					<!-- /copyright -->

				</div>
				<!-- row -->

			</div>
			<!-- /container -->

		</footer>
		<!-- /Footer -->

		<!-- preloader -->
		<div id='preloader'><div class='preloader'></div></div>
		<!-- /preloader -->


		<!-- jQuery Plugins -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/main.js"></script>

		<script type="text/javascript">
			$(document).ready(function() {
				// This logic will only run on the homepage where the sections exist.
				if ($('#home').length && $('#about').length && $('#courses').length) {
					var navLinks = $('#nav .main-menu li');
					var sections = $('#home, #about, #courses');
					var header = $('#header');
		
					var setActive = function() {
						var headerHeight = header.outerHeight();
						var scrollPos = $(window).scrollTop();
		
						sections.each(function() {
							// A 50px offset to make the link active a little before the section top
							var top = $(this).offset().top - headerHeight - 50;
							var bottom = top + $(this).outerHeight();
		
							if (scrollPos >= top && scrollPos <= bottom) {
								navLinks.removeClass('active');
								$('#nav .main-menu').find('a[href$="#' + $(this).attr('id') + '"]').parent('li').addClass('active');
							}
						});

						// A special case for the top of the page to keep 'Home' active
						if (scrollPos < $('#about').offset().top - headerHeight - 50) {
							navLinks.removeClass('active');
							$('#nav .main-menu').find('a[href$="#home"]').parent('li').addClass('active');
						}
					};
		
					$(window).on('scroll', setActive);
					setActive();
				}
			});
		</script>

	</body>
</html>
