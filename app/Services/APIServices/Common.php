<?php

namespace App\Services\APIServices;

use Exception;
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

    private function GetResult($url){
        try{
        $response = $this->client->get($url);
        return $response->getBody()->getContents();
        }
        catch(Exception $e)
        {
            return false;
        }
    }

    private function PostResult($url,$data){
        try{
            $request = $this->client->post($url,["body"=> $data]);
            $resp = $request->send();
            return $resp;
        }
        catch(Exception $ex){
            return false;
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

}