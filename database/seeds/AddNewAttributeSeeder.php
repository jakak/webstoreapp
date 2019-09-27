<?php

use Illuminate\Database\Seeder;

class AddNewAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attribute_id = DB::table('attributes')->insertGetId(
            ['code' => 'product_spotlight','admin_name' => 'Product Spotlight','type' => 'select','validation' => NULL,'position' => '25','is_required' => '0','is_unique' => '0','value_per_locale' => '0','value_per_channel' => '0','is_filterable' => '0','is_configurable' => '0','is_user_defined' => '0','is_visible_on_front' => '0','created_at' => now(),'updated_at' => now()]
        );

        DB::table('attribute_translations')->insert(
            ['locale' => 'en','name' => 'SKU','attribute_id' => $attribute_id]
        );
        $optionId1 = DB::table('attribute_options')->insertGetId(
            ['admin_name' => 'Featured','sort_order' => '1','attribute_id' => $attribute_id]
        );
        $optionId2 = DB::table('attribute_options')->insertGetId(
            ['admin_name' => 'New','sort_order' => '2','attribute_id' => $attribute_id]
        );
        $optionId3 = DB::table('attribute_options')->insertGetId(
            ['admin_name' => 'None','sort_order' => '3','attribute_id' => $attribute_id]
        );

        DB::table('attribute_option_translations')->insert([
            ['locale' => 'en','label' => 'Featured','attribute_option_id' => $optionId1],
            ['locale' => 'en','label' => 'New','attribute_option_id' => $optionId2],
            ['locale' => 'en','label' => 'None','attribute_option_id' => $optionId3],
        ]);

        DB::table('attribute_group_mappings')->insert(
            ['attribute_id' => $attribute_id,'attribute_group_id' => '1','position' => '11']
        );

        foreach ([5,6] as $num) {
            \Webkul\Attribute\Models\Attribute::find($num)->delete();
        }
    }
}
