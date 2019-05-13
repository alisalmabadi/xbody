<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMainPageSettingAndGalleryVideoSettingAndGalleryPhotoSettingAndGalleryCustomerSettingToSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->text('mainpage_header')->after('product_header')->nullable();
            $table->longText('mainpage_desc')->after('mainpage_header')->nullable();
            $table->text('galleryvideo_header')->after('mainpage_desc')->nullable();
            $table->longText('galleryvideo_des')->after('galleryvideo_header')->nullable();
            $table->text('galleryphoto_header')->after('galleryvideo_des')->nullable();
            $table->longText('galleryphoto_des')->after('galleryphoto_header')->nullable();
            $table->text('gallerycustomer_header')->after('galleryphoto_des')->nullable();
            $table->longText('gallerycustomer_des')->after('gallerycustomer_header')->nullable();
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
            $table->dropColumn('mainpage_header');
            $table->dropColumn('mainpage_desc');
            $table->dropColumn('galleryvideo_header');
            $table->dropColumn('galleryvideo_des');
            $table->dropColumn('galleryphoto_header');
            $table->dropColumn('galleryphoto_des');
            $table->dropColumn('gallerycustomer_header');
            $table->dropColumn('gallerycustomer_des');
        });
    }
}
