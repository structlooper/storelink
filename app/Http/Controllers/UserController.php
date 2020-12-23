<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class UserController extends Controller
{
    //
    public function checkout(Request $request){
        $dom['user_address'] = DB::table('sma_user_address')
            ->where('user_id',Session::get('user_data')['user_id'])
            ->get();
        $cart_id = DB::table('sma_user_cart')
            ->select('cart_id')
            ->where('user_id',Session::get('user_data')['user_id'])
            ->where('cart_status',"ADDED")
            ->first();
        $check_cart = DB::table('sma_user_cart_products')
            ->where('cart_id',$cart_id->cart_id)
            ->get();
        $dom['razorpay_credentials'] = DB::table('sma_settings')
            ->select('razorpay_key_id','razorpay_key_secrate')
            ->where('setting_id',1)
            ->first();
        if (sizeof($check_cart) >0) {
            return view('checkout')->with($dom);
        }else{
            return redirect('/')->with('error','Cart is empty please add item');
        }
    }
    public function profile(){
        $dom['user_details'] = DB::table('sma_users')
            ->where('id',Session::get('user_data')['user_id'])
            ->first();
        return view('user.profile')->with($dom);
    }
    public function address(){
        $dom['user_address'] = DB::table('sma_user_address')
            ->where('user_id',Session::get('user_data')['user_id'])
            ->get()->toArray();
        return view('user.address')->with($dom);
    }
    public function add_address(){
        return view('user.add_address');
    }
    public function update_address($address_id){
        $dom['user_address'] = DB::table('sma_user_address')
            ->where('address_id',$address_id)
            ->first();
        return view('user.edit_address')->with($dom);
    }
    public function orders(){
        $dom['user_orders'] = array_reverse(DB::table('sma_sales')
            ->join('sma_user_address','sma_user_address.address_id','=','sma_sales.address_id')
            ->where('sma_sales.customer_id',Session::get('user_data')['user_id'])
            ->get()->toArray());
        return view('user.orders')->with($dom);
    }
    public function order_details(Request $request){
        $order_products = DB::table('sma_sale_items')

            ->join('sma_products','sma_products.id','=','sma_sale_items.product_id')
            ->join('sma_units','sma_products.unit','=','sma_units.id')
            ->select(
                'sma_products.id',
                'sma_products.image',
                'sma_products.name',
                'sma_units.name as unit',
                'sma_products.cost',
                'sma_products.price',
                'sma_sale_items.quantity as qty',
                'sma_sale_items.tax'
            )
            ->where('sma_sale_items.sale_id',$request->order_id)

            ->get()->toArray();
        return ['status' => true,'msg' => 'ordered products','data' => $order_products];
    }
}
