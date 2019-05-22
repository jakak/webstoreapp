<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailSetting extends Model
{
    protected $fillable = ['logo', 'host', 'port', 'encryption', 'username', 'password'];
}
