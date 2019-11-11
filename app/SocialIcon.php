<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialIcon extends Model
{
    protected $fillable = ['name', 'url', 'icon'];
}
