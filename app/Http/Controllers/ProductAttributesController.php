<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductsAttribute;
use App\Product;

class ProductAttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $product_id)
    {
        $productDetails = Product::with('attributes')->where(['product_id'=>$product_id])->first();      /*function 'attributes' : it is come from Product model */
    
        return view("backend_views.modules.products.add_attributes")->with(compact('productDetails')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request, $product_id)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            // To prevent duplication of SKU and Size
            $attrCountSKU = ProductsAttribute::where(['sku'=>$data['sku'], 'product_id'=>$data['product_id']])->count();
            $attrCountSize = ProductsAttribute::where(['size'=>$data['size'], 'product_id'=>$data['product_id']])->count();
            if($attrCountSKU>0){
                return redirect()->back()->with('flash_message_error', 'SKU <strong>'.$data['sku'].'</strong> already exist! Update the old one or add another SKU.');

                // 2nd way, but I preferred the first one
                /*return redirect('/admin/insert-product-attributes/'.$product_id)->with('flash_message_error', 'SKU already exist! Update the old one or add another SKU.');*/
            }

            if($attrCountSize>0){
                return redirect()->back()->with('flash_message_error', ''.$data['size'].' size already exist! Update the old one or add another size.');

                // 2nd way, but I preferred the first one
                /*return redirect('/admin/insert-product-attributes/'.$product_id)->with('flash_message_error', 'Size already exist! Update the old one or add another Size.');*/
            }

            // if all clear. Then proceed to store data
            $prod_attrib = new ProductsAttribute;
            $prod_attrib->product_id = $data['product_id'];
            $prod_attrib->sku        = $data['sku'];
            $prod_attrib->size       = $data['size'];
            $prod_attrib->price      = $data['price'];
            $prod_attrib->stock      = $data['stock'];
            $prod_attrib->save();

            return redirect('/admin/index-product-attributes/'.$product_id)->with('flash_message_success', 'Product attributes insert successfully. <br /> Stock Keeping Unit: '.$data['sku'].' <br /> Size: '.$data['size'].' <br /> Price: '.$data['price'].' <br /> Stock: '.$data['stock'].'.' );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {
        if($request->isMethod('post')){
            $data=$request->all();
            /*echo "<pre>"; print_r($data); die;*/
            foreach ($data['idAttr'] as $key => $attr) {
                ProductsAttribute::where(['prod_attrib_id'=>$data['idAttr'][$key]])->update(['price'=>$data['price'][$key], 'stock'=>$data['stock'][$key]]);
            }
        }
        return redirect()->back()->with('flash_message_success', 'Product attribute updated succesfuly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($prod_attrib_id){
        if(!empty($prod_attrib_id)){
            ProductsAttribute::where(['prod_attrib_id' => $prod_attrib_id])->delete();
            return redirect()->back()->with('flash_message_success', 'Product attribute has been deleted succesfuly.');
        }
    }
}
