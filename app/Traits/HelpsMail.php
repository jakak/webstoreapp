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
        config([ 'mail.host' => $settings->host ]);
        config([ 'mail.port' => $settings->port ]);
        config([ 'mail.encryption' => $settings->encryption ]);
        config([ 'mail.username' => $settings->username ]);
        config([ 'mail.password' => $settings->password ]);
    }
}