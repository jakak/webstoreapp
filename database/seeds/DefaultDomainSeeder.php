<?php

use Illuminate\Database\Seeder;
use App\Domain;

class DefaultDomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Domain::create([
            'webstore_domain' => 'mywebstorespace.mystore.ng',
            'custom_domain' => 'https://mywebstore.space',
            'status' => 'Connected'
        ]);
    }
}
