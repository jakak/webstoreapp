<?php

return [
    [
        'key'   => 'payment',
        'name'  => 'Payments',
        'sort'  => 3
    ], [
        'key'   => 'payment.paymentmethods',
        'name'  => 'Payment Methods',
        'sort'  => 1
    ], [
        'key' => 'payment.paymentmethods.cashondelivery',
        'name' => 'Cash On Delivery',
        'sort' => 1,
        'fields' => [
            [
                'name' => 'title',
                'title' => 'Title',
                'type' => 'text',
                'validation' => 'required',
                'channel_based' => false,
                'locale_based' => true
            ], [
                'name' => 'description',
                'title' => 'Description',
                'type' => 'textarea',
                'channel_based' => false,
                'locale_based' => true
            ], [
                'name' => 'active',
                'title' => 'Status',
                'type' => 'select',
                'options' => [
                    [
                        'title' => 'Active',
                        'value' => true
                    ], [
                        'title' => 'Inactive',
                        'value' => false
                    ]
                ],
                'validation' => 'required'
            ]
        ]
    ], [
        'key' => 'payment.paymentmethods.moneytransfer',
        'name' => 'Bank Transfer',
        'sort' => 2,
        'fields' => [
            [
                'name' => 'bank',
                'title' => 'Bank Name',
                'type' => 'text',
                'validation' => 'required',
                'channel_based' => false,
                'locale_based' => true
            ], [
                'name' => 'account_no',
                'title' => 'Account Number',
                'type' => 'text',
                'channel_based' => false,
                'locale_based' => true
            ], [
                'name' => 'account_name',
                'title' => 'Account Name',
                'type' => 'text',
                'channel_based' => false,
                'locale_based' => true
            ], [
                'name' => 'active',
                'title' => 'Status',
                'type' => 'select',
                'options' => [
                    [
                        'title' => 'Active',
                        'value' => true
                    ], [
                        'title' => 'Inactive',
                        'value' => false
                    ]
                ],
                'validation' => 'required'
            ]
        ]
    ],  [
        'key' => 'payment.paymentmethods.paystack_payments',
        'name' => 'Paystack Payments',
        'sort' => 3,
        'fields' => [
            [
                'name' => 'secret_key',
                'title' => 'Live Secret Key',
                'type' => 'text',
                'validation' => 'required',
                'channel_based' => false,
                'locale_based' => true
            ],  [
                'name' => 'public_key',
                'title' => 'Live Public Key',
                'type' => 'text',
                'validation' => 'required',
                'channel_based' => false,
                'locale_based' => true
            ], [
                'name' => 'description',
                'title' => 'Description',
                'type' => 'textarea',
                'channel_based' => false,
                'validation' => 'required'
            ],  [
                'name' => 'active',
                'title' => 'Status',
                'type' => 'select',
                'options' => [
                    [
                        'title' => 'Active',
                        'value' => true
                    ], [
                        'title' => 'Inactive',
                        'value' => false
                    ]
                ],
                'validation' => 'required'
            ]
        ]
    ]
    /* [
        'key' => 'sales',
        'name' => 'Sales',
        'sort' => 1
    ], [
        'key' => 'sales.paymentmethods',
        'name' => 'Payment Methods',
        'sort' => 2,
    ], [
        'key' => 'sales.paymentmethods.cashondelivery',
        'name' => 'Cash On Delivery',
        'sort' => 1,
        'fields' => [
            [
                'name' => 'title',
                'title' => 'Title',
                'type' => 'text',
                'validation' => 'required',
                'channel_based' => false,
                'locale_based' => true
            ], [
                'name' => 'description',
                'title' => 'Description',
                'type' => 'textarea',
                'channel_based' => false,
                'locale_based' => true
            ], [
                'name' => 'active',
                'title' => 'Status',
                'type' => 'select',
                'options' => [
                    [
                        'title' => 'Active',
                        'value' => true
                    ], [
                        'title' => 'Inactive',
                        'value' => false
                    ]
                ],
                'validation' => 'required'
            ]
        ]
    ], [
        'key' => 'sales.paymentmethods.moneytransfer',
        'name' => 'Money Transfer',
        'sort' => 2,
        'fields' => [
            [
                'name' => 'title',
                'title' => 'Title',
                'type' => 'text',
                'validation' => 'required',
                'channel_based' => false,
                'locale_based' => true
            ], [
                'name' => 'description',
                'title' => 'Description',
                'type' => 'textarea',
                'channel_based' => false,
                'locale_based' => true
            ], [
                'name' => 'active',
                'title' => 'Status',
                'type' => 'select',
                'options' => [
                    [
                        'title' => 'Active',
                        'value' => true
                    ], [
                        'title' => 'Inactive',
                        'value' => false
                    ]
                ],
                'validation' => 'required'
            ]
        ]
    ],  [
        'key' => 'sales.paymentmethods.paystack_payments',
        'name' => 'Paystack Payments',
        'sort' => 3,
        'fields' => [
            [
                'name' => 'secret_key',
                'title' => 'Live Secret Key',
                'type' => 'text',
                'validation' => 'required',
                'channel_based' => false,
                'locale_based' => true
            ],  [
                'name' => 'public_key',
                'title' => 'Live Public Key',
                'type' => 'text',
                'validation' => 'required',
                'channel_based' => false,
                'locale_based' => true
            ], [
                'name' => 'description',
                'title' => 'Description',
                'type' => 'textarea',
                'channel_based' => false,
                'validation' => 'required'
            ],  [
                'name' => 'active',
                'title' => 'Status',
                'type' => 'select',
                'options' => [
                    [
                        'title' => 'Active',
                        'value' => true
                    ], [
                        'title' => 'Inactive',
                        'value' => false
                    ]
                ],
                'validation' => 'required'
            ]
        ]
    ] */
];