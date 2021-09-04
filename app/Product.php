<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

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
    protected $fillable = ['title', 'content', 'price', 'cost', 'photo', 'quantity'];

    public function order_products(){
        return $this->hasMany('App\OrderProduct', 'product_id'); 
    }  
    public function productattribute(){
        return $this->hasMany('App\ProductAttribute', 'product_id'); 
    } 

    public function product_attributes(){
        return $this->hasMany('App\product_attributes', 'product_id'); 
    } 
    public function users(){
        return $this->hasMany('App\User', 'user_id'); 
    }  
}
