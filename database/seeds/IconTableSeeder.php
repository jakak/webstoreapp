<?php

use Illuminate\Database\Seeder;
use Webkul\Core\Models\Channel;

class IconTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $channel = Channel::first();
        $channel->update([
            'favicon' => 'channel/favicon.ico',
            'logo' => 'channel/logo.svg'
        ]);
    }
}
