<?php

namespace Webkul\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;

class CoreConfig extends Model
{
    use Rememberable;

    public $rememberFor = 20;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'core_config';

    protected $fillable = [
        'code', 'value','channel_code','locale_code'
    ];

    protected $hidden = ['token'];
}
