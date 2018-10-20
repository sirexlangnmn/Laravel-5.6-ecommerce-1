<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input; // for uploading files files
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManager;
use App\Product;
use App\Category;
use App\ProductsAttribute;
use Session;
use Image;
use DB;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$products = Product::orderBy('product_id','DESC')->get();*/
        $products = Product::get();
        foreach($products as $key => $val){
            $category = Category::where(['category_id' => $val->category_id])->first();
            $products[$key]->category = $category->category;
        }
        /*$products = json_decode(json_encode($products));*/
        //echo "<pre>"; print_r($products); die;
        return view("backend_views.modules.products.list_page")->with(compact('products'));           
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // addProduct 
    {
        // categories dropdown start
        $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option selected disabled>Select</option>";
        foreach($categories as $cat){
            $categories_dropdown .= "<option value='". $cat->category_id."'>".$cat->category."</option>";
            $sub_categories = Category::where(['parent_id'=>$cat->category_id])->get();
            foreach($sub_categories as $sub_cat){
                $categories_dropdown .= "<option value='". $sub_cat->category_id."'>&nbsp; --&nbsp;".$sub_cat->category."</option>"; 
            }
        }
        // categories dropdown end
        
        return view('backend_views.modules.products.form_page')->with(compact('categories_dropdown'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            $product = new Product;
            
            // category id
            if(empty($data['category_id'])){
                return redirect()->back()->with('flash_message_error','Under Category is missing.');
            }

            // status
            if(empty($data['status'])){
                $status = 0;
            }
            else{
                $status = 1;
            }

            // description
            if(!empty($data['prod_desc'])){
                $product->prod_desc = $data['prod_desc'];
            }
            else{
                $product->prod_desc = '';
            }

            // material and care
            if(!empty($data['material_and_care'])){
                $product->material_and_care = $data['material_and_care'];
            }
            else{
                $product->material_and_care = '';
            }

            $product->category_id = $data['category_id'];
            $product->prod_name   = $data['prod_name'];
            $product->prod_code   = $data['prod_code'];
            $product->prod_color  = $data['prod_color'];
            $product->prod_price  = $data['prod_price'];
            $product->status      = $status;
            
            //upload files/image
            if($request->hasFile('prod_image')){
                $image_tmp = Input::file('prod_image');
                
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = rand(111,99999).'.'.$extension;
                      
                    $large_image_path = 'backend_assets/images/products/large'.'/'.$fileName;
                    $medium_image_path = 'backend_assets/images/products/medium'.'/'.$fileName;  
                    $small_image_path = 'backend_assets/images/products/small'.'/'.$fileName; 
                    $thumbnail_image_path = 'backend_assets/images/products/thumbnail'.'/'.$fileName;  

                    // Stretch the image but still maintain the ratio.
                    // Resize Images
                    Image::make($image_tmp)->resize(1200, 1200, function ($constraint) {
                    $constraint->aspectRatio();
                    })->save($large_image_path);

                    Image::make($image_tmp)->resize(600, 600, function ($constraint) {
                    $constraint->aspectRatio();
                    })->save($medium_image_path);

                    Image::make($image_tmp)->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                    })->save($small_image_path);

                    Image::make($image_tmp)->resize(40, 40, function ($constraint) {
                    $constraint->aspectRatio();
                    })->save($thumbnail_image_path);

                    // Stretch the image to be fit to your declared dimension
                    /*Image::make($image_tmp)->resize(1200, 1200)->save($large_image_path);
                    Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300, 300)->save($small_image_path);*/

                    // Store image name in products table
                    $product->prod_image = $fileName;

                }
            }

            $product->save();

            return redirect(route('create_product_route'))->with('flash_message_success', 'Product insert successfully');
        }
        return redirect(route('create_product_route'))->with('flash_message_error', 'Product insert failed');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $product_id
     * @return \Illuminate\Http\Response
     */
    public function show($product_id)
    {
        // the responsibilities of fuction show ay ginawa na ni function index,
        // pinalabas na nya ang data sa modal
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $product_id
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id)
    {
        // get all product details
        $product = Product::where(['product_id'=>$product_id])->first();
        
        // categories dropdown start
        $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option selected disabled>Select</option>";
        foreach($categories as $cat){
            if($cat->category_id==$product->category_id){
                $selected = "selected";
            }
            else{
                $selected ="";
            }

            $categories_dropdown .= "<option value='". $cat->category_id."' ".$selected.">".$cat->category."</option>";
            $sub_categories = Category::where(['parent_id'=>$cat->category_id])->get();
            foreach($sub_categories as $sub_cat){
                if($sub_cat->category_id==$product->category_id){
                    $selected = "selected";
                }
                else{
                    $selected ="";
                }
                $categories_dropdown .= "<option value='". $sub_cat->category_id."' ".$selected.">&nbsp; --&nbsp;".$sub_cat->category."</option>"; 
            }
        }
        // categories dropdown end

        /*echo "<pre>"; print_r($product); die;*/

        return view('backend_views.modules.products.form_page')->with(compact('product', 'categories_dropdown'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $product_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "pre"; print_r($data); die;*/

            // status
            if(empty($data['status'])){
                $status = 0;
            }
            else{
                $status = 1;
            }    

            //upload files/image
            if($request->hasFile('prod_image')){
                $image_tmp = Input::file('prod_image');
                
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = rand(111,99999).'.'.$extension;
                    $original_image_path = 'backend_assets/images/products/orginal'.'/'.$fileName;  
                    $large_image_path = 'backend_assets/images/products/large'.'/'.$fileName;
                    $medium_image_path = 'backend_assets/images/products/medium'.'/'.$fileName;  
                    $small_image_path = 'backend_assets/images/products/small'.'/'.$fileName; 
                    $thumbnail_image_path = 'backend_assets/images/products/thumbnail'.'/'.$fileName;  

                    // Stretch the image but still maintain the ratio.
                    // Resize Images
                    Image::make($image_tmp)->resize(1200, 1200, function ($constraint) {
                    $constraint->aspectRatio();
                    })->save($large_image_path);

                    Image::make($image_tmp)->resize(600, 600, function ($constraint) {
                    $constraint->aspectRatio();
                    })->save($medium_image_path);

                    Image::make($image_tmp)->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                    })->save($small_image_path);

                    Image::make($image_tmp)->resize(40, 40, function ($constraint) {
                    $constraint->aspectRatio();
                    })->save($thumbnail_image_path);

                    // Stretch the image to be fit to your declared dimension
                    /*Image::make($image_tmp)->resize(1200, 1200)->save($large_image_path);
                    Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300, 300)->save($small_image_path);*/

                    // Store image name in products table
                    /*$product->prod_image = $fileName;*/

                }
            }
            else{
                $fileName = $data['current_image']; 
            }


            Product::where([ 'product_id' => $product_id ])
            ->update([
                'category_id' => $data['category_id'],
                'prod_name'   => $data['prod_name'],
                'prod_code'   => $data['prod_code'],
                'prod_color'  => $data['prod_color'],
                'prod_desc'   => $data['prod_desc'],
                'material_and_care' => $data['material_and_care'],
                'prod_price'  => $data['prod_price'],
                'prod_image'  => $fileName,
                'status'      => $status
                
            ]);

            return redirect(route('index_product_route'))->with('flash_message_success', 'Product update successfully');
            
        }
        return redirect(route('index_product_route'))->with('flash_message_error', 'Product update failed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $product_id
     * @return \Illuminate\Http\Response
     */
    public function destroyProductImage($product_id)
    { 
        // get product image name
        $productImage = Product::where(['product_id' => $product_id])->first();
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
        Product::where(['product_id'=>$product_id])->update(['prod_image'=>'']);
        return redirect()->back()->with('flash_message_success', 'Product Image has been deleted succesfuly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $product_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        if(!empty($product_id)){
            Product::where(['product_id' => $product_id])->delete();
            return redirect(route('index_product_route'))->with('flash_message_error', 'Product deleted succesfully.');
        }
        /* 2nd way of delete
        $products = Product::find($product_id);
        $products->delete();
        return redirect()->route('index_product_route')->with('flash_message_error', 'Product deleted succesfuly.');
        */
    }

    

    public function products($url){
        /* echo $url; die; */

        $categoryDetails = Category::where(['url'=>$url])->first();
        /* echo $categoryDetails; die; */

        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        /*$categories = json_decode(json_encode($categories));
        echo "<pre>"; print_r($categories);*/

        // show 404 page if category URL does not exist
        $countCatergories = Category::where(['url' => $url, 'status'=>1])->count();

        if($countCatergories == 0){
            abort(404);
        }

        if($categoryDetails->parent_id == 0){

            // I am trying to solve if the product used the main category.
            // Usually in the tutorial, they used only the sub category.
             /*if($categoryDetails->parent_id == $categoryDetails->parent_id){

                $mainCategories = Category::where(['parent_id' => $categoryDetails->parent_id])->get();
                foreach ($mainCategories as $maincat) {
                    $maincat_ids[] = $maincat->category_id;
                }
                $productsAll = Product::whereIn('category_id', $maincat_ids)->get();
            }
            else{
                $subCategories = Category::where(['parent_id' => $categoryDetails->category_id])->get();
                foreach ($subCategories as $subcat) {
                    $cat_ids[] = $subcat->category_id;
                  /*print_r($cat_ids); die;
                }
                $productsAll = Product::whereIn('category_id', $cat_ids)->get();
                /*$productsAll = json_decode(json_encode($productsAll));
                echo "<pre>"; print_r($productsAll); die; 
            }*/

            // if url is main category url
            $subCategories = Category::where(['parent_id' => $categoryDetails->category_id])->get();
            foreach ($subCategories as $subcat) {
                $cat_ids[] = $subcat->category_id;
            }
            /*print_r($cat_ids); die;*/
            $productsAll = Product::whereIn('category_id', $cat_ids)->where('status',1)->get();
            /*$productsAll = json_decode(json_encode($productsAll));
            echo "<pre>"; print_r($productsAll); die; */
        }
        else{
            // if url is sub category url
            $productsAll = Product::where(['category_id' => $categoryDetails->category_id])->where('status',1)->get();
            /*$productsAll = json_decode(json_encode($productsAll));
            echo "<pre>"; print_r($productsAll); die;  */
        }

        /*$categories = Category::with('categories')->where(['parent_id'=>0])->get();*/
        /* $categories = json_decode(json_encode($categories));
        echo "<pre>"; print_r($categories); die; */

        /*$productsAll = Product::where(['category_id' => $categoryDetails->category_id])->get();*/
        /* $productsAll = json_decode(json_encode($productsAll));
        echo "<pre>"; print_r($productsAll); die; */

        return view('frontend_views.modules.listing_page')->with(compact('categoryDetails', 'categories', 'productsAll')); 
    }


    public function productDetails($product_id){

        // show 404 page if product is disabled
        $productsCount=Product::where(['product_id'=>$product_id,'status'=>1])->count();
        if($productsCount==0){
            abort(404);
        } 

        //get product details
        $productDetails=Product::with('attributes', 'productImages')->where(['product_id'=>$product_id])->first();
        /*$productDetails = json_decode(json_encode($productDetails));
        echo "<pre>"; print_r($productDetails); die; */

        // actually naka include/with na ito sa $productDetails.
        // pero tinawag ko pa din ang attributes para sa variables ng add to cart. 
        /*$productAttributes=ProductsAttribute::where(['product_id'=>$product_id])->first();*/

        $relatedProducts=Product::where('product_id','!=',$product_id)->where(['category_id'=>$productDetails->category_id])->where('status',1)->get();
         /*$relatedProducts=json_decode(json_encode($relatedProducts));
        echo "<pre>"; print_r($relatedProducts); die; */

        $categories=Category::with('categories')->where(['parent_id'=>0])->get();
        
        $totalStock=ProductsAttribute::where(['product_id'=>$product_id])->sum('stock');

        return view('frontend_views.modules.product_details')->with(compact('productDetails', 'categories', 'totalStock', 'relatedProducts'));
    }


    public function getProductPrice(Request $request){
        /*main.js*/
        $data = $request->all();
        /*echo "<pre>"; print_r($data); die;*/

        $proArr = explode("-",$data['idSize']);
        /*echo $proArr[0]; echo $proArr[1]; die;*/

        $proAttr = ProductsAttribute::where(['product_id'=> $proArr[0], 'size'=>$proArr[1]])->first();
        echo $proAttr->price;
        echo "#";
        echo $proAttr->stock;
    }


     
    









}