<?php
	use App\Http\Controllers\Controller;
	$mainCategories = Controller::mainCategories();
	/*  
	$mainCategories = json_decode(json_encode($mainCategories));
    echo "<pre>"; print_r($mainCategories); die; 
    */
?>


<header id="header"><!--header-->
	<div class="header_top"><!--header_top-->
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="contactinfo">
						<ul class="nav nav-pills">
							<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
							<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="social-icons pull-right">
						<ul class="nav navbar-nav">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div><!--/header_top-->
	
	<div class="header-middle"><!--header-middle-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="logo pull-left">
						{{-- <a href="index.html"><img src="{{ asset('frontend_assets/images/home/logo.png') }}" alt="" /></a> --}}
						<a href="index.html"><img src="{{ asset('backend_assets/images/logo/logo_long.png') }}" alt="Company Logo" style="width: 240px; height: 40px;" /></a>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="shop-menu pull-right">
						<ul class="nav navbar-nav">
							<li><a href="#"><i class="fa fa-user"></i> Account</a></li>
							<li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
							<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
							<li><a href="{!! route('cart_route') !!}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
							<li><a href="login.html"><i class="fa fa-lock"></i> Login</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div><!--/header-middle-->

	<div class="header-bottom"><!--header-bottom-->
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="mainmenu pull-left">
						<ul class="nav navbar-nav collapse navbar-collapse">
							@if( Route::currentRouteName() == 'index' )
							<li><a href="{{ route('index') }}" class="active">
							@else
							<li><a href="{{ route('index') }}">
							@endif
								Home</a></li>

							@if( Route::currentRouteName() == 'allProducts_route' )	
							<li class="dropdown"><a href="#" class="active">
							@else
							<li class="dropdown"><a href="#">
							@endif
								Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                	<li><a href="{!! route('allProducts_route') !!}"> All Items</a></li>
                                	@foreach($mainCategories as $cat)
                                	@if($cat->status == 1)
                                    <li><a href="{!! route('product_listing_route', $cat->url) !!}">{!! $cat->category !!}</a></li>
                                    @endif
                                    @endforeach
                                </ul>
                            </li> 
							{{-- 
							<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="blog.html">Blog List</a></li>
									<li><a href="blog-single.html">Blog Single</a></li>
                                </ul>
                            </li>  
                            --}}
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Services</a></li>

                            @if( Route::currentRouteName() == 'contactUs_route' )
							<li><a href="{!! route('contactUs_route') !!}" class="active">
							@else
							<li><a href="{!! route('contactUs_route') !!}">
							@endif
								Contact</a></li>

							@if( Route::currentRouteName() == 'login_register_route' )
							<li><a href="{!! route('login_register_route') !!}" class="active">
							@else
							<li><a href="{!! route('login_register_route') !!}">
							@endif
								Login</a></li>	
						</ul>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="search_box pull-right">
						<input type="text" placeholder="Search"/>
					</div>
				</div>
			</div>
		</div>
	</div><!--/header-bottom-->
</header><!--/header-->