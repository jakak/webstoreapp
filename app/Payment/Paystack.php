<?php

namespace App\Payment;

use Webkul\Payment\Payment\Payment;

class Paystack extends Payment
{
    protected $code = "paystack_payments";

    public function getRedirectUrl()
    {

    }

    public function getConfigData($field)
    {
        return core()->getConfigData('payment.' . $this->getCode() . '.' . 'index.' . $field);
    }

    public function getTitle()
    {
        return 'Paystack Payment';
    }

    public function getDescription()
    {
        return "We've made making payment easy for you.";
    }

    public function getOtherDetails()
    {
        return null;
    }
}
