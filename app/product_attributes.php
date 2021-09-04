<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_attribute extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_attributes';

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
    protected $fillable = ['product_id', 'size', 'price', 'stock', 'created_at', 'updated_at'];

    public function product(){
        return $this->belongsTo('App\Product', 'product_id'); 
    }
}
