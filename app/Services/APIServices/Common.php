<?php

namespace App\Services\APIServices;

use Exception;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Client;

class Common
{
    protected $client;
    public function __construct(Client $client)
    {
        $this->client = $client;
        APIPaths::$baseUrl = env("API_URL");
        APIPaths::$myShop = env("MY_SHOP");
    }

    public function GetResult($url,$codeRequired = false,$isAuth = false){
        try{
            
            $headers = $this->GetAccessToken();
            $response = $isAuth ? $this->client->get($url,$headers) : $this->client->get($url);
            $data = $response->getBody()->getContents();
            return $codeRequired ? ["code" => $response->getStatusCode(), 'message' => $data] : $data;
        }
        catch(Exception $e)
        {
            return [
                'message'=> ['notification' => env('APP_DEBUG') ? $e->getMessage() : "Something went wrong."],
                'code' => 500,
            ];
        }
    }

    public function PostResult($url,$data){
        try{
            $options = [
                'multipart' => array_map(function ($key, $value) {
                    return [
                        'name' => $key,
                        'contents' => $value,
                    ];
                }, array_keys($data), $data),
            ];

            $request = new Request('POST', $url);
            $res = $this->client->sendAsync($request, $options)->wait();
            $responseData = $res->getBody()->getContents();
            $code = $res->getStatusCode();
            $data = ["code" => $code,"message" => $responseData];
            return $data;
        }
        catch(Exception $ex){
            return [
                'message'=> ['notification' => env('APP_DEBUG') ? $ex->getMessage() : "Something went wrong."],
                'code' => 500,
            ];
        }
    }

    public function GetSetting(){
        return $this->GetResult(APIPaths::$baseUrl);
    }

    public function GetMyShopSetting(){
        return $this->GetResult(APIPaths::$baseUrl.APIPaths::SELLERS.APIPaths::$myShop);
    }

    public function GetTopRatedProducts(){
      return $this->GetResult(APIPaths::$baseUrl.APIPaths::PRODUCT_REVIEW_LIST);
    }

    public function GetFlashSaleProductsList(){
        return $this->GetResult(APIPaths::$baseUrl.APIPaths::FLASH_SALE);
    }
   
    public function GetFeaturedProductsList(){
        return $this->GetResult(APIPaths::$baseUrl.APIPaths::FEATURED_PRODUCTS);
    }

    public function GetNewProductsList(){
        return $this->GetResult(APIPaths::$baseUrl.APIPaths::NEW_PRODUCTS);
    }

    public function GetCommonSetting(){
        return $this->GetResult(APIPaths::$baseUrl.APIPaths::WEBSITE_SETUP);
    }

    public function GetBlogs($page = 1){
        return $this->GetResult(APIPaths::$baseUrl.APIPaths::BLOG.$page);
    }

    public function GetBlogbyId($slug){
        return $this->GetResult(APIPaths::$baseUrl.APIPaths::BLOG_DETAIL.$slug);
    }

    public function GetBlogsByQuery($query){
        $url = APIPaths::$baseUrl.APIPaths::BLOGS_BY_QUERY.$query;
        return $this->GetResult($url);
    }

    public function GetProducts(){
        return $this->GetResult(APIPaths::$baseUrl.APIPaths::PRODUCTS);
    }

    public function GetProductDetails($slug){
        return $this->GetResult(APIPaths::$baseUrl.APIPaths::PRODUCTS.$slug);
    }



    public static function GetHeader(){
        $c = new Client();
      return (new Common($c))->GetSetting();
    }

    public static function GetShopHeader(){
        $c = new Client();
      return (new Common($c))->GetMyShopSetting();
    }

    public static function GetCommonHeader(){
        $c = new Client();
      return (new Common($c))->GetCommonSetting();
    }

    public static function GetSession(){
        // Retrieving data from the session
        $sessionData = session('token_details');

        // Converting JSON string to object
        $userObject = json_decode($sessionData);
        return $userObject;
    }

    public function GetAccessToken(){
        $sessionData = session('token_details');
        $headers = ['Authorization' => ''];

        if($sessionData){
            $session = json_decode($sessionData);
            $headers = [
                'Authorization' => $session ? $session->notification->original->access_token : ''
            ];
        }
        return $headers;
    }

}