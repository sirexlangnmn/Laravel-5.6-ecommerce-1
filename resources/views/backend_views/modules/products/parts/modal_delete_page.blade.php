
<div id="modalDelete{!! $row->product_id !!}" class="modal hide">
    <div class="modal-header">
        <div class="pull-right">
            <a href="{!! route('destroy_product_route', $row->product_id) !!}" class="btn btn-danger"><i class=" icon-trash"></i> Delete Product</a>
        </div>
        <div class="pull-right">
            <a href="#" class="close btn" data-dismiss="modal" type="button"><i class="icon-remove-sign"></i> Close</a>
        </div>
        <h3>Delete {!! $row->prod_name !!}?</h3>
    </div>
    <div class="modal-body">
        <div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
            <h4 class="alert-heading">Very important!</h4>
            Once you delete this product details, there's no getting it back.
            Make sure you want to do this.
        </div>
        <div class="widget-content nopadding">
            <p>Image:</p>
            <p class="text-center">
                <img src="{!! asset('backend_assets/images/products/small/'.$row->prod_image) !!}">
            </p>
            <p>Product-ID: &nbsp; <strong>{!! $row->product_id !!}</strong></p>
            <p>Category-ID: &nbsp; <strong>{!! $row->category_id !!}</strong></p>
            <p>Category: &nbsp; <strong>{!! $row->category !!}</strong></p>
            <p>Product Name: &nbsp; <strong>{!! $row->prod_name !!}</strong></p>
            <p>Product Code: &nbsp; <strong>{!! $row->prod_code !!}</strong></p>
            <p>Product Color: &nbsp; <strong>{!! $row->prod_color !!}</strong></p>
            <p>Product Desc &nbsp; <strong>{!! $row->prod_desc !!}</strong></p>
            <p>Product Price: &nbsp; <strong>{!! $row->prod_price !!}</strong></p>
            <p>Created At: &nbsp; <strong>{!! $row->created_at !!}</strong></p>
            <p>Updated at: &nbsp; <strong>{!! $row->updated_at !!}</strong></p>
        </div>
    </div>
</div>
