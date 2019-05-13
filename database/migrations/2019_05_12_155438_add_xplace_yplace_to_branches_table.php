<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddXplaceYplaceToBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('branches',function(Blueprint $table){
            $table->string('xplace')->nullable();
            $table->string('yplace')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('branches',function(Blueprint $table){
            $table->dropColumn('xplace');
            $table->string('yplace');
        });
    }
}
