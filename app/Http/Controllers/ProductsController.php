<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

use App\Models\Manufacturer;

use App\Models\PrdCategory;

use Illuminate\Support\Facades\File;
use Carbon\Carbon;



class ProductsController extends Controller
{
    public function products(){
        $category = new PrdCategory();
        $manufacturer = new Manufacturer();
        $products = new Products();
        // $data = $data->orderBy('id','desc')->first();
        // dd($data);
        $products = $products->orderBy('id','desc')->get();
        // dd($products);
        $category = $category->getAllData();
        $manufacturer = $manufacturer->getAllData();
        return view('admin.products',[
            'category' => $category,
            'manufacturer' => $manufacturer,
            'products' => $products,
        ]);
    }
    public function add_product(Request $rq){
        // $data = $rq->all();

        $data = new Products();

        $data = $data->orderBy('id','desc')->first();
        if($data == null){
            $id = 1;
        }else{
            $id = $data->id+1;
        }
        if(!file_exists(PUBLIC_PATH('image/admin/products/product'.$id))){
            File::makeDirectory(public_path('image/admin/products/product'.$id));
        }
        $path = public_path('image/admin/products/product'.$id);
        $image = $rq->thumbnail;
        if(isset($image)){
            $image = $image -> getClientOriginalName();
            $file = $rq -> file('thumbnail');
            $extension = $rq->file('thumbnail')->getClientOriginalExtension();
            $filename = time().'_'.$image.'_'.rand(0,99999).'.'.$extension;
            $file -> move($path,$filename);
            $filepath = $path.'/'.$filename;
            $check = getimagesize($filepath);
            if($check == false){
                File::delete($filepath);
                return redirect()->back()->with('msgerr','file upload không phải ảnh');
            }
        }else{
            $filename = "";
        }
        $product = new Products();
        $product->id = $id;
        $product->thumbnail = $filename;
        $product->sku = $rq->sku;
        $product->name = $rq->name;
        $product->category_id = $rq->category_id;
        $product->manufacturer_id = $rq->manufacturer_id;
        $product->ram = $rq->ram;
        $product->rom = join(",",$rq->rom);
        $product->import_price = $rq->import_price;
        $product->sale_price = $rq->sale_price;
        $product->discount = $rq->discount;
        $product->quantity = $rq->quantity;
        $product->specifications = $rq->specifications;
        $product->description = $rq->description;
        // dd($product);
        $product->save();
        return redirect()->back()->with('msgss','Thêm sản phẩm mới thành công !!!');


    }
    public function image_product_upload(Request $request){
        $data = new Products();
        $data = $data->orderBy('id','desc')->first();
        if($data == null){
            $id = 1;
        }else{
            $id = $data->id+1;
        }
        if(!file_exists(PUBLIC_PATH('image/admin/products/product'.$id))){
            File::makeDirectory(public_path('image/admin/products/product'.$id));
        }
        if ($request->hasFile('upload')) {
            $uploadPath = 'image/admin/products/product'.$id;
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = ($fileName) . '_' . time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $extension;
            $request->file('upload')->move(public_path($uploadPath), $fileName);
            $url = asset($uploadPath . '/' . $fileName);
         }
        return response()->json([
            'url' => $url
        ]);
    }
    public function delete_folder(Request $request){
        $data = new Products();
        $data = $data->orderBy('id','desc')->first();
        if($data == null){
            $id = 1;
        }else{
            $id = $data->id+1;
        }
        if(file_exists(PUBLIC_PATH('image/admin/products/product'.$id))){
            File::deleteDirectory(public_path('image/admin/products/product'.$id));

        }
        return response()->json([
            'id' => $id
        ]);
    }
    public function delete_product(Request $request, $id){
        $product = new Products();
        $product = $product->find($id);
        $filepath = public_path('image/admin/products/product'.$id);
        File::delete($filepath);
        $product->delete();
    return redirect()->back()->with('msgss','Xóa dữ liệu thành công');

    }
    public function process_edit_product(Request $rq,$id){
        $image = $rq->thumbnail;
        $product = new Products();
        $product = $product->find($id);
        $path = public_path('image/admin/products/product'.$id);
        if($image != null){
            $image = $image -> getClientOriginalName();
            $file = $rq -> file('thumbnail');
            $extension = $rq->file('thumbnail')->getClientOriginalExtension();
            $filename = time().'_'.$image.'_'.rand(0,99999).'.'.$extension;
            $file -> move($path,$filename);
            $filepath = $path.'/'.$filename;
            $check = getimagesize($filepath);
            if($check == false){
                File::delete($filepath);
                return redirect()->back()->with('msgerr','file upload không phải ảnh');
            }else{
                $oldThumb = $product->thumbnail;
                File::delete($path.'/'.$oldThumb);
            }
        }else{
            $filename = $product->thumbnail;
        }
        $product->thumbnail = $filename;
        $product->sku = $rq->sku;
        $product->name = $rq->name;
        $product->category_id = $rq->category_id;
        $product->manufacturer_id = $rq->manufacturer_id;
        $product->ram = $rq->ram;
        $product->rom = join(",",$rq->rom);
        $product->import_price = $rq->import_price;
        $product->sale_price = $rq->sale_price;
        $product->discount = $rq->discount;
        $product->quantity = $rq->quantity;
        $product->specifications = $rq->specifications;
        $product->description = $rq->description;
        // dd($product);
        $product->save();
        return redirect()->back()->with('msgss','Cập nhật sản phẩm thành công !!!');


    }
    // product


}
