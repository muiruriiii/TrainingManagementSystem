<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Models\Users;
use App\Models\Roles;
use App\Models\Courses;
use  Illuminate\Support\Facades\Validator;
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
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/role', [RoleController::class, 'role'])->name('role');
    Route::get('/course', [CourseController::class, 'course'])->name('course');

    Route::post('/register',function(){
        Users::create([
            'firstName' => request('firstName'),
            'lastName' => request('lastName'),
            'telephoneNumber' => request('telephoneNumber'),
            'email' => request('email'),
            'roleID' => request('roleID'),
            'courseID' => request('courseID'),
            'password' => Hash::make('password')
        ]);
        return redirect('/login');

    });
    Route::post('/roles',function(){
            Roles::create([
                'roleName' => request('roleName'),
                'roleDescription' => request('roleDescription')
            ]);
            return redirect('/');
    });
     Route::post('/course',function(){
            Courses::create([
                'courseName' => request('courseName'),
                'courseDescription' => request('courseDescription'),
                'courseVideos' => request('courseVideos'),
                'courseNotes' => request('courseNotes')
            ]);
            return redirect('/');
     });
     
     Route::get('/redirect',[HomeController::class,'redirect']);

