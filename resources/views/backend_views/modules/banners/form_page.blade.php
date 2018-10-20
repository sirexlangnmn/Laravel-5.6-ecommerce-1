{{-- Form for insert, view, edit --}} 
@extends('backend_views.layouts.design_page')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> 
            <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
            <a href="#">Banners</a> 
            {{-- if statement --}}
            @if( Route::currentRouteName() == 'createBanners_route' )
                <a href="#" class="current">Create Banner</a> 
            
            @elseif( Route::currentRouteName() == 'editBanners_route' )
                <a href="#" class="current">Edit Banner</a> 
            
            @elseif( Route::currentRouteName() == 'showBanners_route' )
                <a href="#" class="current">Show Banner</a> 

            @elseif( Route::currentRouteName() == 'deleteBannersConfirmation_route' )
                <a href="#" class="current">Delete Banner</a> 
            
            @endif
            {{-- /.if statement --}}
        </div>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                @if( Route::currentRouteName() == 'deleteBannersConfirmation_route' )
                <div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                      <h4 class="alert-heading">Very important!</h4>
                      Once you delete this banner, there's no getting it back.
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
                        @if( Route::currentRouteName() == 'createBanners_route' )
                            <h5>Create Banner</h5>
                            <div class="pull-right">
                                <a href="{!! route('indexBanners_route') !!}" class="btn btn-primary">
                                <i class=" icon-list"></i>  Banner List</a>
                            </div>
                        {{-- /.create --}}
                        
                        {{-- edit --}}
                        @elseif( Route::currentRouteName() == 'editBanners_route' )
                        <h5>Edit Banner</h5>
                        <div class="pull-right">
                            <a href="{!! route('indexBanners_route') !!}" class="btn btn-primary">
                            <i class=" icon-list"></i>  Banner List</a>
                        </div>
                        <div class="pull-right">
                            <a href="{!! route('showBanners_route', $banner->banner_id) !!}" class="btn btn-info"><i class=" icon-plus-sign"></i> View Banner</a>
                        </div>
                        {{-- /.edit --}}
                        
                        {{-- show --}}
                        @elseif( Route::currentRouteName() == 'showBanners_route' )
                        <h5>Show Banner</h5>
                        <div class="pull-right">
                            <a href="{!! route('indexBanners_route') !!}" class="btn btn-primary">
                            <i class=" icon-list"></i> Banner List</a>
                        </div>
                        <div class="pull-right">
                            <a href="{!! route('editBanners_route', $banner->banner_id) !!}" class="btn btn-success"><i class=" icon-plus-sign"></i> Edit Banner</a>
                        </div>
                        {{-- /.show --}}

                        {{-- delete --}}
                        @elseif( Route::currentRouteName() == 'deleteBannersConfirmation_route' )
                        <h5>Delete Banner</h5>
                        <div class="pull-right">
                            <a href="{!! route('indexBanners_route') !!}" class="btn btn-primary">
                            <i class=" icon-list"></i>  Banner List</a>
                        </div>
                        {{-- /.delete --}}
                        @endif
                        
                        {{-- if statement --}}
                    </div>
                    <div class="widget-content nopadding">
                        {{-- Note: the name="bannerForm_validaton" and id="bannersForm_validation" is for form validation --}}
                        @if( Route::currentRouteName() == 'createBanners_route' )
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{!! route('storeBanners_route') !!}" name="bannerForm_validaton" id="bannersForm_validation" novalidate="novalidate">
                            
                        @elseif( Route::currentRouteName() == 'editBanners_route' )
                            {{-- {!! Form::model($project, ['route' => ['projects.update', $project->project_id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!} --}}
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{!! route('updateBanners_route', $banner->banner_id) !!}" name="bannerForm_validaton" id="bannersForm_validation" novalidate="novalidate">
                        
                        @elseif( Route::currentRouteName() == 'showBanners_route' )
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" action="#" name="bannerForm_validaton" id="bannersForm_validation" novalidate="novalidate">

                        @elseif( Route::currentRouteName() == 'deleteBannersConfirmation_route' )
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" action="#" name="bannerForm_validaton" id="bannersForm_validation" novalidate="novalidate">
                            @csrf
                            @method("DELETE")
                        @endif
                            {{ csrf_field() }}
                            
                            @if( Route::currentRouteName() == 'editBanners_route' )
                            <div class="control-group">
                                <input type="hidden" name="banner_id" value="{!! old('banner_id', isset($banner->banner_id) ? $banner->banner_id : '') !!}">
                            </div>
                            @endif

                            <div class="control-group">
                                <label class="control-label">Banner Title</label>
                                <div class="controls">
                                    <input type="text" name="banner_title" id="banner_title" value="{!! old('banner_title', isset($banner->banner_title) ? $banner->banner_title : '') !!}"
                                    {!! (Route::currentRouteName() == 'showBanners_route' ? 'disabled' : '' ) !!}
                                    >
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Banner Tagline</label>
                                <div class="controls">
                                    <input type="text" name="banner_tagline" id="banner_tagline" value="{!! old('banner_tagline', isset($banner->banner_tagline) ? $banner->banner_tagline : '') !!}"
                                    {!! (Route::currentRouteName() == 'showBanners_route' ? 'disabled' : '' ) !!} 
                                    >
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Banner Description</label>
                                <div class="controls">
                                    <textarea type="text" name="banner_description" id="banner_description" {!! (Route::currentRouteName() == 'showBanners_route' ? 'disabled' : '' ) !!} >{!! old('banner_description', isset($banner->banner_description) ? $banner->banner_description : '') !!}
                                    </textarea>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Banner Link</label>
                                <div class="controls">
                                    <input type="text" name="banner_link" id="banner_link" value="{!! old('banner_link', isset($banner->banner_link) ? $banner->banner_link : '') !!}"
                                    {!! (Route::currentRouteName() == 'showBanners_route' ? 'disabled' : '' ) !!} 
                                    >
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Banner Image</label>
                                <div class="controls">
                                    <div class="uploader hover" id="uniform-undefined">
                                        <input type="file" name="banner_image" id="banner_image" size="19" style="opacity: 0;">
                                        <span class="filename">No file selected</span>
                                        <span class="action">Choose File</span></div>

                                        @if( Route::currentRouteName() != 'createBanners_route' )
                                        <input type="hidden" name="current_image" value="{!! $banner->banner_image !!}">

                                        @if(!empty($banner->banner_image))
                                        <img src="{!! asset('backend_assets/images/banners/thumbnail/'.$banner->banner_image) !!}"> | <a href="{!! route('destroyBannersImage_route', $banner->banner_id) !!}" class="btn btn-mini">Delete Image</a>
                                        @endif
                                        @endif
                                </div>
                            </div>

                            @if( Route::currentRouteName() == 'createBanners_route' )
                            <div class="control-group">
                                <label class="control-label">Enable</label>
                                <div class="controls">
                                    <input type="checkbox" name="banner_status" id="banner_status" value="1">
                                </div>
                            </div>
                            @elseif( Route::currentRouteName() != 'createBanners_route' )
                            <div class="control-group">
                                <label class="control-label">Enable</label>
                                <div class="controls">
                                    <input type="checkbox" name="banner_status" id="banner_status" @if($banner->banner_status=="1") checked @endif value="1"
                                    {!! (Route::currentRouteName() == 'showBanners_route' ? 'disabled' : '' ) !!} 
                                    >
                                    {{-- <input type="checkbox" name="enable" id="enable" @if($banner->url==1) checked @endif value="1"> --}}
                                </div>
                            </div>
                            @endif

                            {{-- for  save button --}}
                            @if( Route::currentRouteName() == 'showBanners_route' )
                             {{-- no button if show route --}}
                            
                            @elseif( Route::currentRouteName() == 'deleteBannersConfirmation_route' )
                            <div class="form-actions">
                                <a href="{!! route('destroyBanners_route', $banner->banner_id) !!}" type="submit" value="Delete" class="btn btn-danger">Delete</a>
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
@include('backend_views.components.validations_page')
@endsection