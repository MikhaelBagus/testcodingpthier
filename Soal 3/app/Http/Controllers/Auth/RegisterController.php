<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\User;
use Hash;
use Validator;

class RegisterController extends Controller
{
    public function registerGet(){
    	return view('auth.register');
    }

    public function registerPost(Request $request){
    	$message = [
            'user_full_name.required'                 => 'Nama Lengkap tidak boleh kosong',
            'user_full_name.max'                      => 'Nama Lengkap maksimal 255 karakter',
            'user_name.required'                      => 'Username tidak boleh kosong',
            'user_name.unique'                        => 'Username sudah terdaftar',
            'user_name.max'                           => 'Username maksimal 255 karakter',
            'user_no_rekening.required'               => 'No Rekening tidak boleh kosong',
            'user_no_rekening.numeric'                => 'No Rekening harus angka',
            'user_no_rekening.unique'                 => 'No Rekening sudah terdaftar',
            'user_password.required'                  => 'Password tidak boleh kosong',
            'user_password.min'                       => 'Password harus memiliki minimal 6 karakter',
            'user_password.confirmed'                 => 'Password tidak sama dengan konfirmasi Password',
            'password_confirmation.required'          => 'Konfirmasi Password tidak boleh kosong',
            'password_confirmation.min'               => 'Konfirmasi Password harus memiliki minimal 6 karakter'
        ];
 		$validator = Validator::make($request->all(), [
            'user_full_name' 			 => 'required|max:255',
            'user_name' 				 => 'required|unique:ms_user,user_name|max:255',
            'user_no_rekening'   		 => 'required|unique:ms_user,user_no_rekening|numeric',
            'user_password'				 => 'required|min:6|confirmed',
            'user_password_confirmation' => 'required|min:6'
        ], $message);

        if ($validator->passes()) {
	    	$user            		= new User;
	        $user->role_id   		= 2;
	        $user->user_name 		= $request->user_name;
	        $user->user_full_name   = $request->user_full_name;
	        $user->user_no_rekening = $request->user_no_rekening;
	        $user->user_password    = Hash::make($request->user_password);
	        $user->user_saldo       = 0;
	        $user->save();

            return redirect('login');
        }
        else{
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
}