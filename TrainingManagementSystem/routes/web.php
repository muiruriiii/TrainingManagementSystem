<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaypalPaymentController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\MpesaController;


use App\Models\Users;
use App\Models\Roles;
use App\Models\Courses;

use Illuminate\Support\Facades\Hash;
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
        return view('index');
            })->name('index');

    Route::get('/about', [AboutController::class, 'about'])->name('about');

    Route::controller(AccountsController::class)->group(function(){
        Route::get('/register','register')->name('register');
        Route::post('/register','validateRegistration')->name('validateRegistration');
        Route::get('/login','login')->name('login');
        Route::post('/login','validateLogin')->name('validateLogin');
        Route::get('/logout','logout')->name('logout');

    });

    Route::controller(RoleController::class)->group(function(){
        Route::get('/role','role')->name('role');
        Route::get('/ViewRoles','ViewRoles')->name('ViewRoles');
        Route::get('/EditRole/{id}','EditRole')->name('EditRole');
        Route::post('/roles','validateRoles')->name('validateRoles');
        Route::post('/RolesEdit/{id}','RolesEdit')->name('RolesEdit');
        Route::get('/DeleteRole/{id}','DeleteRole')->name('DeleteRole');

    });

    Route::controller(CourseController::class)->group(function(){
        Route::get('/course','course')->name('course');
        Route::get('/payment','payment')->name('payment');
        Route::get('/customerService','customerService')->name('customerService');
        Route::get('/complaintHandling','complaintHandling')->name('complaintHandling');
        Route::get('/listeningSkills','listeningSkills')->name('listeningSkills');
        Route::get('/leadershipProgram','leadershipProgram')->name('leadershipProgram');
        Route::get('/etiquette','etiquette')->name('etiquette');
        Route::get('/communication','communication')->name('communication');
//         Route::post('/payment','validatePayment')->name('validatePayment');

        Route::get('/ViewCourses','ViewCourses')->name('ViewCourses');
        Route::get('/EditCourse/{id}','EditCourse')->name('EditCourse');
        Route::get('/DeleteCourse/{id}','DeleteCourse')->name('DeleteCourse');
        Route::post('/course','validateCourses')->name('validateCourses');
        Route::post('/CoursesEdit/{id}','CoursesEdit')->name('CoursesEdit');
    });

//     Route::get('auth/google',[GoogleAuthController::class,'redirect'])->name('google-auth');
//     Route::get('auth/google/call-back',[GoogleAuthController::class,'callbackGoogle']);

    Route::post('/payment', [PaypalPaymentController::class, 'pay'])->name('payment');
    Route::get('success', [PaypalPaymentController::class, 'success']);
    Route::get('error', [PaypalPaymentController::class, 'error']);
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/redirect',[HomeController::class,'redirect']);

     Route::get('/confirm',[MpesaController::class,'confirm'])->name('confirm');



