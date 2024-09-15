<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

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
    public function store() {

    }
    public function edit() {

    }
    public function update() {

    }
    public function destroy() {

    }
}
