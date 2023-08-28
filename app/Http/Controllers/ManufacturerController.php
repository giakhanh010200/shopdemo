<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Models\Manufacturer;

class ManufacturerController extends Controller
{
  // view manufacturer
  public function view_manufacturer(Request $rq){
    $data = new Manufacturer();
    $data = $data -> getAllData();
    return view('admin.product_manufacturer',[
        'data' => $data,
    ]);
}
// add manufacturer
public function process_add_manu(Request $rq){
    $img = $rq->file('logo');
    $name = $rq->get('name');
    if($img == null || $name == null){
        return redirect()->back()->with('msgerr','Không thể thêm mới vì thiếu dữ liệu');

    }
    $data = new Manufacturer();
    $image = $rq->logo->getClientOriginalName();
    if(isset($image)){
        $file = $rq -> file('logo');
        $filename = $image;
        $file -> move(public_path('image/admin/product_properties/'),$filename);
        $filepath = public_path('image/admin/product_properties/'.$filename);
        $check = getimagesize($filepath);
        if($check == false){
            File::delete($filepath);
            return redirect()->back()->with('msgerr','file upload không phải ảnh');
        }
        $data['logo'] = $filename;
        $data['name'] = $rq->name;
        $data->save();
        return redirect()->back()->with('msgss','thêm nhà sản suất mới thành công');
    }



}
//find manufacturer
public function find_manu(Request $rq, $id){
    $data = new Manufacturer();
    $data = $data->find($id);
    return response()->json($data);

}
// edit manufacturer
public function process_edit_manu(Request $rq, $id){
    $data = new Manufacturer();
    $data = $data->find($id);
    $logo = $rq -> file('logo');
    $name = $rq -> get('name');
    if ($logo == null && $name == null){
        return redirect()->back()->with('msgerr','Không thể sửa vì thiếu dữ liệu');
    }
    if ($logo == null && $name != $data->name){
        $data['name'] = $rq->name;
        $data->save();
        return redirect()->back()->with('msgss','Thay đổi dữ liệu thành công');
    }
    if ($logo == null && $name == $data->name){
        return redirect()->back()->with('msgerr','Dữ liệu không thay đổi');
    }
    if ($logo != null){
        $image = $rq->logo->getClientOriginalName();
        $filename = $image;
        $logo -> move(public_path('image/admin/product_properties/'),$filename);
        $filepath = public_path('image/admin/product_properties/'.$filename);
        $check = getimagesize($filepath);
        if($check == false){
            File::delete($filepath);
            return redirect()->back()->with('msgerr','File upload không phải ảnh, dữ liệu không đổi');
        }else{
            $oldfile = $data->logo;
            $oldfilepath = public_path('image/admin/product_properties/'.$oldfile);
            File::delete($oldfilepath);
        }
        $data['logo'] = $filename;
        $data['name'] = $rq->name;
        $data->save();
        return redirect()->back()->with('msgss','Thay đổi dữ liệu thành công');

    }
}
// del manufacturer
public function process_del_manu(Request $rq, $id){
    $data = new Manufacturer();
    $data = $data->find($id);
    $oldfile = $data->logo;
    $oldfilepath = public_path('image/admin/product_properties/'.$oldfile);
    File::delete($oldfilepath);
    $data->delete();
    return redirect()->back()->with('msgss','Xóa dữ liệu thành công');

}
}
