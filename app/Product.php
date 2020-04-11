<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $guarded = [];
    //
    public function shopping_carts() {
        return $this->belongsToMany(ShoppingCart::class);
    }

    public function inventory() {
        return $this->belongsTo(Inventory::class);
    }

    public function order() {
        return $this->hasMany(Order::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }
}
