<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeGroupCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_group_category', function (Blueprint $table) {
            $table->integer('attribute_group_id')->unsigned();
            $table->integer('category_id')->unsigned();
        });
        Schema::table('attribute_group_category', function (Blueprint $table) {
            $table->foreign('attribute_group_id')
                ->references('id')->on('attribute_groups')
                ->onDelete('cascade');
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
        Schema::dropIfExists('attribute_group_category');
    }
}
