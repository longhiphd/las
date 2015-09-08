<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductRateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_rates',function(Blueprint $table){
                $table->increments('id');
                $table->integer('product_id')->unsigned()->index();
                $table->string('email');
                $table->string('name');
                $table->longText('content');
                $table->integer('rate');
                $table->timestamps();
        });
        Schema::table('product_rates',function(Blueprint $table){
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_rates');
    }
}
