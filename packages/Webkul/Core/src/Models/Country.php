<?php

namespace Webkul\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;

class Country extends Model
{
    use Rememberable;
    public $rememberFor = 60 * 60;
    public $timestamps = false;
}
