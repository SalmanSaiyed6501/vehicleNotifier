<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>SFHS - Vehicle Management</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="{{ asset('cms/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="{{ asset('cms/css/ready.css') }}">
	<link rel="stylesheet" href="{{ asset('cms/css/demo.css') }}">
	<link rel="icon" type="image/x-icon" href="{{asset('cms/img/schoolLogo.png')}}" >
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header bg-dark text-white">
				<img src="{{asset('cms/img/schoolLogo.png')}}" height="40">
				<b>SFHS ({{ session('session_name') }})</b>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg bg-dark">
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown text-white">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="{{asset('cms/img/admin.jpg')}}" alt="user-img" width="36" class="img-circle"><span class="text-white">{{ $user[0]->name }}</span></span> </a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<a class="dropdown-item" href="#"><i class="ti-settings"></i>My Account</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item text-danger" href="{{ route('vehicle.logout') }}"><i class="fa fa-power-off"></i> Logout</a>
								</ul>
								<!-- /.dropdown-user -->
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="sidebar">
				<div class="scrollbar-inner sidebar-wrapper">
					<ul class="nav">
						<li class="nav-item {{ request()->routeIs('vehicle.index') ? 'active' : '' }}">
							<a href="{{ route('vehicle.index') }}">
								<i class="la la-dashboard"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item {{ request()->routeIs('busStaffDetails.index') ? 'active' : '' }}"">
							<a href="{{ route('busStaffDetails.index') }}">
								<i class="la la-th-list"></i>
								<p>Bus Staff Details</p>
							</a>
						</li>
						<li class="nav-item {{ request()->routeIs('documents.index') ? 'active' : '' }}"">
							<a href="{{ route('documents.index') }}">
								<i class="la la-files-o"></i>
								<p>Documents</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="main-panel">
				<div class="content">
					<div class="container-fluid">
						<h4 class="page-title">@stack('pageTitle')</h4>
						@yield('mainSection')
					</div>
				</div>
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<div class="copyright mx-auto my-3">
						 
						&copy; <span id="year"></span>, made with <i class="la la-heart heart text-danger"></i> by <a href="https://www.sfhsvapi.in/" target="_blank">&copy;St. Francis' High School , Vapi</a>
					</div>				
				</div>
			</footer>
		</div>
</body>
<script src="{{ asset('cms/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('cms/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('cms/js/core/popper.min.js') }}"></script>
<script src="{{ asset('cms/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('cms/js/plugin/chartist/chartist.min.js') }}"></script>
<script src="{{ asset('cms/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js') }}"></script>
<script src="{{ asset('cms/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('cms/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
<script src="{{ asset('cms/js/plugin/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('cms/js/plugin/jquery-mapael/maps/world_countries.min.js') }}"></script>
<script src="{{ asset('cms/js/plugin/chart-circle/circles.min.js') }}"></script>
<script src="{{ asset('cms/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('cms/js/ready.min.js') }}"></script>
<script src="{{ asset('cms/js/demo.js') }}"></script>
<script>
	document.getElementById("year").textContent = new Date().getFullYear();
</script>
@if(session('alert'))
<script>
	$(document).ready(function () {
		var content = {};
		content.message = "{{ session('alert') }}";
		content.title = "Success Noticed !!";
		content.icon = 'la la-check-circle';

		$.notify(content, {
			type: "success",
			placement: {
				from: "top",
				align: "right"
			},
			time: 1000
		});
	});
</script>
@endif
</html>