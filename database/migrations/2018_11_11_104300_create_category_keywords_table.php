<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_keywords', function (Blueprint $table) {
            $table->integer('category_id')->unsigned();
            $table->integer('keyword_id')->unsigned();
        });

        Schema::table('category_keywords', function (Blueprint $table) {

            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');

            $table->foreign('keyword_id')
                ->references('id')->on('keywords')
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
        Schema::dropIfExists('category_keywords');
    }
}
