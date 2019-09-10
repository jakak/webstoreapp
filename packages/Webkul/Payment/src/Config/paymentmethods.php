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
        'title' => 'Bank Transfer',
        'description' => 'Bank Transfer',
        'class' => 'Webkul\Payment\Payment\MoneyTransfer',
        'active' => true
    ],
];
