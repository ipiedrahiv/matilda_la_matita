<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration{

    public function up(){

        Schema::create('reviews', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->integer('rating');
            $table->text('comment');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('seed_id')->unsigned();
            $table->foreign('seed_id')->references('id')->on('seeds');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('reviews');
    }
}