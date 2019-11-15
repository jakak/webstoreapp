<?php

namespace Webkul\Checkout\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;
use Webkul\Checkout\Models\CartAddress;

class CartShippingRate extends Model
{
    use Rememberable;

    /**
     * Get the post that owns the comment.
     */
    public function shipping_address()
    {
        return $this->belongsTo(CartAddress::class);
    }
}
