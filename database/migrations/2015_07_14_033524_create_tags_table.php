<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags',function(Blueprint $table){
            $table->increments('id');
            $table->integer('lang_id')->unsigned()->index();
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });
        Schema::table('tags',function(Blueprint $table){
            $table->foreign('lang_id')->references('id')->on('post_langs')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tags');
    }
}
