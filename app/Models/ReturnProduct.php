<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnProduct extends Model
{
    use HasFactory;
    protected $table    = 'return_products';
    protected $fillable =['id','product_id','size_id','size_id','quantity','date','created_at','updated_at'];

    public function product() {
        return $this->belongsTo(Product::class);
    }
    public function size() {
        return $this->belongsTo(Size::class);
    }
}
