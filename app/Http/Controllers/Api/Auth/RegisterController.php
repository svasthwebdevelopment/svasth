<?php

namespace App\Http\Controllers\Api\Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;


class RegisterController extends Controller
{

    private $client;

    public function __construct(){

    	$this->client = Client::find(1);
    }


  

  //  protected function validator(array $data)
  //   {
  //       return Validator::make($data, [
  //           'name' => 'required|max:15',
  //           'email' => 'required|email|max:255|unique:recruiter_users',
  //          // 'password' => 'required|min:6|confirmed',
  //           'password' => 'required| min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%@]).*$/|confirmed',
          
           
  //       ]);
  //   }


  // protected function create(array $data)
  //   {
  //       $create = User::create([
  //          'name' => $data['company'],
  //           'email' => $data['email'],
  //           'password' => bcrypt($data['password']),
          
            
  //       ]);
  //       //return 

       
  //       return $create;
  //   }



    public function register(Request $request){




     $this-> Validator::make($request, [
            'name' => 'required|max:15',
            'email' => 'required|email|max:255|unique:name,email',
           // 'password' => 'required|min:6|confirmed',
            'password' => 'required|',
          
           
        ]);



        $user = User::create($request,[
           'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
          
            
        ]);


  //      $validate = array(
  //     'name'=>'required|min:3',
  //   'email'=>'required|email|unique:users,email',
  
  //   'password' => 'required|min:6|confirmed'
  // );

  // $messsages = array(


  //   'name.required'=>'You cant leave name field empty',
  //   'email.required' => 'We need to know your e-mail address!',
    
  //   'password.required'=>'The field has to be :min chars long',

  // );

 




  //  return $validator = Validator::make(Input::all(), $validate,$messsages);
 
//   // $messsages = array(
//   //   'email.required'=>'You cant leave Email field empty',
//   //   'name.required'=>'You cant leave name field empty',
//   //     'name.min'=>'The field has to be :min chars long',
//   // );

// // $validator = Validator::make(
// //     array('name' => 'Dayle'),
// //     array('email' => array('required', $messages))
// //      array('password' => array('required', $password))
// // );

    //  $this->validate($request, [
    // 'name' => 'required',
    // 'email' => 'required|email|unique:users,email',
    // 'password' => 'required|min:6|confirmed'
    // 	]);
  
   
    	// $user = User::create([

     //  'name' => request('name'),
     //  'email' => request('email'),
     //    //'mobile' => request('number'),
     //  'password' => bcrypt(request('password'))
      

    	// ]);
      

   $params = [
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
}
