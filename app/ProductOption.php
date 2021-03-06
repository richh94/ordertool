<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_options';

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
    protected $fillable = ['product_id', 'name', 'required', 'can_select_multiple'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    
}
