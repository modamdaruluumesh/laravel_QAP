<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('client_name')->nullable();
            $table->string('client_email')->nullable();
            $table->string('client_phone_number')->nullable();
            $table->string('client_address')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
