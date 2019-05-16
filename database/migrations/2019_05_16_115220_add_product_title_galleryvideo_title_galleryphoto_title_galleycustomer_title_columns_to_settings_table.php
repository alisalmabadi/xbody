<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductTitleGalleryvideoTitleGalleryphotoTitleGalleycustomerTitleColumnsToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
             $table->string('product_title')->after('product_header')->nullable();
             $table->string('galleryvideo_title')->after('galleryvideo_header')->nullable();
             $table->string('galleryphoto_title')->after('galleryphoto_header')->nullable();
             $table->string('gallerycustomer_title')->after('gallerycustomer_header')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('product_title');
            $table->dropColumn('galleryvideo_title');
            $table->dropColumn('galleryphoto_title');
            $table->dropColumn('gallerycustomer_title');
        });
    }
}
