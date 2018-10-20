{{-- Form for insert, view, edit --}} 
@extends('backend_views.layouts.design_page')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> 
            <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
            <a href="#">Products</a> 
            {{-- if statement --}}
            @if( Route::currentRouteName() == 'create_product_route' )
                <a href="#" class="current">Create Product</a> 
            
            @elseif( Route::currentRouteName() == 'edit_product_route' )
                <a href="#" class="current">Edit Product</a> 
            
            @elseif( Route::currentRouteName() == 'show_product_route' )
                <a href="#" class="current">Show Product</a> 

            @elseif( Route::currentRouteName() == 'delete_product_confirmation_route' )
                <a href="#" class="current">Delete Product</a> 
            
            @endif
            {{-- /.if statement --}}
        </div>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                @if( Route::currentRouteName() == 'delete_product_confirmation_route' )
                <div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                      <h4 class="alert-heading">Very important!</h4>
                      Once you delete this product, there's no getting it back.
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
                        @if( Route::currentRouteName() == 'create_product_route' )
                            <h5>Create Product</h5>
                            <div class="pull-right">
                                <a href="{!! route('index_product_route') !!}" class="btn btn-primary">
                                <i class=" icon-list"></i>  Product List</a>
                            </div>
                        {{-- /.create --}}
                        
                        {{-- edit --}}
                        @elseif( Route::currentRouteName() == 'edit_product_route' )
                        <h5>Edit product</h5>
                        <div class="pull-right">
                            <a href="{!! route('index_product_route') !!}" class="btn btn-primary">
                            <i class=" icon-list"></i>  Product List</a>
                        </div>
                        {{-- /.edit --}}
                        
                        {{-- show --}}
                        @elseif( Route::currentRouteName() == 'show_product_route' )
                        <h5>Show product</h5>
                        <div class="pull-right">
                            <a href="{!! route('index_product_route') !!}" class="btn btn-primary">
                            <i class=" icon-list"></i> Product List</a>
                        </div>
                        <div class="pull-right">
                            <a href="{!! route('edit_product_route', $product->product_id) !!}" class="btn btn-success"><i class=" icon-plus-sign"></i> Edit Product</a>
                        </div>
                        {{-- /.show --}}

                        {{-- delete --}}
                        @elseif( Route::currentRouteName() == 'delete_product_confirmation_route' )
                        <h5>Delete Product</h5>
                        <div class="pull-right">
                            <a href="{!! route('index_product_route') !!}" class="btn btn-primary">
                            <i class=" icon-list"></i>  Product List</a>
                        </div>
                        {{-- /.delete --}}
                        @endif
                        
                        {{-- if statement --}}
                    </div>
                    <div class="widget-content nopadding">
                        {{-- Note: the name="product_form_validation" and id="product_form_validation" is for form validation --}}
                        @if( Route::currentRouteName() == 'create_product_route' )
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{!! route('store_product_route') !!}" name="product_form_validation" id="product_form_validation" novalidate="novalidate">
                            
                        @elseif( Route::currentRouteName() == 'edit_product_route' )
                            {{-- {!! Form::model($project, ['route' => ['projects.update', $project->project_id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!} --}}
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{!! route('update_product_route', $product->product_id) !!}" name="product_form_validation" id="product_form_validation" novalidate="novalidate">
                        
                        

                        @elseif( Route::currentRouteName() == 'delete_product_confirmation_route' )
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" action="#" name="product_form_validation" id="product_form_validation" novalidate="novalidate">
                            @csrf
                            @method("DELETE")
                        @endif
                            {{ csrf_field() }}
                            <!-- ---------------------------- -->
                            <!-- Input Boxes -->
                            <!-- ---------------------------- -->
                            <div class="control-group">
                                <label class="control-label">Under Category</label>
                                <div class="controls">
                                    <select name="category_id" id="category_id">
                                        <?php echo $categories_dropdown; ?>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <input type="hidden" name="product_id" value="{!! old('product_id', isset($product->product_id) ? $product->product_id : '') !!}">
                                <label class="control-label">Product Name</label>
                                <div class="controls">
                                    <input type="text" name="prod_name" id="prod_name" value="{!! old('prod_name', isset($product->prod_name) ? $product->prod_name : '') !!}"
                                    {!! (Route::currentRouteName() == 'show_product_route' ? 'disabled' : '' ) !!}
                                    >
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Code</label>
                                <div class="controls">
                                    <input type="text" name="prod_code" id="prod_code" value="{!! old('prod_code', isset($product->prod_code) ? $product->prod_code : '') !!}"
                                    {!! (Route::currentRouteName() == 'show_product_route' ? 'disabled' : '' ) !!} 
                                    >
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Color</label>
                                <div class="controls">
                                    <input type="text" name="prod_color" id="prod_color" value="{!! old('prod_color', isset($product->prod_color) ? $product->prod_color : '') !!}"
                                    {!! (Route::currentRouteName() == 'show_product_route' ? 'disabled' : '' ) !!} 
                                    >
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Description</label>
                                <div class="controls">
                                    <textarea type="text" name="prod_desc" id="prod_desc" {!! (Route::currentRouteName() == 'show_product_route' ? 'disabled' : '' ) !!} >{!! old('product', isset($product->prod_desc) ? $product->prod_desc : '') !!}
                                    </textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Material and Care</label>
                                <div class="controls">
                                    <textarea type="text" name="material_and_care" id="material_and_care" {!! (Route::currentRouteName() == 'show_product_route' ? 'disabled' : '' ) !!} >{!! old('material_and_care', isset($product->material_and_care) ? $product->material_and_care : '') !!}
                                    </textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Price</label>
                                <div class="controls">
                                    <input type="number" name="prod_price" id="prod_price" value="{!! old('prod_price', isset($product->prod_price) ? $product->prod_price : '') !!}"
                                    {!! (Route::currentRouteName() == 'show_product_route' ? 'disabled' : '' ) !!} 
                                    >
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Image</label>
                                <div class="controls">
                                    <div class="uploader hover" id="uniform-undefined">
                                        <input type="file" name="prod_image" id="prod_image" size="19" style="opacity: 0;">
                                        <span class="filename">No file selected</span>
                                        <span class="action">Choose File</span></div>

                                        @if( Route::currentRouteName() == 'edit_product_route' )
                                        <input type="hidden" name="current_image" value="{!! $product->prod_image !!}">
                                        @if(!empty($product->prod_image))
                                        <img src="{!! asset('backend_assets/images/products/thumbnail/'.$product->prod_image) !!}"> | <a href="{!! route('destroy_product_image_route', $product->product_id) !!}" class="btn btn-mini">Delete Image</a>
                                        @endif
                                        @endif
                                </div>
                            </div>

                            @if( Route::currentRouteName() == 'create_product_route' )
                            <div class="control-group">
                                <label class="control-label">Enable</label>
                                <div class="controls">
                                    <input type="checkbox" name="status" id="status">
                                </div>
                            </div>
                            @elseif( Route::currentRouteName() != 'create_product_route' )
                            <div class="control-group">
                                <label class="control-label">Enable</label>
                                <div class="controls">
                                    <input type="checkbox" name="status" id="status" @if($product->status=="1") checked @endif value="1"
                                    {!! (Route::currentRouteName() == 'show_product_route' ? 'disabled' : '' ) !!} 
                                    >
                                </div>
                            </div>
                            @endif
                            <!-- ---------------------------- -->
                            <!-- /.Input Boxes -->
                            <!-- ---------------------------- -->
                            @if( Route::currentRouteName() == 'show_product_route' )
                             {{-- no button if show route --}}
                            
                            @elseif( Route::currentRouteName() == 'delete_product_confirmation_route' )
                            <div class="form-actions">
                                <a href="{!! route('destroy_product_route', $product->product_id) !!}" type="submit" value="Delete" class="btn btn-danger">Delete</a>
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