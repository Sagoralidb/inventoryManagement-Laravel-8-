<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReturnProductsController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Redis;

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
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::get('/', function () {
    return view('auth.login');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


Route::get('/template',function(){
    return view('layouts.master');
});
Route::get('/templates',function(){
    return view('temp');
});
Route::get('/logout',[UsersController::class,'logout'])->name('userLogout.admin');

//Authorize Routes
Route::middleware(['auth:sanctum'])->group(function(){

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::resource('users',UsersController::class);
Route::get('/categories',[CategoriesController::class,'index'])->name('category.index');
Route::get('/categories-create',[CategoriesController::class,'create'])->name('category.create');
Route::get('/categories-edit/{id}',[CategoriesController::class,'edit'])->name('category.edit');
Route::put('/categories-update/{id}',[CategoriesController::class,'update'])->name('category.update');
Route::post('/categories-store',[CategoriesController::class,'store'])->name('category.store');
Route::delete('categories-delete/{id}', [CategoriesController::class, 'destroy'])->name('category.delete');

Route::get('/api/categories',[CategoriesController::class,'getCategoriesJson']);

Route::get('/brands',[BrandController::class,'index'])->name('brands.index');
Route::get('/brands-create',[BrandController::class,'create'])->name('brands.create');
Route::get('/brands-edit/{id}',[BrandController::class,'edit'])->name('brands.edit');
Route::put('/brands-update/{id}',[BrandController::class,'update'])->name('brands.update');
Route::post('/brands-store',[BrandController::class,'store'])->name('brands.store');
Route::delete('brands-delete/{id}', [BrandController::class, 'destroy'])->name('brands.delete');
Route::get('/api/brands',[BrandController::class,'getBrandsJson']);

Route::get('/sizes',[SizeController::class,'index'])->name('sizes.index');
Route::get('/sizes-create',[SizeController::class,'create'])->name('sizes.create');
Route::get('/sizes-edit/{id}',[SizeController::class,'edit'])->name('sizes.edit');
Route::put('/sizes-update/{id}',[SizeController::class,'update'])->name('sizes.update');
Route::post('/sizes-store',[SizeController::class,'store'])->name('sizes.store');
Route::delete('sizes-delete/{id}', [SizeController::class, 'destroy'])->name('sizes.delete');
Route::get('/api/sizes',[SizeController::class,'getSizesJson']);

Route::get('/product-list',[ProductController::class,'index'])->name('product-list');
Route::get('/product-create',[ProductController::class,'create'])->name('products.create');
Route::resource('products', ProductController::class);
Route::get('api/products', [ProductController::class,'getProductsJson']);
Route::get('/show-product/{id}',[ProductController::class,'show'])->name('productShow.admin');
Route::delete('/product.delete/{id}',[ProductController::class,'destroy'])->name('product.delete');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('editProduct.Admin');

Route::get('/stocks',[StockController::class,'stock'])->name('stockIn');
Route::post('/stocks',[StockController::class,'stockSubmit'])->name('stockSubmit');
Route::get('/stocks/history',[StockController::class,'history'])->name('stockHistory.admin');

Route::get('/return-product',[ReturnProductsController::class,'returnProduct'])->name('returnProducts.Admin');
Route::post('/return-product',[ReturnProductsController::class,'returnProductSubmit'])->name('returnProductSubmit.Admin');
Route::get('/return-product-history',[ReturnProductsController::class,'history'])->name('returnProductsHistory.admin');
} );
