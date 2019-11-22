<?php

namespace Webkul\Checkout\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;

class CartPayment extends Model
{
    use Rememberable;

    protected $table = 'cart_payment';
}
