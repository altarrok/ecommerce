<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function shopping_carts() {
        return $this->belongsToMany(ShoppingCart::class);
    }

    public function inventory() {
        return $this->belongsTo(Inventory::class);
    }
}
