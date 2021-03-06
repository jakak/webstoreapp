<?php

namespace Webkul\Checkout\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;
use Webkul\Product\Models\Product;
use Webkul\Checkout\Models\CartItem;
use Webkul\Checkout\Models\CartAddress;
use Webkul\Checkout\Models\CartPayment;
use Webkul\Checkout\Models\CartShippingRate;

class Cart extends Model
{
    use Rememberable;

    protected $table = 'cart';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $hidden = ['coupon_code'];

    protected $with = ['items', 'items.child', 'shipping_address', 'billing_address', 'selected_shipping_rate', 'payment'];

    /**
     * To get relevant associated items with the cart instance
     */
    public function items() {
        return $this->hasMany(CartItem::class)->whereNull('parent_id');
    }

    /**
     * To get all the associated items with the cart instance even the parent and child items of configurable products
     */
    public function all_items() {
        return $this->hasMany(CartItem::class);
    }

    /**
     * Get the addresses for the cart.
     */
    public function addresses()
    {
        return $this->hasMany(CartAddress::class);
    }

    /**
     * Get the biling address for the cart.
     */
    public function billing_address()
    {
        return $this->addresses()->where('address_type', 'billing');
    }

    /**
     * Get billing address for the cart.
     */
    public function getBillingAddressAttribute()
    {
        return $this->billing_address()->first();
    }

    /**
     * Get the shipping address for the cart.
     */
    public function shipping_address()
    {
        return $this->addresses()->where('address_type', 'shipping');
    }

    /**
     * Get shipping address for the cart.
     */
    public function getShippingAddressAttribute()
    {
        return $this->shipping_address()->first();
    }

    /**
     * Get the shipping rates for the cart.
     */
    public function shipping_rates()
    {
        return $this->hasManyThrough(CartShippingRate::class, CartAddress::class, 'cart_id', 'cart_address_id');
    }

    /**
     * Get all of the attributes for the attribute groups.
     */
    public function selected_shipping_rate()
    {
        return $this->shipping_rates()->where('method', $this->shipping_method);
    }

    /**
     * Get all of the attributes for the attribute groups.
     */
    public function getSelectedShippingRateAttribute()
    {
        return $this->selected_shipping_rate()->where('method', $this->shipping_method)->first();
    }

    /**
     * Get the payment associated with the cart.
     */
    public function payment()
    {
        return $this->hasOne(CartPayment::class);
    }
}
