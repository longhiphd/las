<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atts',function(Blueprint $table){
            $table->increments('id');
            $table->integer('att_category_id')->unsigned()->index();
            $table->string('att_category_name');
            $table->string('name');
            $table->string('color')->nullable();
            $table->boolean('deleted')->default(false);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
        Schema::table('atts',function(Blueprint $table){
            $table->foreign('att_category_id')->references('id')->on('att_categories')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('atts');
    }
}
