<?php
namespace Webkul\Admin\Models;

use Illuminate\Database\Eloquent\Model;


class Blog extends Model
{
    protected $table = 'blogs';

    public $fillable = ['title', 'url', 'status', 'content', 'image', 'meta_title', 'meta_keywords', 'meta_description'];

    protected $except = ['_token' ];
}
