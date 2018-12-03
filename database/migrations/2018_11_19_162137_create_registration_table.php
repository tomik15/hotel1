<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration', function (Blueprint $table) {
            $table->increments('id');
            

            $table->integer('id_user')->unsigned()->default(0);
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->integer('id_sluzby')->unsigned()->default(0);
            $table->foreign('id_sluzby')->references('id')->on('sluzbies')->onDelete('cascade');
            $table->integer('id_rooms')->unsigned();
            $table->foreign('id_rooms')->references('id')->on('rooms')->onDelete('cascade');
            $table->string('payments');
            $table->timestamp('date_of_arrival')->nullable();
            $table->timestamp('date_of_departure')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registration');
    }
}
