<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

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
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){
        return $this->hasOne('App\Profile', 'user_id'); 
    }

    public function orders(){
        return $this->hasMany('App\Order', 'user_id'); 
    }    

    public function order_products(){
        return $this->hasMany('App\OrderProduct', 'user_id'); 
    }   

    public function payments(){
        return $this->hasMany('App\Payment', 'user_id'); 
    }
    public function Role(){
    return $this->hasMany('App\Role'); 
    }
    public function product(){
        return $this->belongsTo('App\Product', 'product_id'); 
    }
}
