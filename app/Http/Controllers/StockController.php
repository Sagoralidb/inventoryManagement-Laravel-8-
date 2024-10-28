<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StockController extends Controller
{
    public function stock() {
        return view('stocks.stock');
    }

}
