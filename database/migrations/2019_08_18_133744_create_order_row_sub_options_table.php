<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderRowSubOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_row_sub_options', function (Blueprint $table) {
            $table->unsignedInteger('meal_order_row_id');
            $table->unsignedInteger('product_sub_option_id');
            $table->timestamps();
            $table->foreign('meal_order_row_id')->references('id')->on('meal_order_rows')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_sub_option_id')->references('id')->on('product_sub_options')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_row_sub_options');
    }
}
