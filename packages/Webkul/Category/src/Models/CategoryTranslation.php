<?php

namespace Webkul\Category\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;

class CategoryTranslation extends Model
{
//    use Rememberable;

    public $timestamps = false;

    protected $fillable = ['name', 'description', 'slug', 'meta_title', 'meta_description', 'meta_keywords'];
}
