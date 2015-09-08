<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consults',function(Blueprint $table){
            $table->increments('id');
            $table->longText('title');
            $table->string('full_name');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->date('date');
            $table->string('content');
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
        Schema::drop('consults');
    }
}
