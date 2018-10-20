<div class="recommended_items"><!--recommended_items-->
	<h2 class="title text-center">recommended items</h2>
	
	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<?php $count=1; ?>
			@foreach($relatedProducts->chunk(3) as $chunk)
			<div <?php if($count==1) { ?> class="item active" <?php } else { ?> class="item" <?php } ?>>
				
				@foreach($chunk as $item)	
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img style="width: 230px;" src="{!! asset('backend_assets/images/products/large/'.$item->prod_image ) !!}" alt="" />
								<h2>₱ {!! $item->prod_price !!}</h2>
								<p>{!! $item->prod_name !!}</p>
								<a type="button" href="{{ route('product_details_route', $item->product_id) }}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>More Details</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach

			</div>
			<?php $count++; ?>
			@endforeach
		</div>
		 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		  </a>
		  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
			<i class="fa fa-angle-right"></i>
		  </a>			
	</div>
</div><!--/recommended_items-->