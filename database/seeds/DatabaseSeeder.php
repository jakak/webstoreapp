<?php

use Illuminate\Database\Seeder;
use Webkul\Admin\Database\Seeders\DatabaseSeeder as BagistoDatabaseSeeder;
use Webkul\Attribute\Database\Seeders\AttributeGroupTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(BagistoDatabaseSeeder::class);
        $this->call(AttributeGroupTableSeeder::class);
    }
}
