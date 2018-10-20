@extends('frontend_views.layouts.front_design')
@section('content')

	<section>
		<div class="container">
			<div class="row">
				
				@include('frontend_views/modules/part/sidebar')

				<div class="col-sm-9 padding-right">
					<!----------------------------------->
					<!-- All items-->
					<!----------------------------------->
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">{!! $categoryDetails->category !!}</h2>
						@foreach($productsAll as $product)
						@if($product->status == 1)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="{{ asset('backend_assets/images/products/medium/'.$product->prod_image) }}" alt="" />
										<h2>{!! $product->prod_price !!}</h2>
										<p>{!! $product->prod_name !!}</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>{!! $product->prod_price !!}</h2>
											<p>{!! $product->prod_name !!}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
									<img src="{!! asset('frontend_assets/images/home/sale.png') !!}" class="new" alt="" />
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="{{ route('product_details_route', $product->product_id) }}"><i class="fa fa-plus-square"></i>Details</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endif
						@endforeach
					</div><!--features_items-->
					<!----------------------------------->
					<!-- /. All items-->
					<!----------------------------------->
				
					
					<ul class="pagination">
						<li class="active"><a href="">1</a></li>
						<li><a href="">2</a></li>
						<li><a href="">3</a></li>
						<li><a href="">&raquo;</a></li>
					</ul>	
				</div>
			</div>
		</div>
	</section>

@endsection