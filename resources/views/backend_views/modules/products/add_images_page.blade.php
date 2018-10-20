{{-- Form for insert, view, edit --}} 
@extends('backend_views.layouts.design_page')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> 
            <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
            <a href="#">Products</a><a href="#" class="current">Product Images</a> 
        </div>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
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
                        <h5>Add Product Images</h5>
                        <div class="pull-right">
                            <a href="{!! route('index_product_route') !!}" class="btn btn-primary">
                            <i class=" icon-list"></i>  Product List</a>
                        </div>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{!! route('store_product_images_route', $productDetails->product_id) !!}" name="product_form_validation" id="product_form_validation" novalidate="novalidate">
                            {{ csrf_field() }}
                            <!-- ---------------------------- -->
                            <!-- Input Boxes -->
                            <!-- ---------------------------- -->
                            {{-- <div class="control-group">
                                <label class="control-label">Under Category</label>
                                <div class="controls">
                                    <input type="text" name="prod_name" id="prod_name" value="{!! old('category', isset($productDetails->category) ? $productDetails->category : '') !!}"
                                    
                                    >
                                </div>
                            </div> --}}


                            <input type="hidden" name="product_id" value="{!! $productDetails->product_id !!}">
                            
                            <div class="control-group">
                                <label class="control-label">Product Name</label>
                                <label class="control-label">
                                    <strong>{!! $productDetails->prod_name !!}</strong>
                                </label>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Code</label>
                                <label class="control-label">
                                    <strong>{!! $productDetails->prod_code !!}</strong>
                                </label>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Color</label>
                                <label class="control-label">
                                    <strong>{!! $productDetails->prod_color !!}</strong>
                                </label>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Description</label>
                                <label class="control-label">
                                    <strong>{!! $productDetails->prod_desc !!}</strong>
                                </label>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Image</label>
                                <div class="controls">
                                    <div class="uploader hover" id="uniform-undefined">
                                        <input type="file" name="prod_image[]" id="prod_image" multiple="multiple">
                                        <span class="filename">No file selected</span>
                                        <span class="action">Choose File</span></div>

                                       {{--  @if( Route::currentRouteName() == 'edit_product_route' )
                                        <input type="hidden" name="current_image" value="{!! $product->prod_image !!}">
                                        @if(!empty($product->prod_image))
                                        <img src="{!! asset('backend_assets/images/products/thumbnail/'.$product->prod_image) !!}"> | <a href="{!! route('destroy_product_image_route', $product->product_id) !!}" class="btn btn-mini">Delete Image</a>
                                        @endif
                                        @endif --}}
                                </div>
                            </div>
                            <!-- ---------------------------- -->
                            <!-- /.Input Boxes -->
                            <!-- ---------------------------- -->
                            
                            <div class="form-actions">
                                <input type="submit" value="Add Images" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>

                <!-- ---------------------------- -->
                <!-- data table of product atributes -->
                <!-- ---------------------------- -->
                  <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Alternate Product Images</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Image ID</th>
                  <th>Prod ID</th>
                  <th>Image Name</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Image ID</th>
                  <th>Prod ID</th>
                  <th>Image Name</th>
                  <th>Actions</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($productDetails['productImages'] as $productImage)                
                <tr>
                    <td class="taskStatus">{!! $productImage->prod_image_id !!}</td>
                    <td class="taskStatus">{!! $productImage->product_id !!}</td>
                    <td class="taskStatus"><img src="{!! asset('backend_assets/images/products/small/'.$productImage->prod_image) !!}"></td>
                    <td class="taskStatus">
                        <a href="" class="btn btn-success btn-mini">
                            <i class="icon-edit"></i>&nbsp; Edit</a>
                        <a href="#modalProdImageDelete{!! $productImage->prod_image_id !!}" data-toggle="modal" class="btn btn-danger btn-mini"><i class="icon-trash"></i>&nbsp; Delete</a>
                    </td>
                    @include('backend_views.modules.products.parts.modal_prod_image_delete_page')
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
            </div>
        </div>
    </div>
</div>
@include('backend_views.components.datatables_page')
@include('backend_views.components.validations_page')
@endsection