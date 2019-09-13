<?php

namespace Webkul\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;
use Webkul\Core\Models\CurrencyExchangeRate;

class Currency extends Model
{
    use Rememberable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'name'
    ];

//    public $rememberCacheTag = 'currency_queries';
    public $rememberFor = 360;
    /**
     * Get the currency_exchange associated with the currency.
     */
    public function CurrencyExchangeRate()
    {
        return $this->hasOne(CurrencyExchangeRate::class, 'target_currency');
    }
}
