@extends('frontend_views.layouts.front_design')
@section('content')

	<section>
		<div class="container">
			<div class="row">
				
				@include('frontend_views/modules/part/sidebar')

				<div class="col-sm-9 padding-right">
					
					@if(Session::has('flash_message_error'))
			            <div class="alert alert-danger alert-block" style="background-color: #f2dfd0">
			                <button type="button" class="close" data-dismiss="alert">×</button> 
			                <span><strong>{!! session('flash_message_error') !!}</strong></span>
			            </div>
		            @endif   
		            
		            @if(Session::has('flash_message_success'))
		            <div class="alert alert-success alert-block">
		                <button type="button" class="close" data-dismiss="alert">×</button> 
		                <span><strong>{!! session('flash_message_success') !!}</strong></span>
		            </div>
		            @endif

					@include('frontend_views/modules/part/product_details_page')
					@include('frontend_views/modules/part/product_recommended_page')

				</div>
			</div>
		</div>
	</section>




@endsection