<?php

namespace App\Traits;

use App\MailSetting;

Trait HelpsMail
{
    public $setting;
    public function __construct()
    {
        $this->setting = MailSetting::first();
    }

    public function setConfig()
    {
        $settings = MailSetting::first();
        if (!$settings) {
            return;
        }
        $this->mailSetting = $settings;
        if (!$settings->logo || !$settings->port || !$settings->username || !$settings->password
            || !$settings->host) {
            throw new \Exception("Email settings not set or incomplete", 1);
        }
    }
}
