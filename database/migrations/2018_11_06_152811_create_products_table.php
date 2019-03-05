<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('category_id')->unsigned();
          /*$table->integer('seller_id')->unsigned();
            $table->integer('company_id')->unsigned();*/
            $table->string('name');
            $table->string('title');
            $table->text('desc')->nullable();
            $table->string('slug')->unique();
            $table->text('seo_desc')->nullable();
            $table->string('model')->nullable();
            $table->bigInteger('price');
            $table->timestamps();
        });
        Schema::table('products', function (Blueprint $table) {

            $table->foreign('category_id')
                ->references('id')->on('categories')
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
        Schema::dropIfExists('products');
    }
}
