<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderRowSubOption extends Model
{
    protected $table = 'order_row_sub_options';

    protected $primaryKey = ['meal_order_row_id', 'product_sub_option_id'];

    public $incrementing = false;

    public function meal_order_row()
    {
        return $this->hasOne('App\MealOrderRow', 'id', 'meal_order_row_id');
    }

    public function product_sub_option()
    {
        return $this->hasOne('App\ProductSubOption', 'id', 'product_sub_option_id');
    }

}
