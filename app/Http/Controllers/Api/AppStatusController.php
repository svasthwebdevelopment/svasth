<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AppStatus;
class AppStatusController extends Controller
{
 public function index()
    {
        return AppStatus::all();
        //return AppStatus::all()->toJson();
      }   

}
