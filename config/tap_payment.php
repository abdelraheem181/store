<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Tap Payment Config
    
    */

    'base_url' => 'https://api.tap.company/v2/',

    'token' => 'sk_test_vET4aBJuLFVfHIYDMoKRr8wn',

    'sk_test' => 'sk_test_vET4aBJuLFVfHIYDMoKRr8wn',
    'sk_live' => 'sk_live_5ic0z1xInsF2bXepWRgD6Akw',

    'pk_test' => 'pk_test_ou6GRtEK04HVUQ3irCkIbjah',
    'pk_live' => 'pk_live_HdviEPTfSMgbel6nqhmJ293K',

    'merchant_id' => '24758398',

    'currency' => 'SAR',

//     'redirect_url' => 'https://anothercars.com/api/payment-success',

    'redirect_url' => 'http://localhost:8000/payment-callback',
    
];