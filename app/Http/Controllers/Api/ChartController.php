<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Chart;
class ChartController extends Controller
{
     public function index()
    {
        return Chart::all();
    }

}
