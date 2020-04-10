<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerAccount extends Model
{
    //

    public function user() {
        return $this->morphOne('App\User', 'account');
    }

    public function shoppingCart() {
        return $this->hasOne(ShoppingCart::class);
    }
}
