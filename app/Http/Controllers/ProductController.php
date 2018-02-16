<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\products;

class ProductController extends Controller
{
     public function index()
    {
       return products::all();
    }
}
