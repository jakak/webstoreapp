<?php
namespace App\Mailer;

use Illuminate\Mail\TransportManager;
use App\Traits\HelpsMail;

class CustomMailTransportManager extends TransportManager
{
    use HelpsMail;
    
    public $mailSetting;

    public function __construct($app)
    {
        $this->app = $app;
        $this->setConfig();
        if ($this->mailSetting) {

            $this->app['config']['mail'] = [
                'driver'        => env('MAIL_DRIVER'),
                'host'          => $this->mailSetting->host,
                'port'          => $this->mailSetting->port,
                'encryption'    => $this->mailSetting->encryption,
                'username'      => $this->mailSetting->username,
                'password'      => $this->mailSetting->password,
            ];
        }
    }    
}
