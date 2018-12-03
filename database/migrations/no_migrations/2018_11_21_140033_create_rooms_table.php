<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cislo');
            $table->string('obsadenost_izby');
            $table->integer('pocet_rezervovanych_lozok');
            $table->integer('max_kapacita_izby');
            $table->integer('id_vybavy')->unsigned();
            $table->foreign('id_vybavy')->references('id')->on('vybavas')->onDelete('cascade');
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
        Schema::dropIfExists('rooms');
    }
}
