<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ForgetpasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendeurController;
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

/* * ******************************************pour Admin****************************************************** */
Route::get('/validation', [VendeurController::class, 'indexVendeurNonValidesestValider'])->name('validation');
Route::post('/validerVendeur/{id}', [VendeurController::class, 'validerVendeur'])->name('validerVendeur');
Route::post('/invaliderVendeur/{id}', [VendeurController::class, 'invaliderVendeur'])->name('invaliderVendeur');
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
Route::post('/categories/create', [CategoriesController::class, 'store'])->name('categories.store');
Route::delete('/categories/{category}', [CategoriesController::class, 'destroy'])->name('categories.destroy');
Route::get('/categories/{category}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}/update', [CategoriesController::class, 'update'])->name('categories.update');














Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/register', [UserController::class, 'indexRegistre'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/deconnecter', [UserController::class, 'deconnecter'])->name('user.deconnecter');



