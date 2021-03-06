<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerAccount extends Model
{
    //
    protected $guarded = [];

    public function user() {
        return $this->morphOne('App\User', 'account');
    }

    public function shoppingCart() {
        return $this->hasOne(ShoppingCart::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
