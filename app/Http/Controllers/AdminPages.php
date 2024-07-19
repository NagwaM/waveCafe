<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPages extends Controller
{
    public function addBeverage(){
        $title = "Add Beverages Page";
        return view('admin.addBeverage', compact('title'));
    }

    public function addCategory(){
        $title = "Add Categories Page";
        return view('admin.addCategory', compact('title'));
    }

    public function addUser(){
        $title = "Add Users Page";
        return view('admin.addUser', compact('title'));
    }

    public function beverages(){
        $title = "Beverages Page";
        return view('admin.beverages', compact('title'));
    }

    public function categories(){
        $title = "Categories Page";
        return view('admin.categories', compact('title'));
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

    public function editCategory(){
        $title = "Edit Category Page";
        return view('admin.editCategory', compact('title'));
    }

    public function editUser(){
        $title = "Edit User Page";
        return view('admin.editUser', compact('title'));
    }
}