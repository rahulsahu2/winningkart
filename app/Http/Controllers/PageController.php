<?php

namespace App\Http\Controllers;

use App\Services\APIServices\StaticPages;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $common;

    public function __construct(StaticPages $staticservice)
    {
        $this->common = $staticservice;
    }
     /**
     * Display content of privacy policy page.
     */
    public function privacyPolicy()
    {
        $data = $this->common->GetPrivacyPolicy();
        return view('pages.privacyPolicy',compact('data'));
    }

    public function TermsandConditions()
    {
        $data = $this->common->GetTNC();
        return view('pages.tnc',compact('data'));
    }

    public function FaQ()
    {
        $data = $this->common->GetFAQ();
        return view('pages.faq',compact('data'));
    }
}
