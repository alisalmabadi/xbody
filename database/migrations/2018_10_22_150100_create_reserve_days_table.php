<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReserveDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserve_days', function (Blueprint $table) {
            $table->integer('reserve_id')->unsigned();
            $table->integer('day_id')->unsigned();
        });
        Schema::table('reserve_days',function (Blueprint $table){
           $table->foreign('reserve_id')->references('id')->on('reserves')->onDelete('cascade');
           $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserve_days');
    }
}
