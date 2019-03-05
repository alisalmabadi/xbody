<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductKeywords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_keywords', function (Blueprint $table) {
            $table->integer('keyword_id')->unsigned();
            $table->integer('product_id')->unsigned();
        });
        Schema::table('product_keywords', function (Blueprint $table) {
            $table->foreign('keyword_id')
                ->references('id')->on('keywords')
                ->onDelete('cascade');
            $table->foreign('product_id')
                ->references('id')->on('products')
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
        Schema::dropIfExists('=product_keywords');
    }
}
