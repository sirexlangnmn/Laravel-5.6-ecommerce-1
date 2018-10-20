{{-- Form for insert, view, edit --}} 
@extends('backend_views.layouts.design_page')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> 
            <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
            <a href="#">Categories</a> 
            {{-- if statement --}}
            @if( Route::currentRouteName() == 'createCoupons_route' )
                <a href="#" class="current">Create Coupons</a> 
            
            @elseif( Route::currentRouteName() == 'editCoupons_route' )
                <a href="#" class="current">Edit Coupons</a> 
            
            @elseif( Route::currentRouteName() == 'showCoupons_route' )
                <a href="#" class="current">Show Coupons</a> 

            @elseif( Route::currentRouteName() == 'deleteCouponsConfirmation_route' )
                <a href="#" class="current">Delete Coupons</a> 
            
            @endif
            {{-- /.if statement --}}
        </div>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                @if( Route::currentRouteName() == 'deleteCouponsConfirmation_route' )
                <div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                      <h4 class="alert-heading">Very important!</h4>
                      Once you delete this coupons, there's no getting it back.
                      Make sure you want to do this.
                </div>
                @endif

                @if(Session::has('flash_message_error'))
                <div class="alert alert-error alert-block">
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
                
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon"> <i class="icon-info-sign"></i></span>
                        {{-- if statement --}}
                        {{-- create --}}
                        @if( Route::currentRouteName() == 'createCoupons_route' )
                            <h5>Create Coupons</h5>
                            <div class="pull-right">
                                <a href="{!! route('indexCoupons_route') !!}" class="btn btn-primary">
                                <i class=" icon-list"></i>  Coupons List</a>
                            </div>
                        {{-- /.create --}}
                        
                        {{-- edit --}}
                        @elseif( Route::currentRouteName() == 'editCoupons_route' )
                        <h5>Edit Coupons</h5>
                        <div class="pull-right">
                            <a href="{!! route('indexCoupons_route') !!}" class="btn btn-primary">
                            <i class=" icon-list"></i>  Coupons List</a>
                        </div>
                        <div class="pull-right">
                            <a href="{!! route('showCoupons_route', $coupons->coupon_id) !!}" class="btn btn-info"><i class=" icon-plus-sign"></i> View Coupons</a>
                        </div>
                        {{-- /.edit --}}
                        
                        {{-- show --}}
                        @elseif( Route::currentRouteName() == 'showCoupons_route' )
                        <h5>Show Coupons</h5>
                        <div class="pull-right">
                            <a href="{!! route('indexCoupons_route') !!}" class="btn btn-primary">
                            <i class=" icon-list"></i> Coupons List</a>
                        </div>
                        <div class="pull-right">
                            <a href="{!! route('editCoupons_route', $coupons->coupon_id) !!}" class="btn btn-success"><i class=" icon-plus-sign"></i> Edit Coupons</a>
                        </div>
                        {{-- /.show --}}

                        {{-- delete --}}
                        @elseif( Route::currentRouteName() == 'deleteCouponsConfirmation_route' )
                        <h5>Delete Coupons</h5>
                        <div class="pull-right">
                            <a href="{!! route('indexCoupons_route') !!}" class="btn btn-primary">
                            <i class=" icon-list"></i> Coupons List</a>
                        </div>
                        {{-- /.delete --}}
                        @endif
                        
                        {{-- if statement --}}
                    </div>
                    <div class="widget-content nopadding">
                        {{-- Note: the name="add_coupons" and id="add_coupons" is for form validation --}}
                        @if( Route::currentRouteName() == 'createCoupons_route' )
                        <form class="form-horizontal" method="post" action="{!! route('storeCoupons_route') !!}" name="couponsForm_validation" id="couponsForm_validation">
                            
                        @elseif( Route::currentRouteName() == 'editCoupons_route' )
                            {{-- {!! Form::model($project, ['route' => ['projects.update', $project->project_id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!} --}}
                        <form class="form-horizontal" method="post" action="{!! route('updateCoupons_route', $coupons->coupon_id) !!}" name="couponsForm_validation" id="couponsForm_validation">
                        
                        @elseif( Route::currentRouteName() == 'showCoupons_route' )
                        <form class="form-horizontal" method="post" action="#" name="couponsForm_validation" id="couponsForm_validation">

                        @elseif( Route::currentRouteName() == 'deleteCouponsConfirmation_route' )
                        <form class="form-horizontal" method="post" action="#" name="couponsForm_validation" id="couponsForm_validation">
                            @csrf
                            @method("DELETE")
                        @endif
                            {{ csrf_field() }}

                            @if( Route::currentRouteName() == 'editCoupons_route' )
                            <div class="control-group">
                                <input type="hidden" name="coupon_id" value="{!! old('coupon_id', isset($coupons->coupon_id) ? $coupons->coupon_id : '') !!}">
                            </div>
                            @endif

                            <div class="control-group">
                                <label class="control-label">Coupons Title</label>
                                <div class="controls">
                                    <input type="text" name="coupon_title" id="coupon_title" value="{!! old('coupon_title', isset($coupons->coupon_title) ? $coupons->coupon_title : '') !!}"
                                    {!! (Route::currentRouteName() == 'showCoupons_route' ? 'disabled' : '' ) !!}
                                    >
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Amount</label>
                                <div class="controls">
                                    <input type="number" name="amount" id="amount" min="0" value="{!! old('amount', isset($coupons->amount) ? $coupons->amount : '') !!}"  
                                    {!! (Route::currentRouteName() == 'showCoupons_route' ? 'disabled' : '' ) !!}
                                    >
                                </div>
                            </div>

                            @if( Route::currentRouteName() == 'createCoupons_route' )
                            <div class="control-group">
                                <label class="control-label">Amount Type</label>
                                <div class="controls">
                                    <select name="amount_type" id="amount_type">
                                    <option value="Percentage">Percentage</option>
                                    <option value="Fixed">Fixed</option>
                                    </select>
                                </div>
                            </div>
                            @elseif( Route::currentRouteName() != 'createCoupons_route' )
                            <div class="control-group">
                                <label class="control-label">Amount Type</label>
                                <div class="controls">
                                    <select name="amount_type" id="amount_type">
                                    <option @if($coupons->amount_type=="Percentage") selected @endif value="Percentage">Percentage</option>
                                    <option @if($coupons->amount_type=="Fixed") selected @endif value="Fixed">Fixed</option>
                                    </select>
                                </div>
                            </div>
                            @endif

                            <div class="control-group">
                                <label class="control-label">Expiry Date</label>
                                <div class="controls">
                                    <input type="text" name="expiry_date" id="expiry_date" autocomplete="off" value="{!! old('expiry_date', isset($coupons->expiry_date) ? $coupons->expiry_date : '') !!}"  
                                    {!! (Route::currentRouteName() == 'showCoupons_route' ? 'disabled' : '' ) !!}
                                    >
                                </div>
                            </div>

                            @if( Route::currentRouteName() == 'createCoupons_route' )
                            <div class="control-group">
                                <label class="control-label">Enable</label>
                                <div class="controls">
                                    <input type="checkbox" name="status" id="status" value="1">
                                </div>
                            </div>
                            @elseif( Route::currentRouteName() != 'createCoupons_route' )
                            <div class="control-group">
                                <label class="control-label">Enable</label>
                                <div class="controls">
                                    <input type="checkbox" name="status" id="status" value="1" 
                                    @if($coupons->status=="1") checked @endif
                                    {!! (Route::currentRouteName() == 'showCoupons_route' ? 'disabled' : '' ) !!} 
                                    >
                                </div>
                            </div>
                            @endif

                            {{-- for  save button --}}
                            @if( Route::currentRouteName() == 'showCoupons_route' )
                             {{-- no button if show route --}}
                            
                            @elseif( Route::currentRouteName() == 'deleteCouponsConfirmation_route' )
                            <div class="form-actions">
                                <a href="{!! route('destroyCoupons_route', $coupons->coupon_id) !!}" type="submit" value="Delete" class="btn btn-danger">Delete</a>
                            </div>
                            @else
                            <div class="form-actions">
                                <input type="submit" value="Save" class="btn btn-success">
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @include('backend_views.components.datetimepicker_page') --}}
@include('backend_views.components.validations_page')

@endsection