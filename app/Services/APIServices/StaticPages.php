<?php

namespace App\Services\APIServices;

use GuzzleHttp\Client;

class StaticPages
{
    protected $client;
    public function __construct(Client $client)
    {
        $this->client = $client;
        APIPaths::$baseUrl = env("API_URL");
    }

    private function GetResult($url){
        $response = $this->client->get($url);
        return $response->getBody()->getContents();
    }

    public function GetAboutUs(){
        return $this->GetResult(APIPaths::$baseUrl.APIPaths::ABOUT_US);
    }

    public function GetCancellationReturn(){
        return $this->GetResult(APIPaths::$baseUrl.APIPaths::CANCELLATION_RETURN);
    }

    public function GetPrivacyPolicy(){
        return $this->GetResult(APIPaths::$baseUrl.APIPaths::PRIVACY_POLICY);
    }

    public function GetTNC(){
        return $this->GetResult(APIPaths::$baseUrl.APIPaths::TERMS_AND_CONDITIONS);
    }
    public function GetFAQ(){
        return $this->GetResult(APIPaths::$baseUrl.APIPaths::FAQ);
    }
    public function GetSellerPolicy(){
        return $this->GetResult(APIPaths::$baseUrl.APIPaths::SELLER_TERMS_CONDITIONS);
    }
    public function GetShippingAndReturn(){
        return $this->GetResult(APIPaths::$baseUrl.APIPaths::SHIPPING_AND_RETURNS);
    }

}