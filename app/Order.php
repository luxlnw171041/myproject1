<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';

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
    protected $fillable = ['user_id', 'remark', 'total', 'status', 'checking_at', 'paid_at', 'cancelled_at', 'completed_at', 'tracking' , 'address', 'confirm' , 'rereceived_at' ,'category_id '];

    public function user(){
        return $this->belongsTo('App\User', 'user_id'); 
    }
    
    public function payment(){
        return $this->hasOne('App\Payment', 'order_id'); 
    }

    public function order_products(){
        return $this->hasMany('App\OrderProduct', 'order_id'); 
    } 
    public function product(){
        return $this->belongsTo('App\Product', 'product_id'); 
    }

    
}
