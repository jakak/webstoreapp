<?php

use Illuminate\Database\Seeder;
use Webkul\Core\Models\CoreConfig;

class ConvertSalesToPayment extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 1;
        $payment_config = 'sales.paymentmethod';
        foreach (CoreConfig::all() as $config) {
            if (strpos($config->code, $payment_config) !== false ) {
                $str = str_replace('sales.', 'payment.', $config->code);
                $config->code = $str;
                $config->save();
                echo $count++ . PHP_EOL;
                echo $config->code .PHP_EOL;
            }
        }
    }
}
