<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products',function(Blueprint $table){
            $table->increments('id');
            $table->integer('category_id')->unsigned()->index();
            $table->string('sku');
            $table->string('name');
            $table->string('slug');
            $table->decimal('listed_price', 15, 2)->default(0);
            $table->decimal('selling_price', 15, 2)->default(0);
            $table->longText('description');
            $table->longText('content');
            $table->string('feature_image')->nullable();
            $table->boolean('in_stock')->default(true);
            $table->integer('promotion')->default(0);
            $table->string('tag')->nullable();
            $table->string('meta_title');
            $table->string('meta_description');
            $table->boolean('deleted')->default(false);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
        Schema::table('products',function(Blueprint $table){
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
