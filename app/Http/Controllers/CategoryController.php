<?php

namespace App\Http\Controllers;

use App\Services\APIServices\Common;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $common;

    public function __construct(Common $commonservice)
    {
        $this->common = $commonservice;
    }
     /**
     * Display content of privacy policy page.
     */
    public function Index($slug)
    {
        $res = $this->common->GetCategoryDetails($slug);
        $data = json_decode($res);
        if($data->status)
            return view('category.index',compact('data'));
        else{
            return view('error.404');
        }
    }
}
