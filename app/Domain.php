<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    public $fillable = ['id', 'cname', 'webstore_domain', 'custom_domain', 'status'];
}
