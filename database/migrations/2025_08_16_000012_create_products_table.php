<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name')->nullable();
            $table->string('product_image')->nullable();
            $table->string('product_code')->nullable();
            $table->string('product_price')->nullable();
            $table->longText('product_description')->nullable();
            $table->string('product_breif_info')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
