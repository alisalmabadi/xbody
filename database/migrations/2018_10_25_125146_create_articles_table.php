
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('category_post_id')->unsigned();
            $table->string('title');
            $table->text('body')->nullable();
            $table->string('img')->nullable();
            $table->string('img_thumbnail')->nullable();
            $table->string('seo_title');
            $table->string('slug')->unique();
            $table->string('short');
            $table->string('seo_desc')->nullable();
            $table->timestamps();
        });

        Schema::table('articles',function (Blueprint $table){
           $table->foreign('category_article_id')->references('id')->on('article_categories')->OnDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
