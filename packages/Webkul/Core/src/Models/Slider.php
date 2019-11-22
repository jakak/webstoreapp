<?php

namespace Webkul\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;

class Slider extends Model
{
    use Rememberable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'sliders';

    protected $fillable = [
        'title', 'path','content','channel_id'
    ];
}
