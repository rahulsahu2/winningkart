<?php

namespace App\Http\Controllers;

use App\Services\APIServices\Common;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $common;

    public function __construct(Common $commonservice)
    {
        $this->common = $commonservice;
    }
     /**
     * Display content of privacy policy page.
     */
    public function Products()
    {
        $data = $this->common->GetProducts();
        return view('products.index',compact('data'));
    }

    public function Product_details($slug)
    {
        $data = $this->common->GetProductDetails($slug);
        return view('products.product-details',compact('data'));
    }
}
