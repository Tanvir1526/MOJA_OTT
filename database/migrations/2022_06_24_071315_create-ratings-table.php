<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->bigIncrements('rating_id');
            $table->bigInteger('person_id')->unsigned();
            $table->foreign('person_id')->references('person_id')->on('persons');
            $table->bigInteger('content_id')->unsigned();
            $table->foreign('content_id')->references('content_id')->on('contents');
            $table->integer('rating');
            
            
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
        //
    }
}
