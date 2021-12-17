<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController; 



Route::get('/login',function(){return view ('login');})->name('login')->middleware('guest');

Route::get('/home',function(){return view('welcome');})->middleware('auth')->name('home');

Route::post('/login',[LoginController::class,'login']);
Route::put('/login',[LoginController::class,'logout']); 

Route::resource('productos','App\Http\Controllers\ProductoController');