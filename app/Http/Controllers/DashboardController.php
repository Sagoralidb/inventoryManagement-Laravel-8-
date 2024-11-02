<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductStock;
use App\Models\ReturnProduct;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index()
   {
     $totalUser          = User::count();
     $totalProduct       = Product::count();
     $latestProduct      = Product::latest()->limit(10)->get();
     $totalStockIn         = ProductStock::where('status', ProductStock::STOCK_IN)->count();
     $totalReturnProduct = ReturnProduct::count();

    $data['totalUser']      =   $totalUser;
    $data['totalProduct']   =   $totalProduct;
    $data['latestProduct']  =   $latestProduct;
    $data['totalStockIn']     =   $totalStockIn;
    $data['totalReturnProduct']   =   $totalReturnProduct;
        return view('dashboard', $data);
   }
}
