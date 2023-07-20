<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        abort(503);
    }
}
