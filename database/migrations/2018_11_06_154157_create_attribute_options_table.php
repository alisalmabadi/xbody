<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_options', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('attribute_id')->unsigned();
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->text('desc')->nullable();
            $table->integer('order')->nullable();
            $table->timestamps();
        });
        Schema::table('attribute_options', function (Blueprint $table) {
            $table->foreign('attribute_id')
                ->references('id')->on('attributes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attribute_options');
    }
}
