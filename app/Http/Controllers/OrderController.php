<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function sendOrder(Request $request){
        
        dd($request);
    }
}
