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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
