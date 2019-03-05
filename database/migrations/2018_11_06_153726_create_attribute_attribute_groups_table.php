<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeAttributeGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_attribute_groups', function (Blueprint $table) {
            $table->integer('attribute_id')->unsigned();
            $table->integer('attribute_group_id')->unsigned();
        });

        Schema::table('attribute_attribute_groups', function (Blueprint $table) {
            $table->foreign('attribute_id')
                ->references('id')->on('attributes')
                ->onDelete('cascade');
            $table->foreign('attribute_group_id')
                ->references('id')->on('attribute_groups')
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
        Schema::dropIfExists('attribute_attribute_groups');
    }
}
