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
            'logo' => '',
            'host' => 'smtp.yandex.com',
            'port' => '465',
            'encryption' => 'SSL',
            'username' => '',
            'password' => ''
        ]);
    }
}
