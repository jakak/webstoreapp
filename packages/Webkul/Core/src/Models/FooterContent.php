<?php

namespace Webkul\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;

class FooterContent extends Model
{
    use Rememberable;

    public $fillable = ['name', 'url', 'page_content', 'meta_title', 'meta_keywords', 'meta_description'];

    protected $except = ['_token' ];
}
