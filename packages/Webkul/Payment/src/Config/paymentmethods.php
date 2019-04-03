<?php
return [
    'cashondelivery' => [
        'code' => 'cashondelivery',
        'title' => 'Cash On Delivery',
        'description' => 'Cash On Delivery',
        'class' => 'Webkul\Payment\Payment\CashOnDelivery',
        'active' => true
    ],

    'moneytransfer' => [
        'code' => 'moneytransfer',
        'title' => 'Money Transfer',
        'description' => 'Money Transfer',
        'class' => 'Webkul\Payment\Payment\MoneyTransfer',
        'active' => true
    ],

    /* 'paypal_standard' => [
        'code' => 'paypal_standard',
        'title' => 'Paypal Standard',
        'description' => 'Paypal Standard',
        'class' => 'Webkul\Paypal\Payment\Standard',
        'sandbox' => true,
        'active' => true,
        'business_account' => 'test@webkul.com'
    ], */
    'paystack_payments' => [
        'code' => 'paystack_payments',
        'title' => 'Paystack Payments',
        'class' => 'App\Payment\Paystack',
        'description' => 'Pay securely using paystack',
        'public_key' => '',
        'secret_key' => '',
        'active' => false
    ]
];