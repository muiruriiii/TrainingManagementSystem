<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;


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
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/role', [RoleController::class, 'role'])->name('role');
    Route::get('/course', [CourseController::class, 'course'])->name('course');

    Route::get('/ViewRoles', [RoleController::class, 'ViewRoles'])->name('ViewRoles');
    Route::get('/EditRole/{id}', [RoleController::class, 'EditRole'])->name('EditRole');

    Route::get('/ViewCourses', [CourseController::class, 'ViewCourses'])->name('ViewCourses');
    Route::get('/EditCourse/{id}', [CourseController::class, 'EditCourse'])->name('EditCourse');
    Route::get('/DeleteCourse/{id}', [CourseController::class, 'DeleteCourse'])->name('DeleteCourse');

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
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
     Route::post('/RolesEdit/{id}',function($id,Request $request){
            $roles = Roles::find($id);
            $roles->roleName = $request->input('roleName');
            $roles->roleDescription = $request->input('roleDescription');
            $roles->save();

            return redirect('ViewRoles');
     });
      Route::post('/CoursesEdit/{id}',function($id,Request $request){
             $courses = Courses::find($id);
             $courses->courseName = $request->input('courseName');
             $courses->courseDescription = $request->input('courseDescription');
             $courses->courseVideos = $request->input('courseVideos');
             $courses->courseNotes = $request->input('courseNotes');
             $courses->save();

             return redirect('ViewCourses');
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

