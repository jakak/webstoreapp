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
        $productSpotLight = DB::table('attribute_group_mappings')
            ->where('attribute_id', 26)
            ->where('attribute_group_id', 1)
            ->update(['position' =>  5]);
        $productSpotLight = DB::table('attribute_group_mappings')
            ->where('attribute_id', 28)
            ->where('attribute_group_id', 1)
            ->update(['position' =>  5]);
        $productSpotLight = DB::table('attribute_group_mappings')
            ->where('attribute_id', 4)
            ->where('attribute_group_id', 1)
            ->update(['position' =>  6]);
        $productSpotLight = DB::table('attribute_group_mappings')
            ->where('attribute_id', 8)
            ->where('attribute_group_id', 1)
            ->update(['position' =>  7]);
    }
}
