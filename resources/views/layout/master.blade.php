<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title') GymWeb / GymTai</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/icheck/flat/green.css') }}">
	{{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/icheck/flat/floatexamples.css') }}"> --}}
    @yield('css')
</head>
<body  class="nav-md">
	<div class="container body">
		<div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{ url('home') }}" class="site_title"><i class="fa fa-cog"></i> <span>Gim. GymTai</span></a>
                    </div>
                    <div class="clearfix"></div>
                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                        	<span class="fa-stack fa-2x">
									<i class="fa fa-circle fa-stack-2x fa-inverse"></i>
									<i class="fa fa-user fa-stack-1x "></i>
							</span>
                        </div>
                        <div class="profile_info">
                            <span>Bienvenido,</span>
                            <h2>{{ Auth::user()->username }}</h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->
                    <br />
                    <br />
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <ul class="nav side-menu">
                            @include('partial.nav')
                        </ul>
                    </div>
                    <!-- /sidebar menu -->
                </div>
            </div>
            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <span><i class="fa fa-user"></i> </span>{{Auth::user()->username}}
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out pull-right"></i> Salir</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->
            <!-- page content -->
            <div class="right_col" role="main">
            	<div class="page-title">
            		<div class="title_left">
            			@yield('title-page')
            		</div>
          		</div>
          		<div class="clearfix"></div>
				@yield('content-page')
            </div>
            	
            </div>
        </div>
	</div>
	<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
    @yield('js')
	<script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>
</body>
</html>