<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'meals';

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
    protected $fillable = ['restaurant_id', 'date', 'is_open'];

    public function restaurant()
    {
        return $this->hasOne('App\Restaurant', 'id', 'restaurant_id');
    }

}
