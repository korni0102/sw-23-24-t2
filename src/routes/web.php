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

//ukladanie Feedback
Route::middleware(['auth'])->group(function () {
    // ... your existing routes

    // Add a route for adding feedback

    Route::post('/store-feedback', 'FeedbackController@store')->name('storeFeedback');
    Route::get('/add/feedback/{company}', [CompanyController::class, 'addFeedback'])->name('addFeedback');
    Route::post('/save/feedback', [CompanyController::class, 'saveFeedback'])->name('saveFeedback');
});


// Route to show job descriptions for a specific company
Route::get('/company/{id}/jobs', [CompanyController::class, 'show'])->name('company.show');

// Route to show jobs with company names
Route::get('/jobs/{id}', [JobController::class, 'showJobDetails'])->name('jobs.showDetails');

// Route to show the form for adding feedback
Route::get('/company/{id}/feedback', [CompanyController::class, 'addFeedback'])->name('company.feedback');

// Route to handle the form submission for adding feedback
Route::post('/company/feedback', [CompanyController::class, 'saveFeedback'])->name('company.saveFeedback');


//rolerequest
Route::get('/request/modify', [AdminController::class, 'modifyRoleRequest'])->name('admin.modifyRoleRequest');
Route::post('/request/changeStatus/{role_request_id}/{role_request_status}', [AdminController::class, 'changeStatus'])->name('admin.changeRequestStatus');

//addCompany
Route::get('/addCompany', [CompanyController::class, 'addCompany'])->name('addCompany');
Route::post('/saveCompany', [CompanyController::class, 'saveCompany'])->name('saveCompany');

