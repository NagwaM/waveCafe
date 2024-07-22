<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPages extends Controller
{
    public function message(){
        $title = "Messages Page";
        return view('admin.messages', compact('title'));
    }

    public function showMessage(){
        $title = "Show Messages Page";
        return view('admin.showMessages', compact('title'));
    }

    public function editUser(){
        $title = "Edit User Page";
        return view('admin.editUser', compact('title'));
    }
}