<?php

namespace Webkul\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Watson\Rememberable\Rememberable;
use Webkul\Core\Models\Locale;
use Webkul\Core\Models\Currency;
use Webkul\Category\Models\Category;
use Webkul\Inventory\Models\InventorySource;

class Channel extends Model
{
    use Rememberable;

    protected $fillable = ['code', 'name', 'email', 'business_name', 'phone_number',
        'address', 'city', 'postal_code', 'state', 'country', 'status', 'description',
        'theme', 'home_page_content', 'footer_content', 'footer_credit', 'hostname', 'default_locale_id',
        'base_currency_id', 'root_category_id', 'receives_notification', 'new_product_row', 'new_featured_row'];

    /**
     * Get the channel locales.
     */
    public function currencies()
    {
        return $this->belongsToMany(Currency::class, 'channel_currencies');
    }

    /**
     * Get the channel inventory sources.
     */
    public function inventory_sources()
    {
        return $this->belongsToMany(InventorySource::class, 'channel_inventory_sources');
    }




    protected $with = ['base_currency'];

    /**
     * Get the base currency
     */
    public function base_currency()
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * Get the base currency
     */
    public function root_category()
    {
        return $this->belongsTo(Category::class, 'root_category_id');
    }

    /**
     * Get logo image url.
     */
    public function logo_url()
    {
        if (! $this->logo)
            return;

        return Storage::url($this->logo);
    }

    /**
     * Get logo image url.
     */
    public function getLogoUrlAttribute()
    {
        return $this->logo_url();
    }

    /**
     * Get favicon image url.
     */
    public function favicon_url()
    {
        if (! $this->favicon)
            return;

        return Storage::url($this->favicon);
    }

    /**
     * Get favicon image url.
     */
    public function getFaviconUrlAttribute()
    {
        return $this->favicon_url();
    }
}
