<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontPages;
use App\Http\Controllers\AdminPages;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('Homee', [FrontPages::class, 'index'])->name('Homee');

Route::get('AddBeverage', [AdminPages::class, 'addBeverage'])->name('AddBeverage');
//Route::get('AddCategory', [AdminPages::class, 'addCategory'])->name('AddCategory');
// Route::get('AddUser', [AdminPages::class, 'addUser'])->name('AddUser');


Route::get('beverages', [AdminPages::class, 'beverages'])->name('beverages');

Route::get('users', [UsersController::class, 'index'])->name('users');
Route::get('ShowAddUser',[UsersController::class, 'create'])->name('ShowAddUser');
Route::post('AddUser',[UsersController::class, 'store'])->name('AddUser');
Route::get('ShowEditUser/{id}',[UsersController::class, 'edit'])->name('ShowEditUser');
Route::put('editUser/{id}',[UsersController::class, 'update'])->name('editUser');

Route::get('categories', [CategoryController::class, 'index'])->name('categories');
Route::get('ShowAddCategory', [CategoryController::class, 'create'])->name('ShowAddCategory');
Route::post('AddCategory', [CategoryController::class, 'store'])->name('AddCategory');
Route::get('ShowEditCategory/{id}',[CategoryController::class, 'edit'])->name('ShowEditCategory');
Route::put('editCategory/{id}',[CategoryController::class, 'update'])->name('editCategory');


Route::get('messages', [AdminPages::class, 'message'])->name('messages');
Route::get('showMessage', [AdminPages::class, 'showMessage'])->name('showMessage');

Route::get('editBeverage', [AdminPages::class, 'editBeverage'])->name('editBeverage');

Route::get('registerr', [AdminPages::class, 'registerUser'])->name('registerr');
Route::get('loginn', [AdminPages::class, 'loginUser'])->name('loginn');

//Auth::routes();
Auth::routes(['verify' => true]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified');

