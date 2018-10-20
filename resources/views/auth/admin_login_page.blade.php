<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ecommerce Laravel 5.6</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend_assets/images/logo/logo_circle.png') }}">
        <link rel="stylesheet" href="{{ asset('backend_assets/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('backend_assets/css/bootstrap-responsive.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('backend_assets/css/matrix-login.css') }}" />
        <link href="{{ asset('backend_assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div id="loginbox">
            {{-- flash message --}}
            @if(Session::has('flash_message_error'))     
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{!! session('flash_message_error') !!}</strong>
            </div>
            @endif
            {{-- @if(Session::has('flash_message_succcess'))     
            <div class="alert alert-succcess alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{!! session('flash_message_succcess') !!}</strong>
            </div>
            @endif --}}
            {{-- /.flash message --}}     
            <form id="loginform" class="form-vertical" method="post" action="{{ route('login_route') }}">
                {{ csrf_field() }}
                <div class="control-group normal_text">
                    <h3>
                        <img src="{{ asset('backend_assets/images/logo/logo_long.png') }}" alt="Logo"  />
                    </h3>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span>
                            <input type="email" name="email" placeholder="Email" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span>
                            <input type="password" name="password" placeholder="Password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left">
                    <a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a>
                    </span>
                    <span class="pull-right">
                    <button type="submit" class="btn btn-success" value="Login" name="login"> 
                    Login</button>
                    </span>
                </div>
            </form>
            <form id="recoverform" action="#" class="form-vertical">
                <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lo">
                        <i class="icon-envelope"></i>
                        </span>
                        <input type="text" placeholder="E-mail address" />
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left">
                    <a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a>
                    </span>
                    <span class="pull-right">
                    <a class="btn btn-info"/>Reecover</a>
                    </span>
                </div>
            </form>
        </div>
        <script src="{{ asset('backend_assets/js/jquery.min.js') }}"></script>  
        <script src="{{ asset('backend_assets/js/matrix.login.js') }}"></script> 
    </body>
</html>