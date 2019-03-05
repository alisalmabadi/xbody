<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKeywordPage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keyword_page', function (Blueprint $table) {
            $table->integer('keyword_id')->unsigned();
            $table->integer('page_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('keyword_page',function (Blueprint $table){


            $table->foreign('keyword_id')->references('id')->on('keywords')->onDelete('cascade');

            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keyword_page');
    }
}
