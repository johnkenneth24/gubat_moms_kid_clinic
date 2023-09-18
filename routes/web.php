<?php

use App\Http\Controllers\AppCheckupController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AppointmentStatController;
use App\Http\Controllers\AppRequestController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\MedHistoryController;
use App\Http\Controllers\PatientRecordController;
use App\Http\Controllers\UserListController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\WalkInAppController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('guest')->group(function () {
    //landing page
    Route::get('/', [LandingpageController::class, 'index'])->name('landing-page');
    //login
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    //verify
    Route::post('/verify', [LoginController::class, 'verifyUser'])->name('auth.verify');
    //signup
    Route::get('/signup', [LoginController::class, 'signup'])->name('signup');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function () {

    // logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');
    //dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //book-appointment
    Route::controller(AppointmentController::class)->prefix('book-appointment')->group(function () {
        Route::get('/create', 'create')->name('appointment.create');
        Route::post('/store', 'store')->name('appointment.store');
        Route::get('/get-appointments', 'getAppointments')->name('appointment.get-appointments');
    });

    Route::controller(WalkInAppController::class)->prefix('walkin-appointment')->group(function () {
        Route::get('/create', 'create')->name('walkin-appointment.create');
        Route::post('/store', 'store')->name('walkin-appointment.store');
        Route::get('/edit/{walkin}', 'edit')->name('walkin-appointment.edit');
        Route::put('/update/{walkin}', 'update')->name('walkin-appointment.update');
        Route::get('/show-info/{walkin}', 'view')->name('walkin-appointment.view');
        Route::get('/consult-info/{walkin}', 'consult')->name('walkin-appointment.consult');
        Route::post('/store-consult/{walkin}', 'consultStore')->name('walkin-consult.store');
    });

    Route::controller(PatientRecordController::class)->prefix('patient-record')->group(function () {
        Route::get('/index', 'index')->name('patient-record.index');
        Route::get('/view-consultation/{patient_rec}', 'viewConsult')->name('patient-record.view_consult');
    });

    Route::controller(UserListController::class)->prefix('user-list')->group(function () {
        Route::get('/index', 'index')->name('user-list.index');
        Route::get('/view-user-info/{user}', 'view')->name('user-list.view');
    });

    Route::controller(UserManagementController::class)->prefix('user-management')->group(function () {
        Route::get('/view/{user}', 'view')->name('user-management.view');
    });

    //appointment status
    Route::get('/appointment-status', [AppointmentStatController::class, 'index'])->name('app-stat.index');
    //medical history
    Route::get('/medical-history', [MedHistoryController::class, 'index'])->name('med-history.index');
    //appointment request
    Route::get('/appointment-request', [AppRequestController::class, 'index'])->name('app-request.index');
    //appointment checkup
    Route::get('/appointment-checkup', [AppCheckupController::class, 'index'])->name('app-checkup.index');
});
