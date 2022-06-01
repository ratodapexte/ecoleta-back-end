<?php

use App\Http\Controllers\Controller;
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
    return view('welcome');
});

Route::get('/redirectReset', [Controller::class, 'redirectReset'])->name('redirectReset');
Route::get('/reset-password', [Controller::class, 'resetPassword'])->name('resetPassword');

Route::get('/login', [UserController::class,'showLogin'])->name('showLogin');
Route::get('/register', [UserController::class,'showRegisterForm'])->name('showRegisterForm');
Route::post('/auth', [UserController::class,'authUser'])->name('authUser');
Route::post('/register', [UserController::class,'registerUser'])->name('registerUser');


