<?php

use Illuminate\Database\Seeder;
use Webkul\Core\Models\Slider;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::truncate();

        Slider::create([
            'title' => 'Demo Slider 1',
            'path' => 'Zbleq21bzaBfYG02iWpu3MyX2fUY0Hg9FJNWC9at.jpeg',
            'channel_id' => 1
        ]);

        Slider::create([
            'title' => 'Demo Slider 2',
            'path' => 'Zbleq21bzaBfYG02iWpu3MyX2fUY0Hg9FJNWC9at.jpeg',
            'channel_id' => 1
        ]);

        Slider::create([
            'title' => 'Demo Slider 3',
            'path' => 'Zbleq21bzaBfYG02iWpu3MyX2fUY0Hg9FJNWC9at.jpeg',
            'channel_id' => 1
        ]);
    }
}
