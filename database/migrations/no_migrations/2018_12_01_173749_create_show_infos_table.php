<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('show_rooms_id')->unsigned()->nullable();
            $table->foreign('show_rooms_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->integer('show_vybavy_id')->unsigned()->nullable();
            $table->foreign('show_vybavy_id')->references('id')->on('vybavas')->onDelete('cascade');            
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
        Schema::dropIfExists('show_infos');
    }
}
