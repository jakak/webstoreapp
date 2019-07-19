<?php

namespace Webkul\Payment\Payment;

/**
 * Money Transfer payment method class
 *
 * @author    Jitendra Singh <jitendra@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class MoneyTransfer extends Payment
{
    /**
     * Payment method code
     *
     * @var string
     */
    protected $code  = 'moneytransfer';

    public function getOtherDetails() {
        return [
            'bank' => $this->getConfigData('bank'),
            'account_no' => $this->getConfigData('account_no'),
            'account_name' => $this->getConfigData('account_name')
        ];
    }

    public function getRedirectUrl()
    {
        
    }
}