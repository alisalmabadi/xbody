<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gallery_id')->nullable()->unsigned();
            $table->string('title');
            $table->string('video_path');
            $table->string('video_type');
            $table->string('video_thumbnail');
            $table->tinyInteger('status');
            $table->timestamps();
        });
        Schema::table('gallery_videos' , function (Blueprint $table){
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
        Schema::dropIfExists('gallery_videos');
    }
}
