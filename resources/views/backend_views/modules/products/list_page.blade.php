@extends('backend_views.layouts.design_page')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="#">Product</a> <a href="#" class="current">View Product</a> </div>
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
                        <span class="icon"><i class="icon-th"></i></span>
                        <h5>Product List</h5>
                        <div class="pull-right">
                        <a href="{!! route('create_product_route') !!}" class="btn btn-primary"><i class=" icon-plus-sign"></i> Create Product</a>
                        </div>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>Prod-ID</th>
                                    <th>Cat-ID</th>
                                    <th>Category</th>
                                    <th>Product Name</th>
                                    <th>Product Code</th>
                                    <th>Product Description</th>
                                    <th>Material and Care</th>
                                    <th>Product Color</th>
                                    <th>Product Price</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Prod-ID</th>
                                    <th>Cat-ID</th>
                                    <th>Category</th>
                                    <th>Product Name</th>
                                    <th>Product Code</th>
                                    <th>Product Description</th>
                                    <th>Material and Care</th>
                                    <th>Product Color</th>
                                    <th>Product Price</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach( $products as $row)
                                <tr>
                                    <td class="taskStatus">{!! $row->product_id !!}</td>
                                    <td class="taskStatus">{!! $row->category_id !!}</td>
                                    <td>{!! $row->category !!}</td>
                                    <td>{!! $row->prod_name !!}</td>
                                    <td>{!! $row->prod_code !!}</td>
                                    <td>{!! $row->prod_desc !!}</td>
                                    <td>{!! $row->material_and_care !!}</td>
                                    <td>{!! $row->prod_color !!}</td>
                                    <td class="taskStatus">{!! $row->prod_price !!}</td>
                                    <td class="taskStatus"><img src="{!! asset('backend_assets/images/products/thumbnail/'.$row->prod_image) !!}"></td>
                                    <td class="taskStatus">{!! $row->status !!}</td>
                                    <td colspan="3">   
                                        <div class="btn-group">
                                            <button class="btn btn-mini btn-primary">Actions</button>
                                            <button data-toggle="dropdown" class="btn btn-mini btn-primary dropdown-toggle"><span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                              <li><a href="{!! route('edit_product_route', $row->product_id) !!}" class="btn-success"><i class="icon-edit"></i>&nbsp; Edit </a></li>
                                              
                                              <li><a href="#modalView{!! $row->product_id !!}" data-toggle="modal" class="btn-info"><i class="icon-eye-open"></i>&nbsp; View</a></li>

                                              <li><a href="{!! route('index_product_attributes_route', $row->product_id) !!}" class="btn-warning"><i class=" icon-plus-sign"></i>&nbsp; Add Attributes</a></li>

                                              <li><a href="{!! route('index_product_images_route', $row->product_id) !!}" class="btn-primary"><i class=" icon-plus-sign"></i>&nbsp; Add Images</a></li>
                                              
                                              <li><a href="#modalDelete{!! $row->product_id !!}" data-toggle="modal" class="btn-danger"><i class="icon-trash"></i>&nbsp; Delete</a></li>

                                              {{-- <li><a id="delProduct" rel="{{ $row->product_id }}" rel1="delete-product" href="javascript:" class="btn-danger deleteRecord"><i class="icon-trash"></i>&nbsp; Delete2</a></li> --}}
                                            </ul>
                                        </div>
                                    </td>
                                    @include('backend_views.modules.products.parts.modal_view_page')
                                    @include('backend_views.modules.products.parts.modal_delete_page')
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
@include('backend_views.components.sweetalerts_page')
@endsection