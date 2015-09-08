<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_comments',function(Blueprint $table){
            $table->increments('id');
            $table->integer('post_id')->unsigned()->index();
            $table->string('email');
            $table->string('name');
            $table->longText('content');
            $table->timestamps();
        });
        Schema::table('post_comments',function(Blueprint $table){
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('post_comments');
    }
}
