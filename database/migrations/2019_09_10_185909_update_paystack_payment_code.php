<?php

use Illuminate\Database\Migrations\Migration;
use Webkul\Core\Models\CoreConfig;

class UpdatePaystackPaymentCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $allconfig = CoreConfig::where('code', 'like', '%paystack%')->get();
        foreach ($allconfig as $config) {
            $myArr = explode('.', $config->code);
            unset($myArr[1]);
            $myArr = array_values($myArr);
            $prev = $myArr[2];
            $myArr[2] = 'index';
            array_push($myArr, $prev);
            $code = implode('.', $myArr);
            $config->code = $code;
            $config->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $allconfig = CoreConfig::where('code', 'like', '%paystack%')->get();
        foreach ($allconfig as $config) {
            $myArr = explode('.', $config->code);
            unset($myArr[2]);
            $myArr = array_values($myArr);
            $prev = $myArr[1];
            $myArr[1] = 'paymentmethods';
            $old = $myArr[2];
            $myArr[2] = $prev;
            array_push($myArr, $old);
            $code = implode('.', $myArr);
            $config->code = $code;
            $config->save();
        }
    }
}
