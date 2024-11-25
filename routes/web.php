<?php

use App\Http\Controllers\AdminController_1;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HotelsController;



Route::get("/" , function(){
    return view("auth.login");
});

Auth::routes();

Route::resource("hotels" , HotelsController::class);
Route::resource("rooms" , \App\Http\Controllers\RoomController::class);
Route::get("/rooms/updateStatus/{id}" , [\App\Http\Controllers\RoomController::class , "updateStatus"])->name("rooms.updateStatus");
Route::resource("tags" , \App\Http\Controllers\TagsController::class);
Route::resource("facilities" , \App\Http\Controllers\FacilitiesController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get("/{page" , [AdminController_1::class , "index"])->middleware("auth");
