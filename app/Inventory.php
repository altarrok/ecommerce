<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //
    public function sellerAccount() {
        return $this->belongsTo(SellerAccount::class);
    }
}
