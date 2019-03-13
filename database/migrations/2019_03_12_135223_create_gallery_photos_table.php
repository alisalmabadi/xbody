<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gallery_id')->nullable()->unsigned();
            $table->string('title');
            $table->string('image_path');
            $table->string('image_type');
            $table->string('alt');
            $table->string('image_thumbnail');
            $table->tinyInteger('status');
            $table->timestamps();
        });
        Schema::table('gallery_photos' , function (Blueprint $table){
            $table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery_photos');
    }
}
