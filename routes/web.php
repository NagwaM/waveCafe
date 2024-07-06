<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontPages;

Route::get('/', function () {
    return view('welcome');
});

Route::get('homePage', [FrontPages::class, 'index'])->name('homePage');