<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts',function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('lang_id')->unsigned()->index();
            $table->integer('category_id')->unsigned()->index();
            $table->string('name');
            $table->string('slug');
            $table->string('content');
            $table->string('img');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->boolean('isHot')->default(false);
            $table->boolean('isSticky')->default(false);
            $table->boolean('isPublish')->default(false);
            $table->boolean('deleted')->default(false);
            $table->dateTime('publish_at');
            $table->timestamps();
        });
        Schema::table('posts',function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('lang_id')->references('id')->on('post_langs')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories_article')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
