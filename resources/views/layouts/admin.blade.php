<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Admin</title>

	<link rel="icon" href="{{asset('contents/admin')}}/assets/img/icon.ico" type="image/x-icon"/>

	<script src="{{asset('contents/admin')}}/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['../{{asset('contents/admin')}}/assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/azzara.min.css">
	<link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/demo.css">
	<link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/style.css">
	<script src="{{asset('contents/admin')}}/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="{{asset('contents/admin')}}/assets/js/sweetalert.min.js"></script>
</head>
<body>
	<div class="wrapper">
		<!--
			Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="purple">
			<!-- Logo Header -->
			<div class="logo-header">
				<a href="#" class="logo">AdminCast</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">

				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="{{asset('contents/admin')}}/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<li>
									<div class="user-box">
										<div class="avatar-lg"><img src="{{asset('contents/admin')}}/assets/img/profile.jpg" alt="image profile" class="avatar-img rounded"></div>
										<div class="u-text">
											<h4>Marfi</h4>
											<p class="text-muted">marfi412479@gmail.com</p>
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">My Profile</a>
									<a class="dropdown-item" href="#">Inbox</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">Account Setting</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">Logout</a>
								</li>
							</ul>
						</li>

					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar">

			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="{{asset('contents/admin')}}/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									 {{Auth::user()->name}}
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item active">
							<a href="{{url('admin')}}"><i class="fa fa-home"></i>	<p>Dashboard</p></a>
						</li>
						@if(Auth::user()->user_role_id==1)
						<li class="nav-item">
							<a href="{{url('admin/user')}}"><i class="fa fa-user"></i>	<p>User</p></a>
						</li>
						@endif
						@if(Auth::user()->user_role_id==1 || Auth::user()->user_role_id==2)
						<li class="nav-item">
							<a href="{{url('admin/banner')}}"><i class="fa fa-image"></i>	<p>Banner</p></a>
						</li>
						@endif
						<li class="nav-item">
							<a data-toggle="collapse" href="#base"><i class="fa fa-cogs"></i><p>Manage</p>
								<span class="caret"></span></a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
										<li>
											<a href="components/avatars.html">
												<span class="sub-item">Avatars</span>
											</a>
										</li>
										<li>
											<a href="components/buttons.html">
												<span class="sub-item">Buttons</span>
											</a>
										</li>
										<li>
											<a href="components/gridsystem.html">
												<span class="sub-item">Grid System</span>
											</a>
										</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a href="{{ route('logout') }}"
								 onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i><p>Logout</p>
							</a>
						</li>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
						</form>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Dashboard</h4>
						<div class="btn-group btn-group-page-header ml-auto">
							<button type="button" class="btn btn-light btn-round btn-page-header-dropdown dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-ellipsis-h"></i>
							</button>
							<div class="dropdown-menu">
								<div class="arrow"></div>
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<a class="dropdown-item" href="#">Something else here</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Separated link</a>
							</div>
						</div>
					</div>
		@yield('content')
	</div>
</div>
<!--   Core JS Files   -->
<script src="{{asset('contents/admin')}}/assets/js/core/popper.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/core/bootstrap.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/plugin/moment/moment.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/plugin/chart.js/chart.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/plugin/datatables/datatables.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/plugin/gmaps/gmaps.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/plugin/sweetalert/sweetalert.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/ready.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/setting-demo.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/demo.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/custom.js"></script>

</body>
</html>
