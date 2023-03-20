<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AaharCatering extends Controller
{
    function __construct(){
        $this->middleware('auth')->except('login','signUp');
    }
    function login(){
        return view('aahar.login');
    }
    function signUp(){
        return view('aahar.signup');
    }
    function dashboard(){
        return view('aahar.dashboard');
    }
}
