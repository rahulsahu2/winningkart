<?php

namespace App\Services\APIServices;

use App\Services\APIServices\Common;

class AuthCommon extends Common
{
    public function Register($data){
        return $this->client->PostResult(APIPaths::$baseUrl.APIPaths::REGISTER_USER,$data);
    }

    public function GetRegisterOTP(){
        $url = APIPaths::$baseUrl.APIPaths::SEND_OTP;
        return $this->GetResult($url);
    }

    public function VerifyOTP($otp){
        return $this->GetResult(APIPaths::$baseUrl.APIPaths::VERIFY_OTP);
    }

    public function Login($data){
        return $this->PostResult(APIPaths::$baseUrl.APIPaths::LOGIN,$data);
    }

    public function LogOut($token){
        return $this->GetResult(APIPaths::$baseUrl.APIPaths::LOGOUT.$token);
    }
}