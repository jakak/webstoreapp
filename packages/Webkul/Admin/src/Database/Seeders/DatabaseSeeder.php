<?php

namespace Webkul\Admin\Database\Seeders;

use ColorPickerTableSeeder;
use DefaultSocialIconTableSeeder;
use FooterContentTableSeeder;
use Illuminate\Database\Seeder;
use MailSettingsTableSeeder;
use SliderTableSeeder;
use ThemeTableSeeder;
use Webkul\Category\Database\Seeders\DatabaseSeeder as CategorySeeder;
use Webkul\Attribute\Database\Seeders\DatabaseSeeder as AttributeSeeder;
use Webkul\Core\Database\Seeders\DatabaseSeeder as CoreSeeder;
use Webkul\User\Database\Seeders\DatabaseSeeder as UserSeeder;
use Webkul\Customer\Database\Seeders\DatabaseSeeder as CustomerSeeder;
use Webkul\Inventory\Database\Seeders\DatabaseSeeder as InventorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        $this->call(InventorySeeder::class);
        $this->call(CoreSeeder::class);
        $this->call(AttributeSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(FooterContentTableSeeder::class);
        $this->call(ColorPickerTableSeeder::class);
        $this->call(DefaultSocialIconTableSeeder::class);
        $this->call(MailSettingsTableSeeder::class);
        $this->call(ThemeTableSeeder::class);
        $this->call(SliderTableSeeder::class);
    }
}
