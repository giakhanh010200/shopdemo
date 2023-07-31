<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function promotion_code(Request $request){
        return view('admin.promotion_code');
    }
    public function user_page(Request $request){
        return view('admin.user_page');
    }
}
