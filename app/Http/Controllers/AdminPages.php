<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPages extends Controller
{
    public function addBeverage(){
        $title = "Add Beverages Page";
        return view('admin.addBeverage', compact('title'));
    }

    public function message(){
        $title = "Messages Page";
        return view('admin.messages', compact('title'));
    }

    public function showMessage(){
        $title = "Show Messages Page";
        return view('admin.showMessages', compact('title'));
    }

    public function editBeverage(){
        $title = "Edit Beverage Page";
        return view('admin.editBeverage', compact('title'));
    }

    public function editUser(){
        $title = "Edit User Page";
        return view('admin.editUser', compact('title'));
    }
}