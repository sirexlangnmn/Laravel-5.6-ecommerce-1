{{-- Form for insert, view, edit --}} 
@extends('backend_views.layouts.design_page')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> 
            <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
            <a href="#">Products</a><a href="#" class="current">Product Attributes</a> 
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
                        <h5>Add Product Attibutes</h5>
                        <div class="pull-right">
                            <a href="{!! route('index_product_route') !!}" class="btn btn-primary">
                            <i class=" icon-list"></i>  Product List</a>
                        </div>
                    </div>
                    <div class="widget-content nopadding">
                          <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{!! route('store_product_attributes_route', $productDetails->product_id) !!}" name="product_form_validation" id="product_form_validation" novalidate="novalidate">
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
                                <label class="control-label"></label>
                                <div class="controls field_wrapper">
                                  <input required title="Required" type="text" name="sku" id="sku" placeholder="SKU" style="width:120px;">
                                  <input required title="Required" type="text" name="size" id="size" placeholder="Size" style="width:120px;">
                                  <input required title="Required" type="text" name="price" id="price" placeholder="Price" style="width:120px;"> 
                                  <input required title="Required" type="text" name="stock" id="stock" placeholder="Stock" style="width:120px;">
                                </div>
                            </div>
                             

                            {{-- <div class="control-group">
                                <label class="control-label"></label>
                                <div class="controls field_wrapper">
                                  <input required title="Required" type="text" name="sku[]" id="sku" placeholder="SKU" style="width:120px;">
                                  <input required title="Required" type="text" name="size[]" id="size" placeholder="Size" style="width:120px;">
                                  <input required title="Required" type="text" name="price[]" id="price" placeholder="Price" style="width:120px;"> 
                                  <input required title="Required" type="text" name="stock[]" id="stock" placeholder="Stock" style="width:120px;">
                                  <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                                </div>
                            </div> --}} 

                            {{-- <div class="field_wrapper">
                                 <div>
                                     <input type="text" name="field_name[]" value="" />
                                     <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                                 </div>
                             </div> --}}
                            <!-- ---------------------------- -->
                            <!-- /.Input Boxes -->
                            <!-- ---------------------------- -->
                            
                            <div class="form-actions">
                                <input type="submit" value="Save" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>

                <!-- ---------------------------- -->
                <!-- data table of product atributes -->
                <!-- ---------------------------- -->
                  <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Product Attributes</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{!! route('update_product_attributes_route', $productDetails->product_id) !!}" name="product_form_validation" id="product_form_validation" novalidate="novalidate">
                {{ csrf_field() }}
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Attrib-ID</th>
                  <th>SKU</th>
                  <th>Size</th>
                  <th>Price</th>
                  <th>Stock</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Attrib-ID</th>
                  <th>SKU</th>
                  <th>Size</th>
                  <th>Price</th>
                  <th>Stock</th>
                  <th>Actions</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($productDetails['attributes'] as $attribute)                
                <tr>
                    <td class="taskStatus"><input type="hidden" name="idAttr[]" id="prod_attrib_id" value="{!! $attribute->prod_attrib_id !!}">{!! $attribute->prod_attrib_id !!}</td>
                    <td class="taskStatus">{!! $attribute->sku !!}</td>
                    <td class="taskStatus">{!! $attribute->size !!}</td>
                    <td><input type="number" name="price[]" id="price" value="{!! $attribute->price !!}" style="width:120px;"> &nbsp; {!! $attribute->price !!}</td>
                    <td><input type="number" name="stock[]" id="stock" value="{!! $attribute->stock !!}" style="width:120px;"> &nbsp; {!! $attribute->stock !!}</td>
                    <td class="taskStatus">
                      <input type="submit" name="" value="Update" class="btn btn-success btn-mini" />
                        <a href="#modalProdAttribDelete{!! $attribute->prod_attrib_id !!}" data-toggle="modal" class="btn btn-danger btn-mini"><i class="icon-trash"></i>&nbsp; Delete</a>
                    </td>
                    @include('backend_views.modules.products.parts.modal_prod_attrib_delete_page')
                </tr>
                @endforeach
              </tbody>
            </table>
          </form>
          </div>
        </div>
            </div>
        </div>
    </div>
</div>
@include('backend_views.components.datatables_page')
@include('backend_views.components.validations_page')
@endsection