<?php

namespace Webkul\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;

class CountryState extends Model
{
    use Rememberable;
    public $rememberFor = 60 * 60 * 24;
    public $timestamps = false;
}
