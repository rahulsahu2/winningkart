<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Services\APIServices\Common;

class HomeController extends Controller
{
    protected $common;
    public function __construct(Common $commonservice)
    {
        $this->common = $commonservice;
    }
    public function index()
    {
        $setting = $this->common->GetSetting();
        $myShop = $this->common->GetMyShopSetting();
        $commonsetting = $this->common->GetCommonSetting();
        $GetTopRatedProducts = $this->common->GetTopRatedProducts();
        $GetFlashSaleProductsList = $this->common->GetFlashSaleProductsList();
        $FeaturedProductsList = $this->common->GetFeaturedProductsList();
        $NewProductsList = $this->common->GetNewProductsList();
        return view('home',compact('commonsetting','setting','myShop', 'GetTopRatedProducts','GetFlashSaleProductsList','FeaturedProductsList','NewProductsList'));
    }

    public function Offers()
    {
        $res = $this->common->GetOfferDetails();
        $data = json_decode($res);
        if($data->status)
            return view('offer_Details',compact('data'));
        else{
            return view('error.404');
        }
    }

    public function LuxuryRange()
    {
        $res = $this->common->GetLuxeDetails();
        $data = json_decode($res);
        if($data->status)
            return view('luxe_details',compact('data'));
        else{
            return view('error.404');
        }
    }

}
