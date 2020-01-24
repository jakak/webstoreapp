<?php

namespace Webkul\Category\Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->delete();

        $now = Carbon::now();

        // Root Category
        DB::table('categories')->insert([
            ['id' => '1','position' => '1','image' => NULL,'status' => '1','_lft' => '1','_rgt' => '14','parent_id' => NULL, 'created_at' => $now, 'updated_at' => $now]
        ]);
        DB::table('category_translations')->insert([
            ['id' => '1','name' => 'Root Category','slug' => 'root-category','description' => 'Root Category','meta_title' => '','meta_description' => '','meta_keywords' => '','category_id' => '1','locale' => 'en']
        ]);

        // Category 1
        DB::table('categories')->insert([
            ['id' => '2','position' => '2','image' => NULL,'status' => '1','_lft' => '6','_rgt' => '7','parent_id' => NULL, 'created_at' => $now, 'updated_at' => $now]
        ]);

        DB::table('category_translations')->insert([
            ['id' => '2','name' => 'Category 1','slug' => 'category-1','description' => 'category 1','meta_title' => '','meta_description' => '','meta_keywords' => '','category_id' => '2','locale' => 'en']
        ]);

        // Category 2
        DB::table('categories')->insert([
            ['id' => '3','position' => '3','image' => NULL,'status' => '1','_lft' => '8','_rgt' => '9','parent_id' => NULL, 'created_at' => $now, 'updated_at' => $now]
        ]);

        DB::table('category_translations')->insert([
            ['id' => '3','name' => 'Category 2','slug' => 'category-2','description' => 'category 2','meta_title' => '','meta_description' => '','meta_keywords' => '','category_id' => '3','locale' => 'en']
        ]);

        // Category 3
        DB::table('categories')->insert([
            ['id' => '4','position' => '4','image' => NULL,'status' => '1','_lft' => '10','_rgt' => '11','parent_id' => NULL, 'created_at' => $now, 'updated_at' => $now]
        ]);

        DB::table('category_translations')->insert([
            ['id' => '4','name' => 'Category 3','slug' => 'category-3','description' => 'category 3','meta_title' => '','meta_description' => '','meta_keywords' => '','category_id' => '4','locale' => 'en']
        ]);
    }
}
