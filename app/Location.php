<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['id', 'location', 'state', 'country', 'rate', 'type', 'status'];
}
