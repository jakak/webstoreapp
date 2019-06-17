<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreNotification extends Model
{
    protected $fillable = ['name', 'email', 'test_btn', 'status'];
}
