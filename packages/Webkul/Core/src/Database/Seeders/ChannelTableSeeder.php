<?php

namespace Webkul\Core\Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ChannelTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('channels')->delete();

        DB::table('channels')->insert([
                'id' => 1,
                'code' => 'default',
                'name' => 'Default',
                'home_page_content' => '<p>@include("shop::home.slider") @include("shop::home.featured-products") @include("shop::home.new-products")</p><div class="banner-container"><div class="left-banner"><img src="../../../themes/default/assets/images/1.jpg" /></div><div class="right-banner"><img src="../../../themes/default/assets/images/2.jpg" /> <img src="../../../themes/default/assets/images/3.jpg" /></div></div>',
                'footer_content' => '<div class="list-container"><span class="list-heading">Quick Links</span><ul class="list-group"><li><a href="#">About Us</a></li><li><a href="#">Return Policy</a></li><li><a href="#">Refund Policy</a></li><li><a href="#">Terms and conditions</a></li><li><a href="#">Terms of Use</a></li><li><a href="#">Contact Us</a></li></ul></div><div class="list-container"><span class="list-heading">Connect With Us</span><ul class="list-group"><li><a href="#"><span class="icon icon-facebook"></span>Facebook </a></li><li><a href="#"><span class="icon icon-twitter"></span> Twitter </a></li><li><a href="#"><span class="icon icon-instagram"></span> Instagram </a></li><li><a href="#"> <span class="icon icon-google-plus"></span>Google+ </a></li><li><a href="#"> <span class="icon icon-linkedin"></span>LinkedIn </a></li></ul></div>',
                'name' => 'Default',
                'default_locale_id' => 1,
                'base_currency_id' => 1
            ]);

        DB::table('channel_currencies')->insert([
                'channel_id' => 1,
                'currency_id' => 1,
            ]);

        DB::table('channel_locales')->insert([
                'channel_id' => 1,
                'locale_id' => 1,
            ]);

        DB::table('channel_inventory_sources')->insert([
                'channel_id' => 1,
                'inventory_source_id' => 1,
            ]);
    }
}
