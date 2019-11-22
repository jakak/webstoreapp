<?php

namespace Webkul\Attribute\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;

class AttributeTranslation extends Model
{
    use Rememberable;

    public $timestamps = false;

    protected $fillable = ['name'];
}
