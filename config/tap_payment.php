<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Tap Payment Config
    
    */

    'base_url' => 'https://api.tap.company/v2/',

    'token' => env('TAP_PAYMENT_SK_TEST'),

    'sk_test' => env('TAP_PAYMENT_SK_TEST'),
    'sk_live' => env('TAP_PAYMENT_SK_LIVE'),

    'pk_test' => env('TAP_PAYMENT_PK_TEST'),
    'pk_live' => env('TAP_PAYMENT_PK_LIVE'),

    'merchant_id' => '24758398',

    'currency' => 'SAR',

//     'redirect_url' => 'https://anothercars.com/api/payment-success',

    'redirect_url' => env('TAP_PAYMENT_REDIRECT_URL'),
    
];