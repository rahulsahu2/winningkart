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
    public function Category($id)
    {
        $data = $this->common->GetProducts();
        return view('category.index',compact('data'));
    }
}
