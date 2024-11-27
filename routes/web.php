<?php

use App\Http\Controllers\AdminController_1;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SectionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HotelsController;



Route::get("/" , function(){
    return view("auth.login");
});

Auth::routes();

Route::get("/home" , [HomeController::class , "index"])->name("home");
Route::resource("invoices" , InvoicesController::class);
Route::resource("sections" , SectionController::class);
Route::resource("/products" , ProductController::class);
Route::resource("hotels" , HotelsController::class);
Route::resource("rooms" , \App\Http\Controllers\RoomController::class);
Route::get("/rooms/updateStatus/{id}" , [\App\Http\Controllers\RoomController::class , "updateStatus"])->name("rooms.updateStatus");
Route::resource("tags" , \App\Http\Controllers\TagsController::class);
Route::resource("facilities" , \App\Http\Controllers\FacilitiesController::class);
Route::resource("/booking" , \App\Http\Controllers\BookingController::class);

Route::get("/{page" , [AdminController_1::class , "index"])->middleware("auth");
