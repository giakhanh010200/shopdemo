<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function cart(Request $request){
        return view('admin.cart');
    }
    public function payment_methods(Request $request){
        return view('admin.payment_methods');
    }
}
