<?php
use Illuminate\http\Controllers;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('registro', [UserController::class, 'registro']);
Route::post('login', [UserController::class, 'login']);

Route::resource('producto', ProductoController::class);

Route::get('/login',function(){return view ('login');})->name('login')->middleware('guest');

//Route::post('/home',function(){return view('welcome');})->middleware('auth')->name('home');

//Route::post('/login',[LoginController::class,'login']);
//Route::put('/login',[LoginController::class,'logout']); 

//Route::resource('productos','App\Http\Controllers\ProductoController');

