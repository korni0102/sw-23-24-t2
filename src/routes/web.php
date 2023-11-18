<?php

use App\Http\Controllers\LoginController;
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

Route::get('/', [LoginController::class, 'index'])->name('login.page');

Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('/register', [UserController::class, 'registerUser'])->name('register.user');

Route::post('/saveUser', [UserController::class, 'saveUser'])->name('save.user');



Route::match(['get', 'post'], '/loginAction', [LoginController::class, 'login'])->name('login.login');

Route::get('/main', [UserController::class,'index'])->name('user.index');

