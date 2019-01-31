<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\User;
use Auth;

class LogoutController extends Controller
{
    public function logoutGet(){
        Auth::logout();
        return redirect('/login');
    }
}