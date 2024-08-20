<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin Panel - Health City</title>
        <link rel="shortcut icon" type="image/png" href="{{ asset('assets/web_images/favicon.ico')}}" />
        <link rel="icon" type="image/png" href="{{ asset('assets/web_images/favicon.ico')}}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/campus_common_style.css') }}">
		<meta http-equiv="Content-Security-Policy" content="frame-ancestors 'none'">
    </head>
<body>
	<!-- Container Wrap -->
	<div id="container-wrap">
		<div id="banner">
			<div class="container">
				<div class="logo">
					<a href="{{url('/')}}" title="Health City"><img src="{{ asset('assets/images/logo.png')}}?>" alt="logo"> </a>
				</div>
			</div>
		</div>
		<div id="login-content" class="colored">
			<div class="container">
				<div id="login">
					<h4>Login</h4>
					<div id="output"></div>
					<form class="form1" method="post" action="{{ route('admin') }}">
						@csrf
						<ul>
							<li>
								<label>User Name</label>
								<input type="email" class="form-control" name="email" id="username" placeholder="Ex. user@example.com" required autofocus>
							</li>
							<li>
								<label>Password</label>
								<input type="password" class="form-control" name="password" id="password" placeholder="********" autofocus required>
							</li>
							<li class="text-center">
								<button class="btn button1 login" name="login" value="Login" type="submit">Login</button>
							</li>
							@error('email')
							<div class="alert alert-danger">
								{{ $message }}
							</div>
    						@enderror
							@if(session('error'))
							<div class="alert alert-danger">
								{{ session('error') }}
							</div>
							@endif
						</ul>
					</form>
				</div>
			</div>
		</div>
	</div>	
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
	</body>

</html>
