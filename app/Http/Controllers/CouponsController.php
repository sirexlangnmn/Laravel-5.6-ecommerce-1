<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use App\ProductsAttribute;
use DB;
use Session;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $coupons = Coupon::get();
        return view("backend_views.modules.coupons.list_page")->with(compact('coupons')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend_views.modules.coupons.form_page');
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
            $data = $request->All();
            /*echo "<pre>"; print_r($data); die;*/

            $random_code = str_random(50);

            // status
            if(empty($data['status'])){
                $status = 0;
            }
            else{
                $status = 1;
            }

            $coupon = new Coupon;
            $coupon->coupon_title = $data['coupon_title'];
            $coupon->coupon_code  = $random_code;
            $coupon->amount       = $data['amount'];
            $coupon->amount_type  = $data['amount_type'];
            $coupon->expiry_date  = $data['expiry_date'];
            $coupon->status       = $status;
            $coupon->save();

            return redirect(route('createCoupons_route'))->with('flash_message_success', 'Coupon insert successfully');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($coupon_id)
    {
        /*$coupons=Coupon::where(['coupon_id'=>$coupon_id])->first();*/
        $coupons=Coupon::find($coupon_id);
        return view('backend_views.modules.coupons.form_page')->with(compact('coupons'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($coupon_id)
    {
        /*$coupons=Coupon::where(['coupon_id'=>$coupon_id])->first();*/
        $coupons=Coupon::find($coupon_id);

        return view('backend_views.modules.coupons.form_page')->with(compact('coupons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $coupon_id)
    {
        if($request->isMethod('post')){
            $data = $request->All();
           /* echo "<pre>"; print_r($data); die;*/

            /*$coupon=Coupon::find($coupon_id);*/
            /*echo "<pre>"; print_r($coupon); die;*/
            
            // status
            if(empty($data['status'])){
                $status = 0;
            }
            else{
                $status = 1;
            }

            /*$coupon->coupon_code = $data['coupon_code'];
            $coupon->amount      = $data['amount'];
            $coupon->amount_type = $data['amount_type'];
            $coupon->expiry_date = $data['expiry_date'];
            $coupon->status      = $status;
            $coupon->save();*/

            Coupon::where([ 'coupon_id' => $coupon_id ])
            ->update([
                'coupon_title' => $data['coupon_title'],
                'amount'       => $data['amount'],
                'amount_type'  => $data['amount_type'], 
                'expiry_date'  => $data['expiry_date'],
                'status'       => $status
            ]);

            return redirect(route('createCoupons_route'))->with('flash_message_success', 'Coupon update successfully');

        }
    }

    /**
     * Application of coupon/resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function applyCoupon(Request $request)
    {
        // forget coupon code and amount in session
        // share this also to CartsController updateQuantity and destroy.
        // Every time they update the quantity, add new item, or delete item
        // from the cart they have to reapply the coupon
        Session::forget('sessionCouponAmount');
        Session::forget('sessionCouponTitle');
        Session::forget('sessionCouponCode');

        $data = $request->All();
        /*echo "<pre>"; print_r($data); die;*/

        // check if coupun exist
        /*$couponCount = Coupon::
        where(['coupon_title'=>$data['coupon_title'], 'coupon_code'=>$data['coupon_code']])
        ->count();*/

        $couponCount = DB::table('coupons')
        ->where(['coupon_title'=>$data['coupon_title'], 'coupon_code'=>$data['coupon_code']])
        ->count();
        
        if($couponCount == 0){
            return redirect()->back()->with('flash_message_error', 'This coupon does not exists.');
        }    
        else{

            // check coupon status
            
            /*$couponDetails = Coupon::
            where(['coupon_title'=>$data['coupon_title'], 'coupon_code'=>$data['coupon_code']])
            ->first();*/

            $couponDetails = DB::table('coupons')
            ->where(['coupon_title'=>$data['coupon_title'], 'coupon_code'=>$data['coupon_code']])
            ->first();

            if($couponDetails->status == 0){
                return redirect()->back()->with('flash_message_error', 'This coupon is no longer available.');
            }   


            // check coupon expiry date
            $expiry_date = $couponDetails->expiry_date;
            $current_date = date('Y-m-d');

            if($expiry_date < $current_date){
                return redirect()->back()->with('flash_message_error', 'This coupon is expired.');   
            }


            // Coupon Valid for discount

            // Get total amount in Cart table
            $session_id=Session::get('session_id');

            $userCart = DB::table('carts')
            ->where('session_id',$session_id)
            ->get();

            // link to the record of product attributes table using prod_attrib_id under cart table
            foreach ($userCart as $key => $prodAttrib) {
                /*$productAttributes=ProductsAttribute::where(['prod_attrib_id'=>$prodAttrib->prod_attrib_id])
                    ->first();
                */

                $productAttributes = DB::table('products_attributes')
                ->where('prod_attrib_id',$prodAttrib->prod_attrib_id)
                ->first();
                
                $userCart[$key]->price = $productAttributes->price;
            }

            $total_amount = 0;
            foreach ($userCart as $item) {
                $total_amount = $total_amount + ($item->price * $item->product_quantity);
            }

            // check if amount is fixed or percentage
            if($couponDetails->amount_type == "Fixed"){
                $couponAmount = $couponDetails->amount;
            }
            else{
                $couponAmount = $total_amount * ($couponDetails->amount/100);
            }

            /*echo "<pre>"; print_r($total_amount);
            echo "<pre>"; print_r($couponDetails->amount_type);
            echo "<pre>"; print_r($couponAmount); 
            echo "<pre>"; print_r($data['coupon_title']); 
            echo "<pre>"; print_r($data['coupon_code']); die;*/

            // add coupon code and amount in session
            Session::put('sessionCouponAmount',$couponAmount);
            Session::put('sessionCouponTitle',$data['coupon_title']);
            Session::put('sessionCouponCode',$data['coupon_code']);


            return redirect()->back()->with('flash_message_success', 'Coupon code successfully applied. You are availing discount.'); 

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($coupon_id)
    {
         if(!empty($coupon_id)){
            Coupon::where(['coupon_id' => $coupon_id])->delete();
            return redirect(route('indexCoupons_route'))->with('flash_message_error', 'Coupon deleted succesfuly.');
        }
    }
}
