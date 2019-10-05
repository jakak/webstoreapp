<?php

namespace Webkul\Core\Models;

use Illuminate\Database\Eloquent\Model;

class FooterContent extends Model
{
    public $fillable = ['name', 'page_content', 'meta_title', 'meta_keywords', 'meta_description'];

    protected $except = ['_token' ];
}
