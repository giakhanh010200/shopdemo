<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function image_blog_upload(Request $request){

    }
    public function blogs(Request $request){
        return view('admin.blog');
    }
    public function blog_category(Request $request){
        return view('admin.blog_category');
    }
}
