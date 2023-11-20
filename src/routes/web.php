<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;


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
//prihlasenie↓
Route::get('/', [LoginController::class, 'index'])->name('login.page');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::match(['get', 'post'], '/loginAction', [LoginController::class, 'login'])->name('login.login');
Route::get('/main', [UserController::class,'index'])->name('user.index');

//registrácia↓
Route::get('/register', [UserController::class, 'registerUser'])->name('register.user');
Route::post('/saveUser', [UserController::class, 'saveUser'])->name('save.user');

//vypis
Route::get('/companies', [CompanyController::class, 'showCompanies'])->name('companies');
Route::get('/jobs', [JobController::class, 'showJobs'])->name('jobs');

//rolerequest
Route::get('/request/modify', [AdminController::class, 'modifyRoleRequest'])->name('admin.modifyRoleRequest');
Route::post('/request/changeStatus/{role_request_id}/{role_request_status}', [AdminController::class, 'asd'])->name('admin.changeRequestStatus');

//addCompany
Route::get('/addCompany', [CompanyController::class, 'addCompany'])->name('addCompany');
Route::post('/saveCompany', [CompanyController::class, 'saveCompany'])->name('saveCompany');

