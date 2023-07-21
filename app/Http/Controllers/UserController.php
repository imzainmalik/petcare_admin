<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }
    
    public function home(){
        return view('user.home');
    }
}
