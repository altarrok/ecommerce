<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    protected $guarded = [];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function sellerAccount() {
        return $this->belongsTo(SellerAccount::class);
    }

    public function customerAccount() {
        return $this->belongsTo(CustomerAccount::class);
    }
}
