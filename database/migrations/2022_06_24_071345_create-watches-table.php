<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('watches', function (Blueprint $table) {
            $table->bigIncrements('watch_id');
            $table->bigInteger('person_id')->unsigned();
            $table->foreign('person_id')->references('person_id')->on('persons');
            $table->bigInteger('content_id')->unsigned();
            $table->foreign('content_id')->references('content_id')->on('contents');
            
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
