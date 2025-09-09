<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;


class TapPaymentService
{

    /*
    |--------------------------------------------------------------------------
    | Create Charge Payment
    |--------------------------------------------------------------------------
    */
    public static function pay($data)
    {
        $body = TapPaymentService::getBody($data);
        
        $request = TapPaymentService::makeRequest();

        $response =  $request->post('/charges',$body);

        return $response->object();
    }

    /*
    |--------------------------------------------------------------------------
    | Verify Payment
    |--------------------------------------------------------------------------
    */
    public static function getCharge($charge_id)
    {
        
        $request = TapPaymentService::makeRequest();

        $url = "/charges/".$charge_id;

        $response =  $request->get($url);
        
        return $response->object();
    }

    /*
    |--------------------------------------------------------------------------
    | Make Request
    |--------------------------------------------------------------------------
    */
    public static function makeRequest()
	{
        $base_url = config('tap_payment.base_url','https://api.tap.company/v2');

        $token = config('tap_payment.token');

		$request = Http::baseUrl($base_url)->asJson()->withToken($token)->withHeaders(['lang_code'=>'AR']);

		return $request;
	}
    
    /*
    |--------------------------------------------------------------------------
    | get Settings
    |--------------------------------------------------------------------------
    */
    public static function getBody($data)
    {
        $body = [];

        $body = 
        [
            "amount" => $data['amount'], 
            "currency" =>  config('tap_payment.currency'), 
            "threeDSecure" => true, 
            "save_card" => false, 
            "description" => $data['description'],
            "statement_descriptor" =>  $data['description'], 
            "metadata" => [
                "udf1" => "test 1", 
                "udf2" => "test 2" 
            ], 
            "reference" => [
            "transaction" => "txn_0001", 
            "order" => "ord_0001"],
            "receipt" => [
            "email" => false, 
            "sms" => true 
            ], 
            "customer" => [
            "first_name" => $data['first_name'], 
            "middle_name" => "", 
            "last_name" => $data['last_name'], 
            "email" =>  $data['email'], 
            "phone" => [
                "country_code" => $data['country_code'], 
                "number" =>  $data['phone_number']
                ] 
            ], 
            "merchant" => [
                "id" => config('tap_payment.merchant_id')
            ], 
            "source" => [
                "id" => "src_card" 
            ],
            "post" => [
                 "url" => config('tap_payment.redirect_url')
                ],
                "redirect" => [
                    "url" =>  config('tap_payment.redirect_url')
                    ] 
        ];
        return $body;
    }

}