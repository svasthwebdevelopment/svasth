<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Route;
use Softon\Sms\Facades\Sms;

class RegisterController extends Controller
{

     private $client;

    public function __construct(){

      $this->client = Client::find(1);
      // $this->user_id = User::fid(1);
    }




    public function register(Request $request){


      $this->validate($request, [
    'name' => 'required',
    'email' => 'required|email|unique:users,email',
    
    'password' => 'required|min:6|confirmed'
      ]);

            
   
      $user = User::create([

      'name' => request('name'),
      'email' => request('email'),
      
      'password' => bcrypt(request('password'))
      ]);
      

   $params = [
     'user_id' => $user->id,
     'grant_type' => 'password',
     'client_id' => $this->client->id,
     'client_secret' => $this->client->secret,
     'username' => request('email'),
     'password' => request('password'),
     'scope' => '*'

   ];


   $request->request->add($params);

   $proxy = Request::create('oauth/token','POST');

   return Route::dispatch($proxy);




    }




      public function sendOTP(Request $request){

         $uid=$request['mobile'];
        $six_digit_random_number = mt_rand(100000, 999999);
        //$message = $request->all();
        //$message['otp'] = $six_digit_random_number;
        $data=User::where(['mobile' => $uid])->first();
        $msg=0;
        if($data){
            $msg=1;
            User::where(['mobile' => $uid])
                ->update(['otp' => $six_digit_random_number]);
            $tt = Sms::send($data->phone,'sms.otp',['otp' => $six_digit_random_number]); //view->sms.test,
            //print_r($tt);
        }else{
              User::where(['mobile' => $uid])
                ->update(['otp' => $six_digit_random_number]);


        }
        return Route::dispatch(array("status" => $msg,'tt'=>$tt));
        // return response()->json(array("status" => $msg,'tt'=>$tt));
    }


}
