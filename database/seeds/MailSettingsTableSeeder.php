<?php

use App\MailSetting;
use Illuminate\Database\Seeder;

class MailSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MailSetting::truncate();

        MailSetting::create([
            'logo' => '../../../vendor/webkul/ui/assets/images/placeholder-icon.svg',
            'host' => 'smtp.yandex.com',
            'port' => '465',
            'encryption' => 'SSL',
            'username' => '',
            'password' => ''
        ]);
    }
}
