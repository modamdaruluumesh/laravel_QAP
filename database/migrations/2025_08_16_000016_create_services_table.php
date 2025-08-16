<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('services_image')->nullable();
            $table->string('services_title')->nullable();
            $table->longText('services_text')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
