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
        $courses=Courses::all()->where('isDeleted',0);
        return view('home/index',['courses'=>$courses]);

            })->name('index');

    Route::get('/about', [AboutController::class, 'about'])->name('about');

    Route::controller(AccountsController::class)->group(function(){
        Route::get('/register','register')->name('register');
        Route::post('/register','validateRegistration')->name('validateRegistration');
        Route::get('/login','login')->name('login');
        Route::post('/login','validateLogin')->name('validateLogin');
        Route::get('/logout','logout')->name('logout');
        Route::get('/ViewUsers','ViewUsers')->name('ViewUsers');
        Route::get('/DeleteUsers/{id}','DeleteUsers')->name('DeleteUsers');

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
        Route::get('/customerService/{id}','customerService')->name('customerService');
        Route::get('/complaintHandling','complaintHandling')->name('complaintHandling');
        Route::get('/listeningSkills','listeningSkills')->name('listeningSkills');
        Route::get('/leadershipProgram/{id}','leadershipProgram')->name('leadershipProgram');
        Route::get('/etiquette','etiquette')->name('etiquette');
        Route::get('/coursesDescription/{id}','coursesDescription')->name('coursesDescription');

        Route::get('/ViewCourses','ViewCourses')->name('ViewCourses');
        Route::get('/EditCourse/{id}','EditCourse')->name('EditCourse');
        Route::get('/DeleteCourse/{id}','DeleteCourse')->name('DeleteCourse');
        Route::post('/course','validateCourses')->name('validateCourses');
        Route::post('/CoursesEdit/{id}','CoursesEdit')->name('CoursesEdit');
    });
    Route::controller(PaypalPaymentController::class)->group(function(){
        Route::get('/paypalPayment/{id}','payment')->name('payment');
        Route::get('/ViewPayments','ViewPayments')->name('ViewPayments');
        Route::post('/payment/{id}','pay')->name('payment');
        Route::get('/success','success');
        Route::get('/errorOccurred','errorOccurred');
    });
    Route::controller(MpesaController::class)->group(function(){
        Route::get('/confirm','confirm')->name('confirm');
        Route::post('/lipa','stkPush')->name('stkPush');
        Route::get('/mpesaPayment','lipa')->name('lipa');
    });

        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
//         Route::get('/redirect',[HomeController::class,'redirect']);
//         Route::get('auth/google',[GoogleAuthController::class,'redirect'])->name('google-auth');
//         Route::get('auth/google/call-back',[GoogleAuthController::class,'callbackGoogle']);
//         Route::post('/payment','validatePayment')->name('validatePayment');




