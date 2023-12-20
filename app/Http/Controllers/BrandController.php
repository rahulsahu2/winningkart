<?php

namespace App\Http\Controllers;

use App\Services\APIServices\Common;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    protected $common;

    public function __construct(Common $commonservice)
    {
        $this->common = $commonservice;
    }
    public function index($slug){
        $res = $this->common->GetBrandDetails($slug);
        $data = json_decode($res);
        if($data->status)
            return view('brands.index',compact('data'));
        else{
            return view('error.404');
        }
    }
}
