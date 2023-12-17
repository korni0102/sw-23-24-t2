<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\FeedbackController;



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

//faq
Route::get('/faq', [UserController::class, 'showFAQ'])->name('faqView');

//vypis
Route::get('/admin_view_companies', [CompanyController::class, 'showCompanies'])->name('admin_view_companies');
Route::get('/viewCompaniesStudents', [CompanyController::class, 'viewCompaniesStudents'])->name('viewCompaniesStudents');
Route::get('/viewCompaniesVeduci', [CompanyController::class, 'viewCompaniesVeduci'])->name('viewCompaniesVeduci');
Route::get('/jobs', [JobController::class, 'showJobs'])->name('jobs');

//User_Info
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});


//rolerequest
Route::get('/request/modify', [AdminController::class, 'modifyRoleRequest'])->name('admin.modifyRoleRequest');
Route::post('/request/changeStatus/{role_request_id}/{role_request_status}', [AdminController::class, 'changeStatus'])->name('admin.changeRequestStatus');

//addCompany student
Route::get('/addCompany', [CompanyController::class, 'addCompany'])->name('addCompany');
Route::post('/saveCompany', [CompanyController::class, 'saveCompany'])->name('saveCompany');
//addContacts student
Route::get('/addContact', [CompanyController::class, 'addContact'])->name('addContact');
Route::post('/saveContact', [CompanyController::class, 'saveContact'])->name('saveContact');
//admin
Route::get('/addCompanyAdmin', [CompanyController::class, 'addCompanyAdmin'])->name('addCompanyAdmin');
Route::post('/saveCompanyAdmin', [CompanyController::class, 'saveCompanyAdmin'])->name('saveCompanyAdmin');
//admin addContacts
Route::get('/addContactAdmin', [CompanyController::class, 'addContactAdmin'])->name('addContactAdmin');
Route::post('/saveContactAdmin', [CompanyController::class, 'saveContactAdmin'])->name('saveContactAdmin');

//admin show users
Route::get('/showStudents', [AdminController::class, 'showStudents'])->name('showStudents');
Route::get('/showPPPs', [AdminController::class, 'showPPPs'])->name('showPPPs');
Route::get('/showVeducis', [AdminController::class, 'showVeducis'])->name('showVeducis');
Route::get('/showzastupcas', [AdminController::class, 'showzastupcas'])->name('showzastupcas');

//PDF
Route::get('/downoloadPDF', [AdminController::class, 'downoloadPDF'])->name('downoloadPDF');
Route::get('/downoloadPDFV', [UserController::class, 'downoloadPDFV'])->name('downoloadPDFV');
//veduci
Route::get('/showStudentsVeduci', [UserController::class, 'showStudentsforVeduci'])->name('showStudentsVeduci');
Route::get('/showJobRequsets', [UserController::class, 'showJobRequsets'])->name('showJobRequsets');
Route::get('/JobRequestJoin', [UserController::class, 'requestAjax'])->name('requestAjax');

//ppp
Route::get('/showJobRequsetsPPP', [UserController::class, 'showJobRequsetsPPP'])->name('showJobRequsetsPPP');
Route::get('/showJobRequsetsPPP', [UserController::class, 'showJobRequsetsPPP'])->name('showJobRequsetsPPP');
Route::delete('/deleteJobRequsets/{id}', [UserController::class, 'deleteJobRequsetsPPP'])->name('jobRequestPPP.destroy');
Route::post('/job-requests/accept/{jobRequestId}', [UserController::class, 'pppAcceptJobRequest'])->name('job-requests.accept');

// show Jobs podla type ↓ + vytvorit request
Route::get('/job-types/part-time', [JobController::class, 'showPartTimeJobs'])->name('showPartTime');
Route::get('/job-types/part-time/request', [JobController::class, 'requestPartTimeJob'])->name('requestPartTime');

Route::get('/job-types/paid', [JobController::class, 'showPaidJobs'])->name('showPaid');
Route::get('/job-types/paid/request', [JobController::class, 'requestPaidJob'])->name('requestPaid');

Route::get('/job-types/unpaid', [JobController::class, 'showUnpaidJobs'])->name('showUnpaid');
Route::get('/job-types/unpaid/request', [JobController::class, 'requestUnpaidJob'])->name('requestUnpaid');

Route::get('/job-types/full-time', [JobController::class, 'showFullTimeJobs'])->name('showFullTime');
Route::get('/job-types/full-time/request', [JobController::class, 'requestFullTimeJob'])->name('requestFullTime');

Route::get('/job-types/freelancer', [JobController::class, 'showFreelancerJobs'])->name('showFreelancer');
Route::get('/job-types/freelancer/request', [JobController::class, 'requestFreelancerJob'])->name('requestFreelancer');

//student view contract
Route::get('/studentViewContracts', [UserController::class, 'studentViewContracts'])->name('studentViewContracts');

//admin crud users
Route::get('/users/edit/{id}', [AdminController::class, 'editUsers'])->name('users.edit');
Route::put('/users/{id}', [AdminController::class, 'updateUsers'])->name('users.update');
Route::delete('/users/{id}', [AdminController::class, 'destroyUsers'])->name('users.destroy');

//admin crud companies
Route::get('/companies/edit/{id}', [AdminController::class, 'editCompany'])->name('companies.edit');
Route::put('/companies/{id}', [AdminController::class, 'updateCompany'])->name('companies.update');
Route::delete('/companies/{id}', [AdminController::class, 'destroyCompany'])->name('companies.destroy');

//student view hodnotenie
Route::get('/showGradesStudent', [UserController::class, 'showGradesStudent'])->name('showGradesStudent');

Route::get('/showGradeStudentPPP', [UserController::class, 'showGradeStudentPPP'])->name('showGradeStudentPPP');
Route::get('/editGradePPP/edit/{id}', [UserController::class, 'editGradePPP'])->name('editGradePPP');
Route::put('/changeGradePPP/{id}', [UserController::class, 'changeGradePPP'])->name('changeGradePPP');

// PDF Download
Route::get('/generate-pdf/{contractId}', [PDFController::class, 'generatePDF']);
Route::get('/generate-pdf_badge/{contractId}', [PDFController::class, 'generatePDF_badge']);
Route::get('/generateFiltered-pdf', [UserController::class, 'generatePDF2'])->name('generateFiltered-PDF');
                                                                                 

Route::get('/addJob', [CompanyController::class, 'addJob'])->name('addJob');
Route::post('/saveJob', [CompanyController::class, 'saveJob'])->name('saveJob');



Route::get('/veduciViewContracts', [UserController::class, 'veduciViewContracts'])->name('veduciViewContracts');

//feedback
Route::get('/feedback/create/{contractId}', [FeedbackController::class, 'create'])->name('feedback.create');
Route::post('/feedback/{contractId}', [FeedbackController::class, 'store'])->name('feedback.store');

