<?php

use App\Models\ProductStock;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->nullable()->references('id')->on('products')->onDelete('set null');
            $table->foreignId('size_id')->nullable()->references('id')->on('sizes')->onDelete('set null');
            $table->integer('quantity');
            $table->date('date');
            $table->string('status', 5)->default(ProductStock::STOCK_IN);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_stocks');
    }
}
