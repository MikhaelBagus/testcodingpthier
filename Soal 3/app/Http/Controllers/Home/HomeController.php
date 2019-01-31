<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Hash;
use Validator;

class HomeController extends Controller
{
    public function index(){
        return view('home.home');
    }
}