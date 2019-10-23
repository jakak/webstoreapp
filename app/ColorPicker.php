<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ColorPicker extends Model
{
    protected $fillable = ['top_menu_bg', 'top_menu_text', 'cart_button_bg',
        'cart_button_text', 'footer_bg', 'footer_title', 'footer_text', 'footer_button'];
}
