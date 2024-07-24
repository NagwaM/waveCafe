<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Beverage;

class FrontPages extends Controller
{
    public function index(Request $request){
        $title = "Wave Cafe Website";
        $categories = Category::get();
        $beverages = Beverage::get();
        return view('cafeHomePage', compact('categories', 'beverages', 'title'));
    }
}