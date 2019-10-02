<?php

use Illuminate\Database\Seeder;
use Webkul\Attribute\Models\Attribute;
use Webkul\Attribute\Models\AttributeTranslation;

//use DB;

class UpdateAttributesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $short_description = Attribute::where('code', 'short_description')->first();
        $short_description->admin_name = 'Summary';
        $short_description->save();

        $short_description = AttributeTranslation::where('name', 'Short Description')->first();
        $short_description->name = 'Summary';
        $short_description->save();
    }
}
