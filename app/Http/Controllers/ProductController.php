<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index() {
        $products = Product::orderby('created_at','DESC')->get();

        $data['products'] = $products;
        return view('products.index',$data);
    }
    public function create() {
        return view('products.create');
    }
    public function store(Request $request) {
        // return $request->all();
        $validator = Validator::make($request->all(),[
                "category_id"    => 'required|numeric',
                "brands_id"      => 'required|numeric',
                "sku"            => 'required|string|max:200|unique:products',
                "name"           => 'required|string|min:2|max:200',
                "image"          => 'required|image|mimes: jpeg,jpg,png|max:1024',
               " cost_price"     => 'required|numeric',
                "retail_price"   => 'required|numeric',
                "year"           => 'required',
                "description"    => 'required|max:200',
                "status"         => 'required|numeric'
            ]);

            if($validator->fails()){
             return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ],\Illuminate\Http\Response::HTTP_UNPROCESSABLE_ENTITY);
            }
    }
    public function edit() {

    }
    public function update() {

    }
    public function destroy() {

    }
}
