<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;

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
/* Front Routes */
Route::get('/home',[BaseController::class,'home']);
Route::get('/detailView/{id}',[BaseController::class,'detailView'])->name('detailView');
Route::get('cart',[BaseController::class,'cart'])->name('cart');
Route::get('/user/login',[BaseController::class,'userLogin'])->name('userLogin');
Route::post('/user/login',[BaseController::class,'loginCheck'])->name('loginCheck');
Route::post('/user/register',[BaseController::class,'user_store'])->name('user_store');


/* Admin login */
Route::get('/admin/login',[AdminController::class,'login'])->name('admin.login');
Route::post('/admin/login',[AdminController::class,'makeLogin'])->name('admin.makeLogin');

/* Cart Route */
Route::post('cart/store',[CartController::class,'store'])->name('cart.store');


Route::group(['middleware'=>'auth'],function(){
    Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    /* Category Routes */
    Route::get('/category/addCategory',[CategoryController::class,'create'])->name('category.create');
    Route::post('/category/addCategory',[CategoryController::class,'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class,'edit'])->name('category.edit');
     Route::post('/category/update/{id}', [CategoryController::class,'update'])->name('category.update');
     Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');

     /* Sub Category Routes */
     Route::get('/subCategory/addSub',[SubCategoryController::class,'show'])->name('subCategory.show');
     Route::post('/subCategory/addSub',[SubCategoryController::class,'insert'])->name('subCategory.store');
     Route::get('/subCategory/editSub/{id}', [SubCategoryController::class,'edit'])->name('subCategory.editSub');
     Route::post('/subCategory/updateSub/{id}', [SubCategoryController::class,'update'])->name('subCategory.updateSub');
     Route::get('/subCategory/deleteSub/{id}',[SubCategoryController::class,'delete'])->name('subCategory.deleteSub');

     /* Product Route */
     Route::get('/product/index',[ProductController::class,'index'])->name('product.list');
     Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
     Route::post('/product/create',[ProductController::class,'store'])->name('product.store');
     Route::get('/product/editPro/{id}',[ProductController::class,'edit'])->name('product.editPro');
     Route::post('/product/edit/{id}', [ProductController::class,'update'])->name('product.updatePro');
     Route::get('/product/deletePro/{id}',[ProductController::class,'delete'])->name('product.deletePro');

     /* product Details */
     Route::get('/product/details/{id}',[ProductController::class,'extraDetails'])->name('product.extraDetails');
     Route::post('/product/details/{id}',[ProductController::class,'extraDetailsStore'])->name('product.extraDetailsStore');

     Route::get('/admin/user',[UserController::class,'index'])->name('admin.user');
     Route::get('/admin/delete',[UserController::class,'delete'])->name('user.delete');
});
