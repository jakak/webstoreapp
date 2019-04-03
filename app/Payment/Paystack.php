<?php

namespace App\Payment;

use Webkul\Payment\Payment\Payment;

class Paystack extends Payment
{
    protected $code = "paystack_payments";

    public function getRedirectUrl()
    {

    }
}
