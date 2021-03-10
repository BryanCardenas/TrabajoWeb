<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except(['login']);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function home(){
        return view('home');
    }

    public function password(){
        return view('auth.password');
    }
}
