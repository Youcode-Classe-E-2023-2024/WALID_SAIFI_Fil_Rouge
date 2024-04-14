<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\ForgetpasswordController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home1');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');




Route::get('/dashboard', function () {
    return view('Admin.dashboard');
})->name('Admin.dashboard');


Route::get('/profiel', function () {
    return view('Admin.profiel');
});
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/register', [UserController::class, 'indexRegistre'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');


Route::post('/deconnecter', [UserController::class, 'deconnecter'])->name('user.deconnecter');



