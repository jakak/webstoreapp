<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public $fillable = ['name', 'url', 'status', 'content',
        'meta_description', 'meta_title', 'meta_keywords'];
}
