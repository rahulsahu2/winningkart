<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\APIServices\AuthCommon;
use Exception;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $common;

    public function __construct(AuthCommon $commonservice)
    {
        $this->common = $commonservice;
    }

    public function Profile(){
        return view('profile.profile');
    }

    public function Login(){
        return view('auth.login');
    }

    public function VerifyOTP(){
        return view('auth.verify-email');
    }

    public function Registration(Request $request){
        $email = $request->email;
        $name  = $request->name;
        $password = sha1(time());

        $data['name'] = $name;
        $data['email'] = $email;
        $data['password'] = $password;
        $data['agree'] = 1;
    
        $response = $this->common->Register($data);
        $data = json_decode($response, true);
        $message = $data['message'];
        $code = $data['code'];
        if($code == 201)
        {
            $user = new User;
            $user->email = $email;
            $user->name = $name;    
            session()->flash('success', $message);
            return view('auth.register-with-otp',compact(['user']));
        }
        else{
            session()->flash('success', $message);
            return view('auth.register');
        }
    }

    public function SendLoginOtp(Request $request){
        $email = $request->email;
        $data['email'] = $email;
    
        $response = $this->common->GetLoginOtp($data);
        print_r($response);
        $message = $response['message'];
        $code = $response['code'];
        if($code == 200)
        {
            $user = new User;
            $user->email = $email; 
            $data = json_decode($message);
            session()->flash('success', $data->notification);
            return view('auth.login-with-otp',compact(['user']));
        }
        else{
            session()->flash('success', $message);
            return view('auth.register');
        }
    }

    public function VerifyLoginOtp(Request $request){
        $email = $request->email;
        $data['email'] = $email;
    
        $response = $this->common->GetLogin($data);
        print_r($response);
        $message = $response['message'];
        $code = $response['code'];
        if($code == 200)
        {
            Session::put('token_details', $message);
            Session::flash('success', "Account Logged in Successfully");
            return redirect('/');
        }
        else{
            session()->flash('success', $message);
            return view('auth.register');
        }
    }

    public function GetVerifyOtp(Request $request){
        $otp = $request->otp;
        $response = $this->common->VerifyOTP($otp);
        print_r($response);
        $code = $response['code'];
        if ($code === 200) {
            Session::put('token_details', $response['message']);
            Session::flash('success', "Account Verified Successfully");
            return redirect('/');
        } else {
            Session::flash('success', "Invalid or Expired Otp. Please try again.");
        }
    }

    public function ResendOtp(Request $request){

    }

    public function Logout(){
        //Session::flush();
        Session::forget('token_details');
        Session::flash('success', "Account Logout Successfully");
        return Redirect::back()->with('reload', true);
    }
}
