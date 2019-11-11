<?php

use App\SocialIcon;
use Illuminate\Database\Seeder;

class DefaultSocialIconTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SocialIcon::truncate();

        SocialIcon::create([
            'name' => 'Instagram',
            'url' => 'https://',
            'icon' => '<span><i class="fab fa-instagram fa-1x" style="font-size: 1.5em; color: rgb(79, 91, 100); margin-right: 15px;"></i></span>',
            'icon_name' => 'default_icon_theme'
        ]);

        SocialIcon::create([
            'name' => 'Twitter',
            'url' => 'https://',
            'icon' => '<span><i style="font-size: 1.5em; color: rgb(79, 91, 100); margin-right: 15px;" class="fab fa-twitter fa-1x"></i></span>',
            'icon_name' => 'default_icon_theme'
        ]);

        SocialIcon::create([
            'name' => 'Facebook',
            'url' => 'https://',
            'icon' => '<span><i class="fab fa-facebook-f fa-1x" style="font-size: 1.5em; color: rgb(79, 91, 100); margin-right: 15px;"></i></span>',
            'icon_name' => 'default_icon_theme'
        ]);


        SocialIcon::create([
            'name' => 'Youtube',
            'url' => 'https://',
            'icon' => '<span><i class="fab fa-youtube fa-1x" style="font-size: 1.5em; color: rgb(79, 91, 100); margin-right: 15px;"></i></span>',
            'icon_name' => 'default_icon_theme'
        ]);

        SocialIcon::create([
            'name' => 'Whatsapp',
            'url' => 'https://',
            'icon' => '<span><i style="font-size: 1.5em; color: rgb(79, 91, 100); margin-right: 15px;" class="fab fa-whatsapp"></i></span>',
            'icon_name' => 'default_icon_theme'
        ]);

    }
}
