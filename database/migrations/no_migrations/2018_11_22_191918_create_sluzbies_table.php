<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSluzbiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sluzbies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nazov');
            $table->integer('opakovanie');
            $table->integer('cas');
            $table->integer('cena');         
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
        Schema::dropIfExists('sluzbies');
    }
}
