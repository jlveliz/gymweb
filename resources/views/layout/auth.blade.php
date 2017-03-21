<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" href="{{asset('img/favicon.ico')}}">
	<title> @yield('title') | GymTai</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/icheck/flat/green.css') }}">
	@yield('css')
</head>
<body>
	<div class="login_background">
		<p>&nbsp;</p>
		@yield('content')
		<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/bg_switcher/jquery.bgswitcher.js') }}" type="text/javascript"></script>
		<script type="text/javascript">
		  $(document).ready(function() {
		    $(".login_background").bgswitcher({
		      images: ["{{ asset('img/login_1.jpg')}}","{{asset('img/login_2.jpg')}}","{{asset('img/login_3.jpg')}}","{{ asset('img/login_4.jpg')}}" ],
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