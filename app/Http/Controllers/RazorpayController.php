<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Redirect;

class RazorpayController extends Controller
{

    public function payment(Request $request)
    {
        $input = $request->all();
        $razorpay_credentials = DB::table('sma_settings')
            ->select('razorpay_key_id','razorpay_key_secrate')
            ->where('setting_id',1)
            ->first();
        $api = new Api($razorpay_credentials->razorpay_key_id, $razorpay_credentials->razorpay_key_secrate);

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));

            } catch (\Exception $e) {
                return  $e->getMessage();
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }

        \Session::put('flash_success', 'Payment successful');
        return redirect()->back();
    }
}
