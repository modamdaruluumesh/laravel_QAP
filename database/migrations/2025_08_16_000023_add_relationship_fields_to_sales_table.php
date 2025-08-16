<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSalesTable extends Migration
{
    public function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->unsignedBigInteger('client_name_id')->nullable();
            $table->foreign('client_name_id', 'client_name_fk_10689609')->references('id')->on('clients');
            $table->unsignedBigInteger('catergory_name_id')->nullable();
            $table->foreign('catergory_name_id', 'catergory_name_fk_10689610')->references('id')->on('categories');
        });
    }
}
