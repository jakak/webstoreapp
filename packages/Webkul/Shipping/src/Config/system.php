<?php

return [
    [
        'key' => 'sales',
        'name' => 'Shipping',
        'sort' => 1
    ], [
        'key' => 'sales.carriers',
        'name' => 'Store Pickup',
        'sort' => 1,
    ], [
        'key' => 'sales.carriers.free',
        'name' => 'Store Pickup',
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
        'key' => 'sales.shipping',
        'name' => 'Shipping Origin',
        'sort' => 0
    ], [
        'key' => 'sales.shipping.origin',
        'name' => 'Origin',
        'sort' => 0,
        'fields' => [
             [
                'name' => 'street',
                'title' => 'Street Address',
                'type' => 'text',
                'validation' => 'required',
                'channel_based' => true,
                'locale_based' => false
            ], [
                'name' => 'city',
                'title' => 'City',
                'type' => 'text',
                'validation' => 'required',
                'channel_based' => true,
                'locale_based' => false
            ], [
                'name' => 'state',
                'title' => 'State',
                'type' => 'state',
                'validation' => 'required',
                'channel_based' => true,
                'locale_based' => true
            ], [
                'name' => 'zipcode',
                'title' => 'Zip Code',
                'type' => 'text',
                'validation' => 'required',
                'channel_based' => true,
                'locale_based' => false
            ], [
                'name' => 'country',
                'title' => 'Country',
                'type' => 'country',
                'validation' => 'required',
                'channel_based' => true,
                'locale_based' => true
            ], 
        ]
    ], [
        'key'   => 'sales.othermethods',
        'name'  => 'Shipping Methods',
        'sort'  => 2
    ], [
        'key'   =>  'sales.othermethods.addlocation',
        'name'  =>  'Location',
        'sort'  =>  0,
        'field_type' => 'table',
        'table_columns' => [
            'location',
            'state',
            'country',
            'rate',
            'type',
            'status',
            'actions'
        ] 
    ], [
        'key' => 'notifications',
        'name' => 'Notifications',
        'sort' => 3
    ], [
        'key' => 'notifications.store',
        'name' => 'Store Notifications',
        'sort' => 1
    ], [
        'key' => 'notifications.customer',
        'name' => 'Customer Notifications',
        'sort' => 2
    ], [
        'key' => 'email',
        'name' => 'Email Configuration',
        'sort' => 4
    ], [
        'key' => 'email.smtp',
        'name' => 'SMTP Protocol',
        'sort' => 1
    ],
    
];