<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name')->nullable();
            $table->string('invoice')->nullable();
            $table->string('amount_paid')->nullable();
            $table->date('payment_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
