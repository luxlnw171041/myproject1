<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procat extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'procats';

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
    protected $fillable = ['product_id', 'catagory_id'];

    public function product(){
        return $this->belongsTo('App\Product', 'product_id'); 
    }
    public function catagory(){
        return $this->belongsTo('App\Category', 'catagory_id'); 
    }
}
