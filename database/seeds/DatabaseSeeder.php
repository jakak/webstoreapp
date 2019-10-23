<?php

use Illuminate\Database\Seeder;
use Webkul\Admin\Database\Seeders\DatabaseSeeder as BagistoDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BagistoDatabaseSeeder::class);
        $this->call(FooterContentTableSeeder::class);
        $this->call(ColorPickerTableSeeder::class);
        $this->call(IconTableSeeder::class);
    }
}
