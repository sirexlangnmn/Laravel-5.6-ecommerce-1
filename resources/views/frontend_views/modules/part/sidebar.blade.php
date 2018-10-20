<div class="col-sm-3">
	<div class="left-sidebar">
		<h2>Category</h2>
		<div class="panel-group category-products" id="accordian">

			{{-- this code is for basic approach. 
					Full codes is in IndexController --}}
				 
			<div class="panel panel-default">
				@foreach($categories as $cat)
				@if($cat->status == 1)
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordian" href="#{!! $cat->category_id !!}">
							<span class="badge pull-right"><i class="fa fa-plus"></i></span>
							{!! $cat->category !!}
						</a>
					</h4>
				</div>
				<div id="{!! $cat->category_id !!}" class="panel-collapse collapse">
					<div class="panel-body">
						<ul>
							@foreach($cat->categories as $subcat)
							@if($subcat->status == 1)
							<li><a href="{!! route('product_listing_route', $subcat->url) !!}">{!! $subcat->category !!}</a></li>
							@endif
							@endforeach
						</ul>
					</div>
				</div>
				@endif
				@endforeach
			</div>
		</div><!--/category-products-->
	
		<div class="brands_products"><!--brands_products-->
			<h2>Brands</h2>
			<div class="brands-name">
				<ul class="nav nav-pills nav-stacked">
					<li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
					<li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
					<li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
					<li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
					<li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
					<li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
					<li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
				</ul>
			</div>
		</div><!--/brands_products-->

		
		{{-- <div class="shipping text-center"><!--shipping-->
			<img src="{{ asset('frontend_assets/images/home/shipping.jpg') }}" alt="" />
		</div><!--/shipping--> --}}
	
	</div>
</div>