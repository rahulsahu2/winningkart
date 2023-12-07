<?php

namespace App\Http\Controllers;

use App\Services\APIServices\AuthCommon;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $common;

    public function __construct(AuthCommon $commonservice)
    {
        $this->common = $commonservice;
    }

    public function Registration(Request $request){
        $email = $request->email;
        $name  = $request->name;
        $password = sha1(time());

        $data['name'] = $name;
        $data['email'] = $email;
        $data['password'] = $password;

        $response = $this->common->Register($data);
        if($response->)
        session()->flash('success', 'OTP Sent to Your Email Succcessfully');
        return view('auth.register-with-otp')->with('user',$user);
    }
   
}
