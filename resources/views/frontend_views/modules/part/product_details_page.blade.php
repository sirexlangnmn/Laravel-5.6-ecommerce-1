<div class="product-details"><!--product-details-->
	<div class="col-sm-5">
		<div class="view-product">
			<div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
				<a {{-- id="mainImgLarge" --}} href="{!! asset('backend_assets/images/products/large/'.$productDetails->prod_image ) !!}">
					<img style="width:350px" class="mainImage" src="{!! asset('backend_assets/images/products/large/'.$productDetails->prod_image ) !!}" alt="" />
				</a>
			</div>
		</div>
		<div id="similar-product" class="carousel slide" data-ride="carousel">
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<?php $count=1; ?>
				@foreach($productDetails['productImages']->chunk(3) as $chunk)
					<div <?php if($count==1) { ?> class="item active thumbnails" <?php } else { ?> class="item thumbnails" <?php } ?>>	
						@foreach($chunk as $productAltImage) 
							<a href="{!! asset('backend_assets/images/products/large/'.$productAltImage->prod_image) !!}" data-standard="{!! asset('backend_assets/images/products/large/'.$productAltImage->prod_image) !!}">

								<img class="changeImage" style="width: 90px; cursor: pointer;" src="{!! asset('backend_assets/images/products/small/'.$productAltImage->prod_image) !!}" alt="">
							</a>
						@endforeach
					</div>
				<?php $count++; ?>
				@endforeach
			</div>
			<!-- Controls -->
			  <a class="left item-control" href="#similar-product" data-slide="prev">
				<i class="fa fa-angle-left"></i>
			  </a>
			  <a class="right item-control" href="#similar-product" data-slide="next">
				<i class="fa fa-angle-right"></i>
			  </a>
		</div>
	</div>
	<div class="col-sm-7">
		<form name="addToCartForm" id="addToCartForm" action="{!! route('addToCart_route') !!}" method="post">{!! csrf_field() !!}
		
		<input type="hidden" name="product_id" value="{!! $productDetails->product_id !!}" />
		<input type="hidden" name="product_name" value="{!! $productDetails->prod_name !!}" />
		<input type="hidden" name="product_code" value="{!! $productDetails->prod_code !!}" />
		<input type="hidden" name="product_color" value="{!! $productDetails->prod_color !!}" />
		{{-- <input type="hiddedn" name="product_size" value="{!! $productDetails->attributes->size !!}"> --}}
		<input type="hidden" name="product_price" id="product_price" value="{!! $productDetails->prod_price !!}" />

		<div class="product-information"><!--/product-information-->
			<img src="{!! asset('backend_assets/images/products/thumbnail/'.$productDetails->prod_image ) !!}" class="newarrival" alt="" />
			<h2>{!! $productDetails->prod_name !!}</h2>
			<p>Product Code: {!! $productDetails->prod_code !!}</p>
			<p>
				{{-- main.js --}}
				<select id="selSize" name="size" style="width: 150px;">
					<option value="">Select Size</option>
					@foreach($productDetails->attributes as $sizes)
					<option value="{!! $productDetails->product_id !!}-{!! $sizes->size !!}">{!! $sizes->size !!}</option>
					@endforeach
				</select>
			</p>
			
			<span>
				<span id="getPrice"></span>
				<label>Quantity</label>
				<input type="text" name="product_quantity" value="1" />
			</span>
			@if($totalStock>0)
				<p><button type="submit" class="btn btn-fefault cart" id="cartButton">
					<i class="fa fa-shopping-cart"></i> Add to cart</button>
				</p>
			@endif
			<p>
			<img src="{!! asset('frontend_assets/images/product-details/rating.png') !!}" alt="" />
			</p>
			<p><b>Stock: </b> <p id="getQuantity"></p></p>
			<p><b>Availability:</b>
				<p id="Availability"> @if($totalStock>0) In Stock @else Out of Stock @endif</p>
			</p>
			<p><b>Condition: </b> <p> New </p></p>
			<a href=""><img src="{!! asset('frontend_assets/images/product-details/share.png') !!}" class="share img-responsive"  alt="" /></a>
		</div><!--/product-information-->
		</form>
	</div>
</div><!--/product-details-->

<div class="category-tab shop-details-tab"><!--category-tab-->
	<div class="col-sm-12">
		<ul class="nav nav-tabs">
			<li><a href="#description" data-toggle="tab">Description</a></li>
			<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
			<li><a href="#materialAndCare" data-toggle="tab">Material and Care</a></li>
			<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
		</ul>
	</div>
	<div class="tab-content">
		<div class="tab-pane fade" id="description" >
			<div class="col-sm-12">
				{!! $productDetails->prod_desc !!}
			</div>
		</div>
		
		<div class="tab-pane fade" id="companyprofile" >
			Company Profile
			{{-- <div class="col-sm-3">

			</div>
			<div class="col-sm-3">
				
			</div>
			<div class="col-sm-3">
				
			</div>
			<div class="col-sm-3">
				
			</div> --}}
		</div>
		
		<div class="tab-pane fade" id="materialAndCare" >
			<div class="col-sm-12">
				{!! $productDetails->material_and_care !!}
			</div>
		</div>
		
		<div class="tab-pane fade active in" id="reviews" >
			<div class="col-sm-12">
				<ul>
					<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
					<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
					<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
				</ul>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
				<p><b>Write Your Review</b></p>
				
				<form action="#">
					<span>
						<input type="text" placeholder="Your Name"/>
						<input type="email" placeholder="Email Address"/>
					</span>
					<textarea name="" ></textarea>
					<b>Rating: </b> <img src="{!! asset('frontend_assets/images/product-details/rating.png') !!}" alt="" />
					<button type="button" class="btn btn-default pull-right">
						Submit
					</button>
				</form>
			</div>
		</div>
		
	</div>
</div><!--/category-tab-->