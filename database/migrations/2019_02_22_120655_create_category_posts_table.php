<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('posts')->onUpdate('restrict')->onDelete('cascade');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('restrict')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_posts');
    }
}

// Schema::create('article_tag', function (Blueprint $table) {
//     $table->integer('article_id')->unsigned();
//     $table->foreign('article_id')->references('id')->on('articles');
//     $table->integer('tag_id')->unsigned();
//     $table->foreign('tag_id')->references('id')->on('tags');
// });

// $table->foreign('user_id')
// ->references('id')->on('users')->onUpdate('restrict')
// ->onDelete('cascade');