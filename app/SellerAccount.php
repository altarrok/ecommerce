<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerAccount extends Model
{
    //
    public function user() {
        return $this->morphOne('App\User', 'account');
    }

    public function shoppingCart() {
        return $this->morphOne('App\ShoppingCart', 'account');
    }
}
