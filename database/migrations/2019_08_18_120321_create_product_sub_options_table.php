<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductSubOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sub_options', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('product_option_id')->unsigned();
            $table->text('name');
            $table->foreign('product_option_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_sub_options');
    }
}
