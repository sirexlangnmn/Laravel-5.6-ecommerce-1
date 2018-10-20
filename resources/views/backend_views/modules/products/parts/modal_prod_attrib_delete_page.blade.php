
<div id="modalProdAttribDelete{!! $attribute->prod_attrib_id !!}" class="modal hide">
    <div class="modal-header">
        <div class="pull-right">
            <a href="{!! route('destroy_prod_attrib_route', $attribute->prod_attrib_id) !!}" class="btn btn-danger"><i class=" icon-trash"></i> Delete Product</a>
        </div>
        <div class="pull-right">
            <a href="#" class="close btn" data-dismiss="modal" type="button"><i class="icon-remove-sign"></i> Close</a>
        </div>
        <h3>Delete Product Attibute?</h3>
    </div>
    <div class="modal-body">
        <div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
            <h4 class="alert-heading">Very important!</h4>
            Once you delete this product attribute, there's no getting it back.
            Make sure you want to do this.
        </div>
        <div class="widget-content nopadding">
            <p>Atrrib-ID: &nbsp; <strong>{!! $attribute->prod_attrib_id !!}</strong></p>
            <p>SKU: &nbsp; <strong>{!! $attribute->sku !!}</strong></p>
            <p>Size: &nbsp; <strong>{!! $attribute->size !!}</strong></p>
            <p>Price: &nbsp; <strong>{!! $attribute->price !!}</strong></p>
            <p>Stock: &nbsp; <strong>{!! $attribute->stock !!}</strong></p>
          
        </div>
    </div>
</div>
