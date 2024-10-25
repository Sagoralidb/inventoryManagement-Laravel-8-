<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductSizeStock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
Use Illuminate\Support\Str;
Use Illuminate\Http\Response;
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
                "brand_id"      => 'required|numeric',
                "sku"            => 'required|string|max:200|unique:products',
                "name"           => 'required|string|min:2|max:200',
                "image"          => 'required|image|mimes: jpeg,jpg,png|max:1024',
                "cost_price"     => 'required|numeric',
                "retail_price"   => 'required|numeric',
                "year"           => 'required',
                "description"    => 'required|max:200',
                "status"         => 'required|numeric'
            ]);

            if($validator->fails()){
             return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        // // Store product
        $product = new Product();
        $product->user_id       = Auth::id();
        $product->category_id   = $request->category_id;
        $product->brand_id      = $request->brand_id;
        $product->sku           = $request->sku;
        $product->name          = $request->name;
        $product->cost_price    = $request->cost_price;
        $product->retail_price  = $request->retail_price;
        $product->year          = $request->year;
        $product->description   = $request->description;
        $product->year          = $request->year;
        $product->status        = $request->status;
        //Upload image
        if($request->hasFile('image')) {
            $image = $request->image;
            $name = Str::random(60). '.'.$image->getClientOriginalExtension();
            $image->storeAs('public/product_image', $name);
            $product->image = 'storage/product_image/'.$name;
            // $product->image = $name;
        }

        $product->save();
        // store product size stock
        if($request->items){
            foreach(json_decode($request->items) as $item ){
                $size_stock             =   new ProductSizeStock();
                $size_stock->product_id =   $product->id;
                $size_stock->size_id    =   $item->size_id;
                $size_stock->location   =   $item->location;
                $size_stock->quantity   =   $item->quantity;
                $size_stock->save();

                // return response()->json([
                //     'status' => true,
                //     'message'=> 'Product size stock also saved.'
                // ]);
            }
        }

         // return redirect()->back()->with('message','Product saved successfully');
         return response()->json([
            'success'=> true,
        ], Response::HTTP_OK );
        return $request->all();
    }


    public function edit() {

    }
    public function update() {

    }
    public function destroy() {

    }
}
