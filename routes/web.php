<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/template',function(){
    return view('layouts.master');
});
Route::get('/templates',function(){
    return view('temp');
});
Route::middleware(['auth:sanctum'])->group(function(){

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

route::get('/product-list',[ProductController::class,'index'])->name('product-list');
route::get('/product-create',[ProductController::class,'create'])->name('products.create');
} );
