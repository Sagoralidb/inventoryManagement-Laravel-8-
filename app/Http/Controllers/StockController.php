<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductSizeStock;
use App\Models\ProductStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
Use Illuminate\Http\Response;
class StockController extends Controller
{
    public function stock() {
        return view('stocks.stock');
    }

    public function stockSubmit(Request $request) {
        // return $request->all();
        $validate = Validator::make($request->all(),[
            'product_id' => 'required|numeric',
            'date'       => 'required|string',
            'stock_type' => 'required|string',
            'items'      => 'required',
        ]);

        if($validate->fails()) {
            return response()->json([
                'success' => true,
                'errors'  => $validate->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
            //product stock store
        foreach( $request->items as $item){
            if($item['quantity'] && $item['quantity'] > 0) {
                $new_item             =     new ProductStock();
                $new_item->product_id =     $request->product_id;
                $new_item->date       =     $request->date;
                $new_item->status     =     $request->stock_type;

                $new_item->size_id    =     $item['size_id'];
                $new_item->quantity   =     $item['quantity'];
                $new_item->save();

                // Product stock update $product_Stock_Quantity as $psq
                $psq =ProductSizeStock::where('product_id', $request->product_id)
                ->where('size_id', $item['size_id'])->first();

                if($request->stock_type == ProductStock::STOCK_IN) {
                    $psq->quantity = $psq->quantity + $item['quantity'];
                }else{
                    $psq->quantity = $psq->quantity - $item['quantity'];
                }

                $psq->save();
            }
        }
        flash('Stock saved successfully')->success();
        return response()->json([
            'success' => true,
        ], Response::HTTP_OK);
    }

    public function history(){
       $stocks = ProductStock::orderby('created_at', 'DESC')->with(['product','size'])->get();
        return view('stocks.history', compact('stocks'));
    }
}
