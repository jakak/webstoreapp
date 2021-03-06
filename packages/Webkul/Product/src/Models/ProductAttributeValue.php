<?php

namespace Webkul\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;
use Webkul\Attribute\Models\Attribute;
use Webkul\Core\Models\Channel;

class ProductAttributeValue extends Model
{
    use Rememberable;


    public $timestamps = false;

    protected $with = ['attribute'];

    /**
     * @var array
     */
    public static $attributeTypeFields = [
        'text' => 'text_value',
        'textarea' => 'text_value',
        'price' => 'float_value',
        'boolean' => 'boolean_value',
        'select' => 'integer_value',
        'multiselect' => 'text_value',
        'datetime' => 'datetime_value',
        'date' => 'date_value',
    ];

    protected $fillable = [
        'product_id',
        'attribute_id',
        'channel_id',
        'locale',
        'channel',
        'text_value',
        'boolean_value',
        'integer_value',
        'float_value',
        'datetime_value',
        'date_value',
        'json_value'
    ];

    /**
     * Get the attribute that owns the attribute value.
     */
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    /**
     * Get the product that owns the attribute value.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the channel that owns the attribute value.
     */
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
}
