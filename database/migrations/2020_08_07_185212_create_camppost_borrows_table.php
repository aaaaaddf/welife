<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCamppostBorrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camppost_borrows', function (Blueprint $table) {
            $table->bigIncrements('id');
           $table->unsignedBigInteger('camppost_id');
            $table->unsignedBigInteger('user_id');
             $table->string('start_date');
             $table->string('end_date');
              $table->timestamps();
             $table->unsignedBigInteger('owner_id');
             
             $table->foreign('camppost_id')->references('id')->on('campposts')->onDelete('cascade');
             $table->foreign('user_id')->references('id')->on('users');
               $table->foreign('owner_id')->references('user_id')->on('campposts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('camppost_borrows');
    }
}
