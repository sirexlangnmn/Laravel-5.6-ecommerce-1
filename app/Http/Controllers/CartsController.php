<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\ProductsAttribute;
use App\Product;
use App\Cart;
use App\Coupon;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function addToCart(Request $request)
    {
        Session::forget('sessionCouponAmount');
        Session::forget('sessionCouponTitle');
        Session::forget('sessionCouponCode');

        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/

            if(empty($data['user_email'])){
                $data['user_email'] = '';
            }

            $session_id=Session::get('session_id');
            if(empty($session_id)){
                $session_id = str_random(40);
                Session::put('session_id',$session_id);
            }

            //  related to ProductsController and main.js
            $sizeArr = explode("-",$data['size']);


            // check. Need muna pumili ng size before mag add to cart
            if(empty($sizeArr[1])){
                return redirect()->back()->with('flash_message_error', 'Please, select size first before add to cart.');   
            }



            // check. Kung mas mataas sa stock yun desired quantity ni user.
            /*
            $getProdAttribQty = ProductsAttribute::
            where(['product_id'=>$data['product_id'], 'size'=>$sizeArr[1]])->first();
            */
            $getProdAttribQty = DB::table('products_attributes')
            ->where([
                'product_id'=>$data['product_id'],
                'size'=>$sizeArr[1]
            ])
            ->first();
            /*echo "<pre>"; print_r($getProdAttribQty); die;*/

            if($data['product_quantity'] > $getProdAttribQty->stock){
                return redirect()->back()->with('flash_message_error', 'Your desired quantity is not available right now. Check to the product details the indicated stocks available.');
            }




            // get product attribute ID to save in cart table
            $prodAttribID=ProductsAttribute::select('prod_attrib_id')
            ->where([
                'product_id' =>$data['product_id'],
                'size'       =>$sizeArr[1]
            ])
            ->first();
            /*echo $prodAttribID; die;*/


            // check. To avoid duplication of item in the cart.
            $countProducts=DB::table('carts')
            ->where([
                'product_id' =>$data['product_id'],
                'product_id' =>$data['product_id'],
                'size'       =>$sizeArr[1],
                'user_email' =>$data['user_email'],
                'session_id' =>$session_id
            ])
            ->count();
            /*echo $countProducts; die;*/

            if($countProducts>0){
                return redirect()->back()->with('flash_message_error', 'Product already exists in cart. If you would like to add the same item, you can update the quantity in your cart'); 
            }
            else{

                DB::table('carts')
                ->insert([
                    'product_id'       =>$data['product_id'],
                    'prod_attrib_id'   =>$prodAttribID->prod_attrib_id, 
                    'size'             =>$sizeArr[1],
                    'product_quantity' =>$data['product_quantity'],
                    'user_email'       =>$data['user_email'],
                    'session_id'       =>$session_id
                ]);  

                /*
                $cart = new Cart;
                $cart->product_id       = $data['product_id'];
                $cart->prod_attrib_id   = $prodAttribID->prod_attrib_id;
                $cart->size             = $sizeArr[1];
                $cart->product_quantity = $data['product_quantity'];
                $cart->user_email       = $data['user_email'];
                $cart->session_id       = $session_id;
                $cart->save();
                */
            }
            
            if(empty(Session::get('sessionCouponAmount'))) {
                return redirect(route('cart_route'))->with('flash_message_success', 'Product has been added in Cart. <br /> Friendly reminder. Since you make an update to your cart, we suggest  to re-apply your coupon code to avail again the discount.');     
            }
            
            else {
                return redirect(route('cart_route'))->with('flash_message_success', 'Product has been added in Cart.');
            }
            
            // or use url. 2nd way to return 
            /*return redirect('cart')->with('flash_message_success', 'Product has been added in Cart.');*/
        }
    }


     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cart (Request $request)
    {
        $session_id=Session::get('session_id');

        $userCart=DB::table('carts')
            ->where(['session_id'=>$session_id])
            ->orderBy('cart_id','DESC')
            ->get();
        /*echo "<pre>"; print_r($userCart); die;*/

        // link to the record of product table using product_id under cart table
        foreach ($userCart as $key => $product) {
           /* echo $product->product_id;*/

           // I get this error when I use ->get();
           /*Property [prod_...] does not exist on this collection instance.*/
            $productDetails=Product::where(['product_id'=>$product->product_id])
                ->first();
            $userCart[$key]->category_id = $productDetails->category_id;
            $userCart[$key]->prod_name = $productDetails->prod_name;
            $userCart[$key]->prod_code = $productDetails->prod_code;
            $userCart[$key]->prod_color = $productDetails->prod_color;
            $userCart[$key]->image = $productDetails->prod_image;
        }
        /* echo "<pre>"; print_r($userCart); die;*/

        // link to the record of product attributes table using prod_attrib_id under cart table
        foreach ($userCart as $key => $prodAttrib) {
            $productAttributes=ProductsAttribute::where(['prod_attrib_id'=>$prodAttrib->prod_attrib_id])
                ->first();
            $userCart[$key]->sku = $productAttributes->sku;
            $userCart[$key]->size = $productAttributes->size;
            $userCart[$key]->price = $productAttributes->price;
        }
        
        return view("frontend_views.modules.cart_page")->with(compact('userCart')); 
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateQuantity($cart_id, $quantity)
    {
        // forget coupon code and amount in session
        Session::forget('sessionCouponAmount');
        Session::forget('sessionCouponTitle');
        Session::forget('sessionCouponCode');

        $getCartDetails=DB::table('carts')
            ->where('cart_id',$cart_id)
            ->first();

        $getProdAttribStock=ProductsAttribute::where('prod_attrib_id',$getCartDetails->prod_attrib_id)
            ->where('size',$getCartDetails->size)
            ->first();    

        /*echo $getProdAttribStock->stock;*/
        $updatedQuantity=$getCartDetails->product_quantity+$quantity;
        
        if($getProdAttribStock->stock>=$updatedQuantity){
            DB::table('carts')
                ->where('cart_id',$cart_id)
                ->increment('product_quantity',$quantity);


                if(empty(Session::get('sessionCouponAmount'))) {
                    return redirect(route('cart_route'))->with('flash_message_success', 'Product quantity  in Cart has been updated successfully. <br /> Friendly reminder. Since you make an update to your cart, we suggest  to re-apply your coupon code to avail again the discount.');     
                }
                
                else {
                    return redirect(route('cart_route'))->with('flash_message_success', 'Product quantity  in Cart has been updated successfully.');  
                }         

        }
        else {
            return redirect(route('cart_route'))->with('flash_message_error', 'Requested product quantity  is not available.');
        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cart_id)
    {
        // forget coupon code and amount in session
        Session::forget('sessionCouponAmount');
        Session::forget('sessionCouponTitle');
        Session::forget('sessionCouponCode');

        DB::table('carts')->where('cart_id',$cart_id)->delete();


        if(empty(Session::get('sessionCouponAmount'))) {
            return redirect(route('cart_route'))->with('flash_message_success', 'Product in cart has been deleted. <br /> Friendly reminder. Since you make an update to your cart, we suggest  to re-apply your coupon code to avail again the discount.');     
        }
                
        else {
            return redirect()->back()->with('flash_message_success','Product in cart has been deleted.'); 
        }
    }
}
