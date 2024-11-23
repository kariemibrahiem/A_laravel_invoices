<?php

use App\Http\Controllers\AdminController_1;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get("/" , function(){
    return view("auth.login");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get("/{page" , [AdminController_1::class , "index"])->middleware("auth");
