<?php

namespace App\Traits;

use App\MailSetting;

Trait HelpsMail
{
    public function setConfig()
    {
        $settings = MailSetting::remember(360)->first();
        if (!$settings) {
            throw new \Exception("Email settings not set or incomplete", 1);
        }
        $this->mailSetting = $settings;
        if (!$settings->logo || !$settings->port || !$settings->username || !$settings->password
            || !$settings->host) {
            throw new \Exception("Email settings not set or incomplete", 1);
        }
    }
}
