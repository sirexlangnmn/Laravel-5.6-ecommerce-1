@extends('frontend_views.layouts.front_design')
@section('content')

	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							@foreach($banners as $key => $banner)
							<li data-target="#slider-carousel" data-slide-to="0" @if($key==0) class="active" @endif ></li>
							@endforeach
							{{-- 
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
							 --}}
						</ol>
						
						<div class="carousel-inner">
							@foreach($banners as $key => $banner)
							<div class="item @if($key==0) active @endif">
								<div class="col-sm-6">
									<h1><span>{!! $banner->banner_title !!}</span></h1>
									<h2>{!! $banner->banner_tagline !!}</h2>
									<p>{!! $banner->banner_description !!}</p>
									<a type="button" href="{!! $banner->banner_link !!}" class="btn btn-default get">Get it now</a>
								</div>
								<div class="col-sm-6">
									<img src="{!! asset('backend_assets/images/banners/large/'.$banner->banner_image) !!}" class="girl img-responsive" alt="" />
									{{--
									 <img src="{{ asset('frontend_assets/images/home/pricing.png.jpg') }}"  class="pricing" alt="Pricing Tags Image" /> 
									 --}}

								</div>
							</div>
							@endforeach

							{{--
							 <div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>100% Responsive Design</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{ asset('frontend_assets/images/home/girl2.jpg') }}" class="girl img-responsive" alt="" />
									<img src="{{ asset('frontend_assets/images/home/pricing.png') }}"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>R</span>-Federex</h1>
									<h2>Fghghghjgjgj</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tdadadadsdsadasdadadadadasadasdadadas dasdas dasdas dasdas </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{ asset('frontend_assets/images/home/girl3.jpg') }}" class="girl img-responsive" alt="" />
									<img src="{{ asset('frontend_assets/images/home/pricing.png') }}" class="pricing" alt="" />
								</div>
							</div> 
							--}}
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->

@endsection