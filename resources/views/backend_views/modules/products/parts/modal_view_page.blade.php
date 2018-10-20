
<div id="modalView{!! $row->product_id !!}" class="modal hide">
    <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3>{!! $row->prod_name !!} Full Details</h3>
    </div>
    <div class="modal-body">
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
