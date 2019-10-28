<?php

use Illuminate\Database\Seeder;
use Webkul\Attribute\Models\Attribute;

class ModifyMetaAttributes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attribute = Attribute::where('code', 'meta_title')->first();
        $attribute->type = 'text';
        $attribute->save();

        $attribute = Attribute::where('code', 'meta_keywords')->first();
        $attribute->type = 'text';
        $attribute->save();
    }
}
