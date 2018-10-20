<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ecommerce Laravel 5.6 | Home | E-Shopper</title>
    <link href="{{ asset('frontend_assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend_assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend_assets/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend_assets/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend_assets/css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend_assets/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend_assets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend_assets/css/easyzoom.css') }}" rel="stylesheet">
        <!--[if lt IE 9]>
    <script src="{{ asset('frontend_assets/js/html5shiv.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/respond.min.js') }}"></script>
    <![endif]-->       
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend_assets/images/logo/logo_circle.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('frontend_assets/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('frontend_assets/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('frontend_assets/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('frontend_assets/images/ico/apple-touch-icon-57-precomposed.png') }}">
</head><!--/head-->

<body>

	@include('frontend_views.layouts.header_page')
	
	@yield('content')
	
	@include('frontend_views.layouts.footer_page')
	

  
    <script src="{{ asset('frontend_assets/js/jquery.js') }}"></script>
	<script src="{{ asset('frontend_assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('frontend_assets/js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{ asset('frontend_assets/js/price-range.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/easyzoom.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/main.js') }}"></script>
    <script src="{{ asset('backend_assets/js/jquery.validate.js') }}"></script> 
</body>
</html>