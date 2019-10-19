<?php

use Illuminate\Database\Seeder;

class CustomAttributeGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attribute_groups')->insert([
            'name' => 'CustomAttributeGroup', 'position' => '6','is_user_defined' => '0','attribute_family_id' => '1'
        ]);
    }
}
