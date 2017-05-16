<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" href="{{asset('public/img/favicon.ico')}}">
	<title> @yield('title') | GymTai</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/fonts/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/animate.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/login.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/icheck/flat/green.css') }}">
	@yield('css')
</head>
<body>
	<div class="login_background">
		<p>&nbsp;</p>
		@yield('content')
		<script src="{{ asset('public/js/jquery.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/js/bootstrap.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/js/bg_switcher/jquery.bgswitcher.js') }}" type="text/javascript"></script>
		<script type="text/javascript">
		  $(document).ready(function() {
		    $(".login_background").bgswitcher({
		      images: ["{{ asset('public/img/login_1.jpg')}}","{{asset('public/img/login_2.jpg')}}","{{asset('public/img/login_3.jpg')}}","{{ asset('public/img/login_4.jpg')}}" ],
		      loop:true,
		      effect: "fade", 
		      interval: 8000, 
		      shuffle: false, 
		      duration: 8000, 
		      easing: "swing"    
		    });
		  });
		</script>
		@yield('js')
	</div>
</body>
</html>