{{-- Form for insert, view, edit --}} 
@extends('backend_views.layouts.design_page')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> 
            <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
            <a href="#">Categories</a> 
            {{-- if statement --}}
            @if( Route::currentRouteName() == 'create_category_route' )
                <a href="#" class="current">Create Category</a> 
            
            @elseif( Route::currentRouteName() == 'edit_category_route' )
                <a href="#" class="current">Edit Category</a> 
            
            @elseif( Route::currentRouteName() == 'show_category_route' )
                <a href="#" class="current">Show Category</a> 

            @elseif( Route::currentRouteName() == 'delete_category_confirmation_route' )
                <a href="#" class="current">Delete Category</a> 
            
            @endif
            {{-- /.if statement --}}
        </div>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                @if( Route::currentRouteName() == 'delete_category_confirmation_route' )
                <div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                      <h4 class="alert-heading">Very important!</h4>
                      Once you delete this category, there's no getting it back.
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
                        @if( Route::currentRouteName() == 'create_category_route' )
                            <h5>Create Category</h5>
                            <div class="pull-right">
                                <a href="{!! route('index_category_route') !!}" class="btn btn-primary">
                                <i class=" icon-list"></i>  Category List</a>
                            </div>
                        {{-- /.create --}}
                        
                        {{-- edit --}}
                        @elseif( Route::currentRouteName() == 'edit_category_route' )
                        <h5>Edit Category</h5>
                        <div class="pull-right">
                            <a href="{!! route('index_category_route') !!}" class="btn btn-primary">
                            <i class=" icon-list"></i>  Category List</a>
                        </div>
                        <div class="pull-right">
                            <a href="{!! route('show_category_route', $category->category_id) !!}" class="btn btn-info"><i class=" icon-plus-sign"></i> View Category</a>
                        </div>
                        {{-- /.edit --}}
                        
                        {{-- show --}}
                        @elseif( Route::currentRouteName() == 'show_category_route' )
                        <h5>Show Category</h5>
                        <div class="pull-right">
                            <a href="{!! route('index_category_route') !!}" class="btn btn-primary">
                            <i class=" icon-list"></i> Category List</a>
                        </div>
                        <div class="pull-right">
                            <a href="{!! route('edit_category_route', $category->category_id) !!}" class="btn btn-success"><i class=" icon-plus-sign"></i> Edit Category</a>
                        </div>
                        {{-- /.show --}}

                        {{-- delete --}}
                        @elseif( Route::currentRouteName() == 'delete_category_confirmation_route' )
                        <h5>Delete Category</h5>
                        <div class="pull-right">
                            <a href="{!! route('index_category_route') !!}" class="btn btn-primary">
                            <i class=" icon-list"></i>  Category List</a>
                        </div>
                        {{-- /.delete --}}
                        @endif
                        
                        {{-- if statement --}}
                    </div>
                    <div class="widget-content nopadding">
                        {{-- Note: the name="add_category" and id="add_category" is for form validation --}}
                        @if( Route::currentRouteName() == 'create_category_route' )
                        <form class="form-horizontal" method="post" action="{!! route('store_category_route') !!}" name="add_category" id="add_category" novalidate="novalidate">
                            
                        @elseif( Route::currentRouteName() == 'edit_category_route' )
                            {{-- {!! Form::model($project, ['route' => ['projects.update', $project->project_id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!} --}}
                        <form class="form-horizontal" method="post" action="{!! route('update_category_route', $category->category_id) !!}" name="add_category" id="add_category" novalidate="novalidate">
                        
                        @elseif( Route::currentRouteName() == 'show_category_route' )
                        <form class="form-horizontal" method="post" action="#" name="add_category" id="add_category" novalidate="novalidate">

                        @elseif( Route::currentRouteName() == 'delete_category_confirmation_route' )
                        <form class="form-horizontal" method="post" action="#" name="add_category" id="add_category" novalidate="novalidate">
                            @csrf
                            @method("DELETE")
                        @endif
                            {{ csrf_field() }}
                            <div class="control-group">
                                <input type="hidden" name="category_id" value="{!! old('category_id', isset($category->category_id) ? $category->category_id : '') !!}">
                                <label class="control-label">Category</label>
                                <div class="controls">
                                    <input type="text" name="category" id="category" value="{!! old('category', isset($category->category) ? $category->category : '') !!}"
                                    {!! (Route::currentRouteName() == 'show_category_route' ? 'disabled' : '' ) !!}
                                    >
                                </div>
                            </div>
                            @if( Route::currentRouteName() == 'create_category_route' )
                            <div class="control-group">
                                <label class="control-label">Category Level</label>
                                <div class="controls">
                                    <select name="parent_id" id="parent_id">
                                        <option value="0">Main Category</option>
                                        @foreach($levels as $val)
                                            <option value="{!! $val->category_id !!}">{!! $val->category !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                            @if(Route::currentRouteName() == 'edit_category_route' OR 
                                Route::currentRouteName() == 'show_category_route' )
                            <div class="control-group">
                                <label class="control-label">Category Level</label>
                                <div class="controls">
                                    <select name="parent_id" id="parent_id">
                                        <option value="0">Main Category</option>
                                        @foreach($levels as $val)
                                            <option value="{!! $val->category_id !!}" @if($val->category_id == $category->parent_id) selected
                                                @endif>
                                                {!! $val->category !!}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <textarea type="text" name="description" id="description" {!! (Route::currentRouteName() == 'show_category_route' ? 'disabled' : '' ) !!} >{!! old('category', isset($category->description) ? $category->description : '') !!}
                                    </textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">URL</label>
                                <div class="controls">
                                    <input type="text" name="url" id="url" value="{!! old('url', isset($category->url) ? $category->url : '') !!}"
                                    {!! (Route::currentRouteName() == 'show_category_route' ? 'disabled' : '' ) !!} 
                                    >
                                </div>
                            </div>
                            @if( Route::currentRouteName() == 'create_category_route' )
                            <div class="control-group">
                                <label class="control-label">Enable</label>
                                <div class="controls">
                                    <input type="checkbox" name="status" id="status">
                                </div>
                            </div>
                            @elseif( Route::currentRouteName() != 'create_category_route' )
                            <div class="control-group">
                                <label class="control-label">Enable</label>
                                <div class="controls">
                                    <input type="checkbox" name="status" id="status" @if($category->status=="1") checked @endif value="1"
                                    {!! (Route::currentRouteName() == 'show_category_route' ? 'disabled' : '' ) !!} 
                                    >
                                    {{-- <input type="checkbox" name="enable" id="enable" @if($category->url==1) checked @endif value="1"> --}}
                                </div>
                            </div>
                            @endif

                            {{-- for  save button --}}
                            @if( Route::currentRouteName() == 'show_category_route' )
                             {{-- no button if show route --}}
                            
                            @elseif( Route::currentRouteName() == 'delete_category_confirmation_route' )
                            <div class="form-actions">
                                <a href="{!! route('destroy_category_route', $category->category_id) !!}" type="submit" value="Delete" class="btn btn-danger">Delete</a>
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