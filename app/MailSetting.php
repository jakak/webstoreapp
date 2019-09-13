<?php

namespace App;

use App\Events\MailSettingSaved;
use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;

class MailSetting extends Model
{
    use Rememberable;

    protected $fillable = ['logo', 'host', 'port', 'encryption', 'username', 'password'];
    protected $dispatchesEvents = [
        'saving' => MailSettingSaved::class
    ];

    public $rememberCacheTag = 'mail_setting_queries';
//    public $rememberFor = 60 * 60;
}
