<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCamppostItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camppost_items', function (Blueprint $table) {
            $table->unsignedBigInteger('camppost_id');
            $table->unsignedBigInteger('items_id');
              
             $table->foreign('camppost_id')->references('id')->on('campposts')->onDelete('cascade');
             $table->foreign('items_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('camppost_items');
    }
}
