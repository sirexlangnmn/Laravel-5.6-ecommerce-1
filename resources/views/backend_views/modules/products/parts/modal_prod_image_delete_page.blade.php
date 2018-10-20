
<div id="modalProdImageDelete{!! $productImage->prod_image_id !!}" class="modal hide">
    <div class="modal-header">
        <div class="pull-right">
            <a href="{!! route('destroy_prod_alternate_image_route', $productImage->prod_image_id) !!}" class="btn btn-danger"><i class=" icon-trash"></i> Delete Product</a>
        </div>
        <div class="pull-right">
            <a href="#" class="close btn" data-dismiss="modal" type="button"><i class="icon-remove-sign"></i> Close</a>
        </div>
        <h3>Delete Product Attibute?</h3>
    </div>
    <div class="modal-body">
        <div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
            <h4 class="alert-heading">Very important!</h4>
            Once you delete this product image, there's no getting it back.
            Make sure you want to do this.
        </div>
        <div class="widget-content nopadding">
            <p>Image-ID: &nbsp; <strong>{!! $productImage->prod_image_id !!}</strong></p>
            <p>Product-ID: &nbsp; <strong>{!! $productImage->product_id !!}</strong></p>
            <p>Image: &nbsp; <img src="{!! asset('backend_assets/images/products/small/'.$productImage->prod_image) !!}"</p>
          
        </div>
    </div>
</div>
