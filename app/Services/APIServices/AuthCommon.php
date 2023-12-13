<?php

namespace App\Services\APIServices;

use App\Services\APIServices\Common;

class AuthCommon extends Common
{
    public function Register($data){
        return $this->PostResult(APIPaths::$baseUrl.APIPaths::REGISTER_USER,$data);
    }

    public function GetRegisterOTP($data){
        $url = APIPaths::$baseUrl.APIPaths::SEND_OTP;
        return $this->PostResult($url,$data);
    }

    public function VerifyOTP($otp){
        $endpopint = str_replace("_OTP",$otp,APIPaths::VERIFY_OTP);
        return $this->GetResult(APIPaths::$baseUrl.$endpopint,true);
    }

    public function GetLoginOtp($data){
        return $this->PostResult(APIPaths::$baseUrl.APIPaths::SEND_LOGIN_OTP,$data);
    }

    public function GetLogin($data){
        return $this->PostResult(APIPaths::$baseUrl.APIPaths::LOGIN,$data);
    }

    public function LogOut($token){
        return $this->GetResult(APIPaths::$baseUrl.APIPaths::LOGOUT.$token);
    }
}