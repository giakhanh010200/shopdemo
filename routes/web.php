<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\PrdCategoryController;
use App\Http\Controllers\ManufacturerController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin/login',[AdminController::class,'login'])->name('admin/login');
Route::post('admin.progress_login',[AdminController::class,'progress_login'])->name('admin.progress_login');
Route::middleware(['CheckAdminLogin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });
    Route::get('logout',[AdminController::class,'logout'])->name('logout');

    Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::post('image_blog_upload',[BlogController::class,'image_blog_upload'])->name('image_blog_upload');

    Route::get('chart',[AdminController::class,'chart'])->name('chart');

    Route::get('cart',[CartsController::class,'cart'])->name('cart');

    Route::get('payment_methods',[CartsController::class,'payment_methods'])->name('payment_methods');

    Route::get('promotion_code',[UserController::class,'promotion_code'])->name('promotion_code');

    Route::get('blogs',[BlogController::class,'blogs'])->name('blogs');

    Route::get('blog_category',[BlogController::class,'blog_category'])->name('blog_category');

    Route::get('admin_page',[AdminController::class,'admin_page'])->name('admin_page');

    Route::get('user_page',[UserController::class,'user_page'])->name('user_page');

    Route::get('products',[ProductsController::class,'products'])->name('products');
    Route::post('add_product',[ProductsController::class,'add_product'])->name('add_product');
    Route::post('image_product_upload',[ProductsController::class,'image_product_upload'])->name('image_product_upload');
    Route::get('delete_folder',[ProductsController::class,'delete_folder'])->name('delete_folder');
    Route::put('process_edit_product/{id}',[ProductsController::class,'process_edit_product'])->name('process_edit_product');
    Route::delete('delete_product/{id}',[ProductsController::class,'delete_product'])->name('delete_product');

    Route::get('find_manu/{id}',[ManufacturerController::class,'find_manu'])->name('find_manu');
    Route::get('view_manufacturer',[ManufacturerController::class,'view_manufacturer'])->name('view_manufacturer');
    Route::post('process_add_manu',[ManufacturerController::class,'process_add_manu'])->name('process_add_manu');
    Route::put('process_edit_manu/{id}',[ManufacturerController::class,'process_edit_manu'])->name('process_edit_manu');
    Route::delete('process_del_manu/{id}',[ManufacturerController::class,'process_del_manu'])->name('process_del_manu');

    Route::get('find_cate/{id}',[PrdCategoryController::class,'find_cate'])->name('find_cate');
    Route::get('view_category',[PrdCategoryController::class,'view_category'])->name('view_category');
    Route::post('process_add_cate',[PrdCategoryController::class,'process_add_cate'])->name('process_add_cate');
    Route::put('process_edit_cate/{id}',[PrdCategoryController::class,'process_edit_cate'])->name('process_edit_cate');
    Route::delete('process_del_cate/{id}',[PrdCategoryController::class,'process_del_cate'])->name('process_del_cate');


});
