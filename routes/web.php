<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontPages;
use App\Http\Controllers\AdminPages;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BeverageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('Homee', [FrontPages::class, 'index'])->name('Homee');


Route::get('users', [UsersController::class, 'index'])->name('users')->middleware('verified');
Route::get('ShowAddUser',[UsersController::class, 'create'])->name('ShowAddUser');
Route::post('AddUser',[UsersController::class, 'store'])->name('AddUser');
Route::get('ShowEditUser/{id}',[UsersController::class, 'edit'])->name('ShowEditUser');
Route::put('editUser/{id}',[UsersController::class, 'update'])->name('editUser');

Route::get('categories', [CategoryController::class, 'index'])->name('categories');
Route::get('ShowAddCategory', [CategoryController::class, 'create'])->name('ShowAddCategory');
Route::post('AddCategory', [CategoryController::class, 'store'])->name('AddCategory');
Route::get('ShowEditCategory/{id}',[CategoryController::class, 'edit'])->name('ShowEditCategory');
Route::put('editCategory/{id}',[CategoryController::class, 'update'])->name('editCategory');
Route::delete('deleteCategory',[CategoryController::class, 'destroy'])->name('deleteCategory');

Route::get('beverages', [BeverageController::class, 'index'])->name('beverages');
Route::get('ShowAddBeverage', [BeverageController::class, 'create'])->name('ShowAddBeverage');
Route::post('AddBeverage', [BeverageController::class, 'store'])->name('AddBeverage');
Route::get('ShowEditBeverage/{id}',[BeverageController::class, 'edit'])->name('ShowEditBeverage');
Route::put('editBeverage/{id}',[BeverageController::class, 'update'])->name('editBeverage');
Route::delete('deleteBeverage',[BeverageController::class, 'destroy'])->name('deleteBeverage');


Route::get('messages', [AdminPages::class, 'message'])->name('messages');
Route::get('showMessage', [AdminPages::class, 'showMessage'])->name('showMessage');


Auth::routes(['verify' => true]);
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified');

Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');