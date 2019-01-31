<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\User;
use Auth;
use Hash;
use Validator;

class LoginController extends Controller
{
    public function loginGet(){
        if (Auth::check()) {
            return redirect('/home');
        }
        else{
            $messageEmail = "";
            return view('auth.login',compact('messageEmail'));
        }
    }

    public function loginPost(Request $request){
    	$username   = $request->user_name;
        $password   = $request->user_password;

        $datauser = User::where('user_name',$username)->first();
        if($datauser == false){
            $messageEmail = "Akun tidak terdaftar.";
            return view('auth.login',compact('messageEmail'));
        }
        else{
            if(Hash::check($password,$datauser->user_password)){
                Auth::login($datauser);
                return redirect('/home');
            }
            else{
                $messageEmail = "Email atau password salah.";
                return view('auth.login',compact('messageEmail'));
            }
        }
    }
}