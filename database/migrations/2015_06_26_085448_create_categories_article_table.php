<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_article',function(Blueprint $table){
            $table->increments('id');
            $table->integer('module_id')->unsigned()->index();
            $table->string('name');
            $table->string('slug');
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
        Schema::table('categories_article',function(Blueprint $table){
            $table->foreign('module_id')->references('id')->on('role_module')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('categories_article');
    }
}
