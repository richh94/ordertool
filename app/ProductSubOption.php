<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSubOption extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_sub_options';

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
    protected $fillable = ['product_option_id', 'name'];

    public function product_option()
    {
        return $this->belongsTo('App\ProductOption');
    }
    
}
