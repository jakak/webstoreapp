<?php

use App\ColorPicker;
use Illuminate\Database\Seeder;

class ColorPickerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ColorPicker::updateOrCreate([
            'top_menu_bg' => 'ffffff'
        ]);

        ColorPicker::updateOrCreate([
            'top_menu_text' => '000000'
        ]);

        ColorPicker::updateOrCreate([
            'cart_button_bg' => 'b670af'
        ]);

        ColorPicker::updateOrCreate([
            'cart_button_text' => 'ffffff'
        ]);

        ColorPicker::updateOrCreate([
            'footer_bg' => 'f2f2f2'
        ]);

        ColorPicker::updateOrCreate([
            'footer_title' => 'a5a5a5'
        ]);

        ColorPicker::updateOrCreate([
            'footer_text' => '242424'
        ]);

        ColorPicker::updateOrCreate([
            'footer_button' => '242424'
        ]);
    }
}
