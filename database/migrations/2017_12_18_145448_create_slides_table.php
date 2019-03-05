<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('slider_id')->unsigned()->index();
            $table->string('title')->nullable();
            $table->string('link')->nullable();
/*            $table->integer('btn_type');*/
            $table->string('image')->nullable();
            $table->integer('order');
            $table->timestamps();

        });

	    Schema::table('slides', function (Blueprint $table) {

		    $table->foreign('slider_id')
		          ->references('id')->on('sliders')
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
        Schema::dropIfExists('slides');
    }
}
