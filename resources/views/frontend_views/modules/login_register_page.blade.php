@extends('frontend_views.layouts.front_design')
@section('content')

<section id="form" style="margin-top: 20px;"><!--form-->
	<div class="container">
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

		<div class="row">
			<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form"><!--login form-->
					<h2>Login to your account</h2>
					<form action="#">
						<input type="text" placeholder="Name" />
						<input type="email" placeholder="Email Address" />
						<span>
							<input type="checkbox" class="checkbox"> 
							Keep me signed in
						</span>
						<button type="submit" class="btn btn-default">Login</button>
					</form>
				</div><!--/login form-->
			</div>
			<div class="col-sm-1">
				<h2 class="or">OR</h2>
			</div>
			<div class="col-sm-4">
				<div class="signup-form"><!--sign up form-->
					<h2>New User Signup!</h2>
					<form id="registerForm_validation" name="registerForm_validation" method="post" action="{!! route('register_route') !!}">
						{!! csrf_field() !!}
						<input type="text" id="name" name="name" placeholder="Full Name"/>
						<input type="email" id="email" name="email" placeholder="Email Address"/>
						<input type="password"id="password" name="password" placeholder="Password"/>
						<button type="submit" class="btn btn-default">Signup</button>
					</form>
				</div><!--/sign up form-->
			</div>
		</div>
	</div>
</section><!--/form-->

@endsection