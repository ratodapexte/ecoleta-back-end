<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.register');
 });

Route::get('/login', [UserController::class,'showLogin'])->name('show.login');
Route::post('/auth', [UserController::class,'authUser'])->name('auth.user');
Route::get('/login', [UserController::class,'showRegister'])->name('show.register');
Route::post('/register', [UserController::class,'registerUser'])->name('register.user');


