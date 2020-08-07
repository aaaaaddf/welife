<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCamppostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campposts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('place')->nullable();
            $table->string('image')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('special')->nullable();
            $table->unsignedBigInteger('prefecture_id')->nullable();
            $table->timestamps();
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
           
           $table->foreign('prefecture_id')->references('id')->on('prefectures');
            
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
        Schema::dropIfExists('campposts');
        
        Schema::dropIfExists('prefectures');
        Schema::dropIfExists('users');
    }
}
