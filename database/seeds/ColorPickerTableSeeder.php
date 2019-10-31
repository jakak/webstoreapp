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
            'top_menu_bg' => 'ffffff',
            'top_menu_text' => '4f5b64',
            'top_menu_hover' => '4f5b64',
            'hyperlinks' => '79c142',
            'cart_button_bg' => '79c142',
            'cart_button_text' => 'ffffff',
            'footer_bg' => 'f2f2f2',
            'footer_title' => 'a5a5a5',
            'footer_text' => '4f5b64',
            'footer_button' => '4f5b64'
        ]);
    }
}
