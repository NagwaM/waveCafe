<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontPages extends Controller
{
    public function index(){
        $title = "Wave Cafe Website";
        return view('Home', compact('title'));
    }
}