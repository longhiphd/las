<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemeOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme_options',function(Blueprint $table){
            $table->increments('id');
            $table->string('logo');
            $table->string('website');
            $table->string('email');
            $table->string('hotline');
            $table->string('showroom');
            $table->string('social_fb');
            $table->string('social_twitter');
            $table->string('social_google_plus');
            $table->string('social_pinterest');
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
        Schema::drop('theme_options');
    }
}
