<?php

namespace App\Traits;

use App\MailSetting;

Trait HelpsMail
{
    public function setConfig()
    {
        $settings = MailSetting::first();
        if (!$settings) {
            return;
        }
        $this->mailSetting = $settings;
        if (
            !$settings->logo || !$settings->port || !$settings->username || !$settings->password
            || !$settings->host
        ) {
            throw new \Exception("Email settings missing or incomplete", 1);
        }
        
    }
}