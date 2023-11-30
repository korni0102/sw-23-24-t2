<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;



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

//User_Info
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});


//rolerequest
Route::get('/request/modify', [AdminController::class, 'modifyRoleRequest'])->name('admin.modifyRoleRequest');
Route::post('/request/changeStatus/{role_request_id}/{role_request_status}', [AdminController::class, 'changeStatus'])->name('admin.changeRequestStatus');

//addCompany
Route::get('/addCompany', [CompanyController::class, 'addCompany'])->name('addCompany');
Route::post('/saveCompany', [CompanyController::class, 'saveCompany'])->name('saveCompany');


Route::get('/showStudents', [AdminController::class, 'showStudents'])->name('showStudents');
Route::get('/showPPPs', [AdminController::class, 'showPPPs'])->name('showPPPs');
Route::get('/showVeducis', [AdminController::class, 'showVeducis'])->name('showVeducis');
Route::get('/showzastupcas', [AdminController::class, 'showzastupcas'])->name('showzastupcas');

Route::get('/showStudentsVeduci', [UserController::class, 'showStudentforVeduci'])->name('showStudentsVeduci');


// show Jobs podla type ↓
Route::get('/contract-types/part-time', [JobController::class, 'showPartTimeJobs'])->name('showPartTime');
Route::get('/contract-types/paid', [JobController::class, 'showPaidJobs'])->name('showPaid');
Route::get('/contract-types/unpaid', [JobController::class, 'showUnpaidJobs'])->name('showUnpaid');
Route::get('/contract-types/full-time', [JobController::class, 'showFullTimeJobs'])->name('showFullTime');
Route::get('/contract-types/freelancer', [JobController::class, 'showFreelancerJobs'])->name('showFreelancer');

//addContacts
Route::get('/addContact', [CompanyController::class, 'addContact'])->name('addContact');
Route::post('/saveContact', [CompanyController::class, 'saveContact'])->name('saveContact');

//admin crud users
Route::get('/users/edit/{id}', [AdminController::class, 'editUsers'])->name('users.edit');
Route::put('/users/{id}', [AdminController::class, 'updateUsers'])->name('users.update');
Route::delete('/users/{id}', [AdminController::class, 'destroyUsers'])->name('users.destroy');

