<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageManagerFilesProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_manager_files_product', function (Blueprint $table) {
            $table->integer('image_manager_files_id')->unsigned();
            $table->integer('product_id')->unsigned();
        });
        Schema::table('image_manager_files_product', function (Blueprint $table) {

            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade');

            $table->foreign('image_manager_files_id')
                ->references('id')->on('image_manager_files')
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
        Schema::dropIfExists('image_manager_files_product');
    }
}
