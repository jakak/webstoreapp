<?php

use Illuminate\Database\Seeder;
use Webkul\Core\Models\FooterContent;

class FooterContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FooterContent::updateOrCreate([
            'name' => 'about',
            'meta_title' => core()->getCurrentChannel()->business_name ?? 'My Webstore Space' . ' — ' . 'about',
            'meta_keywords' => 'webstores, store, shop, refund, information',
            'meta_description' => 'Learn about our Webstore'
        ]);

        FooterContent::updateOrCreate([
            'name' => 'refund-policy',
            'meta_title' => core()->getCurrentChannel()->business_name ?? 'My Webstore Space' . ' — ' . 'Refund Policy',
            'meta_keywords' => 'webstores, store, shop, refund, policy',
            'meta_description' => 'Learn about our Webstore'
        ]);

        FooterContent::updateOrCreate([
            'name' => 'return-policy',
            'meta_title' => core()->getCurrentChannel()->business_name ?? 'My Webstore Space' . '—' . 'Return Policy',
            'meta_keywords' => 'webstores, store, shop, policy, return',
            'meta_description' => 'Learn about our Webstore'
        ]);

        FooterContent::updateOrCreate([
            'name' => 'privacy-policy',
            'meta_title' => core()->getCurrentChannel()->business_name ?? 'My Webstore Space' . ' — ' . 'Privacy Policy',
            'meta_keywords' => 'webstores, store, shop, policy, priavcy',
            'meta_description' => 'Learn about how we keep you safe'
        ]);

        FooterContent::updateOrCreate([
            'name' => 'terms-of-use',
            'meta_title' => core()->getCurrentChannel()->business_name ?? 'My Webstore Space' . ' — ' . 'Terms of Use',
            'meta_keywords' => 'webstores, store, shop, terms, conditions',
            'meta_description' => 'Learn about our Terms and Conditions'
        ]);
    }
}
