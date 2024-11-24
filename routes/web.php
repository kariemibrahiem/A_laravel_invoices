<?php

use App\Http\Controllers\AdminController_1;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SectionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get("/" , function(){
    return view("auth.login");
});

Auth::routes();

Route::get("/home" , [HomeController::class , "index"])->name("home");
Route::resource("invoices" , InvoicesController::class);
Route::resource("sections" , SectionController::class);
Route::resource("/products" , ProductController::class);
Route::get("/{page" , [AdminController_1::class , "index"])->middleware("auth");
