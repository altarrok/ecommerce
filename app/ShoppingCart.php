<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    //
    public function products() {
        return $this->belongsToMany(Product::class);
    }

    public function account() {
        return $this->morphTo();
    }
}
