<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_options', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('product_id')->unsigned();
            $table->text('name');
            $table->boolean('required');
            $table->boolean('can_select_multiple');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_options');
    }
}
