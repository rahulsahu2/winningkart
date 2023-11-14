<?php

namespace App\Http\Controllers;

class ErrorController extends Controller
{
    protected $common;

    public function __construct()
    {
       
    }
     /**
     * Display content of privacy policy page.
     */
    public function Error404()
    {
        return view('error.404');
    }
}
