<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    





    public function sendOTP(Request $request){
        $uid=Auth::guard()->user()->id;
        $six_digit_random_number = mt_rand(100000, 999999);
        //$message = $request->all();
        //$message['otp'] = $six_digit_random_number;
        $data=User::where(['id' => $uid])->first();
        $msg=0;
        if($data){
            $msg=1;
            User::where(['id' => $uid])
                ->update(['otp' => $six_digit_random_number]);
            $tt = Sms::send($data->phone,'sms.otp',['otp' => $six_digit_random_number]); //view->sms.test,
            //print_r($tt);
        }
        return response()->json(array("status" => $msg,'tt'=>$tt));
    }
    
}
