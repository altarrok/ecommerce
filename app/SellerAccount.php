<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerAccount extends Model
{
    //
    protected $guarded = [];

    public function user() {
        return $this->morphOne('App\User', 'account');
    }

    public function inventory() {
        return $this->hasOne(Inventory::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
