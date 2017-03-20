<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> @yield('title') GymWeb / GymTai</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/icheck/flat/green.css') }}">
	@yield('css')
</head>
<body style="background:#F7F7F7;">
	<div class="background">
		@yield('content')
	</div>
		<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/bg_switcher/jquery.bgswitcher.js') }}" type="text/javascript"></script>
		@yield('js')
</body>
</html>