<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrdCategory;
class PrdCategoryController extends Controller
{
     // view category
     public function view_category(Request $rq){
        $data = new PrdCategory();
        $data = $data -> getAllData();
        // $data = $data->orderBy('id','desc')->first();
        return view('admin.product_category',[
            'data' => $data,
        ]);
    }
    //find category
    public function find_cate(Request $rq, $id){
        $data = new PrdCategory();
        $data = $data->find($id);
        return response()->json($data);

    }
     // add category
     public function process_add_cate(Request $rq){
        $name = $rq->input('name');
        if($name == null){
            return redirect()->back()->with('msgerr','Không thể thêm mới vì thiếu dữ liệu');
        }
        $data= new PrdCategory();
        $input = $rq->all();
        $data->create($input);
        return redirect()->back()->with('msgss','Thêm dữ liệu mới thành công');
    }
    // edit category
    public function process_edit_cate(Request $rq, $id){
        $name = $rq->input('name');
        if($name == null){
            return redirect()->back()->with('msgerr','Không thể thêm mới vì thiếu dữ liệu');
        }
        $data = new PrdCategory();
        $data = $data->find($id);
        $input = $rq->all();
        $data->fill($input)->save();
        return redirect()->back()->with('msgss','Sửa dữ liệu thành công');

    }
    // del category
    public function process_del_cate(Request $rq,$id){
        $data = new PrdCategory();
        $data = $data->find($id);
        $data->delete();
        return redirect()->back()->with('msgss','Xóa dữ liệu thành công');

    }
}
