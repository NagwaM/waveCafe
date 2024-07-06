<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontPages;
use App\Http\Controllers\AdminPages;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', [FrontPages::class, 'index'])->name('home');

Route::get('AddBeverage', [AdminPages::class, 'addBeverage'])->name('AddBeverage');
Route::get('AddCategory', [AdminPages::class, 'addCategory'])->name('AddCategory');
Route::get('AddUser', [AdminPages::class, 'addUser'])->name('AddUser');

Route::get('beverages', [AdminPages::class, 'beverages'])->name('beverages');
Route::get('categories', [AdminPages::class, 'categories'])->name('categories');
Route::get('users', [AdminPages::class, 'users'])->name('users');
Route::get('messages', [AdminPages::class, 'message'])->name('messages');
Route::get('showMessage', [AdminPages::class, 'showMessage'])->name('showMessage');

Route::get('editBeverage', [AdminPages::class, 'editBeverage'])->name('editBeverage');
Route::get('editCategory', [AdminPages::class, 'editCategory'])->name('editCategory');
Route::get('editUser', [AdminPages::class, 'editUser'])->name('editUser');