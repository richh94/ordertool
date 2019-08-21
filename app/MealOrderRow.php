<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealOrderRow extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'meal_order_rows';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['product_id', 'meal_id', 'user_id'];

    public function product()
    {
        return $this->hasOne('App\Product', 'id', 'product_id');
    }

    public function meal()
    {
        return $this->hasOne('App\Meal', 'id', 'meal_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function order_row_sub_options()
    {
        return $this->hasMany('App\OrderRowSubOption');
    }

}
