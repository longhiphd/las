<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_module',function(Blueprint $table){
            $table->increments('id');
            $table->integer('role_id')->unsigned()->index();
            $table->string('name');
            $table->integer('father_id')->unsigned();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
        Schema::table('role_module',function(Blueprint $table){
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('father_id')->references('id')->on('role_module')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('role_module');
    }
}
