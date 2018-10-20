@extends('frontend_views.layouts.front_design')
@section('content')

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Shopping Cart</li>
			</ol>
		</div>
		
		@if(Session::has('flash_message_error'))
            <div class="alert alert-danger alert-block" style="background-color: #f2dfd0">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif   
        
        @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{!! session('flash_message_success') !!}</strong>
        </div>
        @endif

		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="price">Cart ID</td>
						<td class="price">Prod ID</td>
						<td class="price">Cat ID</td>
						<td class="price">Atrrib ID</td>
						<td class="image">Item</td>
						<td class="description">Product</td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td class="total">Total</td>
						<td class="price">Action</td>
					</tr>
				</thead>
				<tbody>
					<?php $totalAmount=0; ?>
					@foreach($userCart as $cart)
					<tr>
						<td class="cart_price"><p>{!! $cart->cart_id !!}</p></td>
						<td class="cart_price"><p>{!! $cart->product_id !!}</p></td>
						<td class="cart_price"><p>{!! $cart->category_id !!}</p></td>
						<td class="cart_price"><p>{!! $cart->prod_attrib_id !!}</p></td>
						<td class="cart_product">
							<a href=""><img src="{{ asset('backend_assets/images/products/thumbnail/'.$cart->image) }}" alt=""></a>
						</td>
						<td class="cart_description">
							<h4><a href="">{!! $cart->prod_name !!}</a></h4>
							<p>Code: {!! $cart->prod_code !!} | {!! $cart->sku !!} | {!! $cart->size !!} | {!! $cart->prod_color !!}</p>
						</td>
						<td class="cart_price">
							<p>₱ {!! $cart->price !!}</p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<a class="cart_quantity_up" href="{!! url('/cart/update-product-quantity/'.$cart->cart_id.'/1') !!}"> + </a>
								<input class="cart_quantity_input" type="text" name="quantity" value="{!! $cart->product_quantity !!}" autocomplete="off" size="2">
								
								@if($cart->product_quantity>1)
								<a class="cart_quantity_down" href="{!! url('/cart/update-product-quantity/'.$cart->cart_id.'/-1') !!}"> - </a>
								@endif
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">₱ {!! $cart->price*$cart->product_quantity !!}</p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" href="{!! route('destroyProductInCart_route', $cart->cart_id) !!}"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					<?php $totalAmount = $totalAmount + ($cart->price * $cart->product_quantity); ?>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section> <!--/#cart_items-->

<section id="do_action">
	<div class="container">
		<div class="heading">
			<h3>What would you like to do next?</h3>
			<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="chose_area">
					<ul class="user_option">
						<li>
							
							<form action="{!! route('applyCoupon_route') !!}" method="post">
							{!! csrf_field() !!}

							<label>Coupon Title &nbsp;</label>
							<input type="text" name="coupon_title"  ><br />
							<label>Coupon Code </label>
							<input type="text" name="coupon_code" ><br />

							<input type="submit" value="Apply" class="btn btn-default check_out">
						
							</form>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="total_area">
					<ul>
						@if(!empty(Session::get('sessionCouponAmount')))
							<li>Shipping Cost <span>Free</span></li>
							<li>Sub Total <span>₱ <?php echo $totalAmount; ?></span></li>
							<li>Coupon Discount <span>₱ <?php echo Session::get('sessionCouponAmount'); ?></span></li>
							<li>Grand Total <span>₱ <?php echo $totalAmount - Session::get('sessionCouponAmount'); ?></span></li>
						@else
							<li>Shipping Cost <span>Free</span></li>
							<li>Grand Total <span>₱ <?php echo $totalAmount; ?></span></li>
						@endif
					</ul>
						<a class="btn btn-default update" href="">Update</a>
						<a class="btn btn-default check_out" href="">Check Out</a>
				</div>
			</div>
		</div>
	</div>
</section><!--/#do_action-->

@endsection