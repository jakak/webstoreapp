<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;

class MailSetting extends Model
{
    use Rememberable;

    protected $fillable = ['logo', 'host', 'port', 'encryption', 'username', 'password'];

    public $rememberCacheTag = 'mail_setting_queries';
//    public $rememberFor = 60 * 60;
}
