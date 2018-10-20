<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input; // for uploading files files
use App\Product;
use App\ProductsImage;
use Image;

class ProductImagesController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $product_id)
    {
        $productDetails = Product::with('productImages')->where(['product_id'=>$product_id])->first();      
        /*function 'productImages' : it is come from Product model */
        
        return view("backend_views.modules.products.add_images_page")->with(compact('productDetails'));
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
            /*echo "<pre>"; print_r($data); die;*/

            if($request->hasFile('prod_image')){
                $files=$request->file('prod_image');
                /*echo "<pre>"; print_r($files); die;*/

                foreach ($files as $file) {
                    $files=$request->file('prod_image');

                        $prod_image = new ProductsImage;
                        $extension = $file->getClientOriginalExtension();
                        $fileName = rand(111,99999).'.'.$extension;
                          
                        $large_image_path = 'backend_assets/images/products/large'.'/'.$fileName;
                        $medium_image_path = 'backend_assets/images/products/medium'.'/'.$fileName;  
                        $small_image_path = 'backend_assets/images/products/small'.'/'.$fileName; 
                        $thumbnail_image_path = 'backend_assets/images/products/thumbnail'.'/'.$fileName;  

                        // Stretch the image but still maintain the ratio.
                        // Resize Images
                        Image::make($file)->resize(1200, 1200, function ($constraint) {
                        $constraint->aspectRatio();
                        })->save($large_image_path);

                        Image::make($file)->resize(600, 600, function ($constraint) {
                        $constraint->aspectRatio();
                        })->save($medium_image_path);

                        Image::make($file)->resize(300, 300, function ($constraint) {
                        $constraint->aspectRatio();
                        })->save($small_image_path);

                        Image::make($file)->resize(40, 40, function ($constraint) {
                        $constraint->aspectRatio();
                        })->save($thumbnail_image_path);

                        // Stretch the image to be fit to your declared dimension
                        /*Image::make($image_tmp)->resize(1200, 1200)->save($large_image_path);
                        Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
                        Image::make($image_tmp)->resize(300, 300)->save($small_image_path);*/

                        // Store image name in products table
                        $prod_image->prod_image = $fileName;
                        $prod_image->product_id = $data['product_id'];
                        $prod_image->save();                    
                }

            }
            // 2nd way to redirect
            /*return redirect('/admin/index-product-images/'.$data['product_id'])->with('flash_message_success', 'Product images insert successfully.');*/

            return redirect()->back()->with('flash_message_success', 'Product images insert successfully.');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($prod_image_id)
    {
         // get product image name
        $productImage = ProductsImage::where(['prod_image_id' => $prod_image_id])->first();
        /*echo $productImage->prod_image; die;*/

        // get product image path
        $large_image_path = 'backend_assets/images/products/large/';
        $medium_image_path = 'backend_assets/images/products/medium/';  
        $small_image_path = 'backend_assets/images/products/small/'; 
        $thumbnail_image_path = 'backend_assets/images/products/thumbnail/';

        // delete large image if not exists in folder
        if (file_exists($large_image_path.$productImage->prod_image)) {
            unlink($large_image_path.$productImage->prod_image);
        }
        // delete medium image if not exists in folder
        if (file_exists($medium_image_path.$productImage->prod_image)) {
            unlink($medium_image_path.$productImage->prod_image);
        }
        // delete small image if not exists in folder
        if (file_exists($small_image_path.$productImage->prod_image)) {
            unlink($small_image_path.$productImage->prod_image);
        }
        // delete thumbnail image if not exists in folder
        if (file_exists($thumbnail_image_path.$productImage->prod_image)) {
            unlink($thumbnail_image_path.$productImage->prod_image);
        }

        // delete image from products table
        ProductsImage::where(['prod_image_id'=>$prod_image_id])->delete();

        // use it if you want to delete image but intended to update
        /*ProductsImage::where(['prod_image_id'=>$prod_image_id])->update(['prod_image'=>'']);*/
        return redirect()->back()->with('flash_message_success', 'Product Image has been deleted succesfuly.');
    }
}
