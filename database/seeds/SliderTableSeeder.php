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
            'title' => 'Sample Slider 1',
            'path' => 'default_slider/Zbleq21bzaBfYG02iWpu3MyX2fUY0Hg9FJNWC9at.jpeg',
            'channel_id' => 1
        ]);

        Slider::create([
            'title' => 'Sample Slider 2',
            'path' => 'default_slider/Zbleq21bzaBfYG02iWpu3MyX2fUY0Hg9FJNWC9at.jpeg',
            'channel_id' => 1
        ]);

        Slider::create([
            'title' => 'Sample Slider 3',
            'path' => 'default_slider/Zbleq21bzaBfYG02iWpu3MyX2fUY0Hg9FJNWC9at.jpeg',
            'channel_id' => 1
        ]);
    }
}
