<?php
/*
    Note: For ease, this file also contains configuration menus.
    Hopefully I will be able to refactor it to look better.
*/

return [
  [
    'key' => 'sales',
    'name' => 'Delivery',
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
        'type' => 'hidden',
        'validation' => 'required',
        'channel_based' => false,
        'locale_based' => true
      ],  [
        'name' => 'description',
        'title' => 'Write a short note for your customers',
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
    'name' => 'Delivery Origin',
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
        'type' => 'text',
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
    'name'  => 'Delivery Locations',
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
    'key' => 'notifications.smtp',
    'name' => 'Email Configuration',
    'sort' => 3
  ], [
    'key'=> 'pages',
    'name' => 'Store Pages',
    'sort' => 3
  ],  [
        'key' => 'pages.about',
        'name' => 'About',
        'sort' => 1
    ],  [
        'key' => 'pages.refund',
        'name' => 'Refund Policy',
        'sort' => 2
    ], [
        'key' => 'pages.return',
        'name' => 'Return Policy',
        'sort' => 3
    ], [
        'key' => 'pages.privacy',
        'name' => 'Privacy Policy',
        'sort' => 4
    ],  [
        'key' => 'pages.terms',
        'name' => 'Terms Of Use',
        'sort' => 5
    ],  [
        'key' => 'blog',
        'name' => 'Blog Manager',
        'sort' => 4
    ],  [
        'key' => 'blog.posts',
        'name' => 'Manage Blog',
        'sort' => 1
    ],

];
