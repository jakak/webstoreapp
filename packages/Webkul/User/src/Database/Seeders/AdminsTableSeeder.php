<?php

namespace Webkul\User\Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AdminsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->delete();

        DB::table('admins')->insert([
                'id' => 1,
                'first_name' => 'Jane',
                'last_name' => 'Roe',
                'email' => 'janeroe@webstore.ng',
                'password' => bcrypt('@hashtag18*'),
                'status' => 1,
                'role_id' => 1,
            ]);
    }
}
