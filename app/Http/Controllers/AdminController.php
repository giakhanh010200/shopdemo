<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function login(){
        if(session()->has('admin_id')){
            return view('admin.dashboard');
        }else{
        return view('admin.login');
        }
    }
    public function progress_login(Request $request){
        // $username = $request->get('username');
        // $password = $request->get('password');
        // $admin = new Admin();
        // $admin->name=$username;
        // $admin->email = $username;
        // $admin = $admin->check_login();
        // if(!empty($admin)){
        //     $check = Hash::check($password,$admin[0]->password);
        // }
        // if (empty($admin)){
        //     $msg = "Sai tài khoản/email";
        //     return redirect()->back()->with('msg',$msg);
        // }else if($check == false){
        //     $msg = "Sai mật khẩu";
        //     return redirect()->back()->with('msg',$msg);
        // }
        // else{
        //     $request->session()->put('admin_id',$admin[0]->id);
        //     $request->session()->put('admin_name',$admin[0]->name);
        //     $request->session()->put('admin_email',$admin[0]->email);
        //     $request->session()->put('admin_per[]',$admin[0]->permissions);
        //     return redirect()->route('admin.dashboard');
        // }
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt([
            'name'=> $request->input('username'),
            'password'=> $request->input('password')
        ])){
            $request->session()->put('admin_id',Auth::id());
            $request->session()->put('admin_name',Auth::user()->name);
            $request->session()->put('admin_email',Auth::user()->email);
            $request->session()->put('admin_permission',Auth::user()->permissions);
            return redirect()->route('admin.dashboard');

        }
        return redirect()->back()->with('msg','Sai tên đăng nhập hoặc mật khẩu');
    }
    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect()->route('admin/login');
    }
    public function dashboard(Request $request){
        return view('admin.dashboard');
    }

    public function chart(Request $request){
        return view('admin.chart');
    }

    public function admin_page(Request $request){
        return view('admin.admin_page');
    }
}
