<?php

use Illuminate\Database\Seeder;

class ProductAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $descriptionItems = DB::table('attribute_group_mappings')
            ->where('attribute_group_id',2)
            ->update(['attribute_group_id' => 1, 'position' => 3]);

        $descriptionItems = DB::table('attribute_group_mappings')
            ->where('attribute_id',3)
            ->update(['attribute_group_id' => 3, 'position' => 0]);
    }
}
