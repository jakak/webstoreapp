<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['id', 'location', 'state', 'country', 'description','rate', 'type', 'status'];
}
