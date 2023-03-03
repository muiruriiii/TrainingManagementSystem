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
use App\Http\Controllers\UserPaymentsController;
use App\Http\Controllers\PasswordController;



use App\Models\Users;
use App\Models\Roles;
use App\Models\Feedback;
use App\Models\Courses;

use Illuminate\Support\Facades\Hash;


    Route::controller(HomeController::class)->group(function(){
        Route::get('/', 'home')->name('home');
        Route::get('/ViewFeedback','ViewFeedback')->name('ViewFeedback');
        Route::post('/','feedback')->name('feedback');
        Route::get('/EditFeedback/{id}','EditFeedback')->name('EditFeedback');
        Route::post('/FeedbackEdit/{id}','FeedbackEdit')->name('FeedbackEdit');
        Route::get('/DeleteFeedback/{id}','DeleteFeedback')->name('DeleteFeedback');

        Route::get('/ViewTrashedFeedback','ViewTrashedFeedback')->name('ViewTrashedFeedback');
        Route::get('/RestoreFeedback/{id}','RestoreFeedback')->name('RestoreFeedback');
        Route::get('/RestoreAllFeedback','RestoreAllFeedback')->name('RestoreAllFeedback');
    });

    Route::controller(AccountsController::class)->group(function(){
        Route::get('/register','register')->name('register');
        Route::post('/register','validateRegistration')->name('validateRegistration');
        Route::get('/login','login')->name('login');
        Route::post('/login','validateLogin')->name('validateLogin');
        Route::get('/logout','logout')->name('logout');

        Route::get('/userProfile', 'userProfile')->name('userProfile');
        Route::post('/userProfile', 'changePassword')->name('changePassword');
        Route::post('/changeDetails/{id}','changeDetails')->name('changeDetails');
        Route::post('/ProfileEdit/{id}','ProfileEdit')->name('ProfileEdit');
    });
     Route::controller(PasswordController::class)->group(function(){
        Route::get('/ForgotPassword','ForgotPassword')->name('ForgotPassword');
        Route::post('/ForgotPassword','sendResetLink')->name('sendResetLink');
        Route::get('/ResetPassword/{token}','ResetPassword')->name('ResetPassword');
        Route::post('/ResetPassword','passwordReset')->name('passwordReset');
        Route::get('/resetSuccess','resetSuccess')->name('resetSuccess');

     });

    Route::controller(RoleController::class)->group(function(){
        Route::get('/role','role')->name('role');
        Route::post('/roles','validateRoles')->name('validateRoles');

        Route::get('/ViewRoles','ViewRoles')->name('ViewRoles');
        Route::get('/EditRole/{id}','EditRole')->name('EditRole');
        Route::post('/RolesEdit/{id}','RolesEdit')->name('RolesEdit');
        Route::get('/DeleteRole/{id}','DeleteRole')->name('DeleteRole');

        Route::get('/ViewTrashedRoles','ViewTrashedRoles')->name('ViewTrashedRoles');
        Route::get('/RestoreRoles/{id}','RestoreRoles')->name('RestoreRoles');
        Route::get('/RestoreAllRoles','RestoreAllRoles')->name('RestoreAllRoles');
        Route::get('/ForceDeleteRoles/{id}','ForceDeleteRoles')->name('ForceDeleteRoles');
    });

    Route::controller(CourseController::class)->group(function(){
        Route::get('/course','course')->name('course');
        Route::get('/courseTopics','courseTopics')->name('courseTopics');
        Route::get('/courseContent/{id}','courseContent')->name('courseContent');
        Route::get('/courseNotes/{id}','courseNotes')->name('courseNotes');
        Route::get('/listTopics/{id}','listTopics')->name('listTopics');
        Route::get('/topicContent/{id}','topicContent')->name('topicContent');
        Route::get('/courseVideos/{id}','courseVideos')->name('courseVideos');
        Route::get('/coursesDescription/{id}','coursesDescription')->name('coursesDescription');

        Route::get('/ViewCourses','ViewCourses')->name('ViewCourses');
        Route::get('/EditCourse/{id}','EditCourse')->name('EditCourse');
        Route::get('/DeleteCourse/{id}','DeleteCourse')->name('DeleteCourse');
        Route::post('/courseTopics','validateCourseTopics')->name('validateCourseTopics');
        Route::post('/course','validateCourses')->name('validateCourses');
        Route::post('/CoursesEdit/{id}','CoursesEdit')->name('CoursesEdit');

        Route::get('/ViewTrashedCourses','ViewTrashedCourses')->name('ViewTrashedCourses');
        Route::get('/RestoreCourses/{id}','RestoreCourses')->name('RestoreCourses');
        Route::get('/RestoreAllCourses','RestoreAllCourses')->name('RestoreAllCourses');
    });
    Route::controller(PaypalPaymentController::class)->group(function(){
        Route::get('/paypalPayment/{id}','payment')->name('payment');
        Route::get('/paypalConfirm','paypalConfirm')->name('paypalConfirm');

        Route::post('/payment','pay');
        Route::get('/success','success');
        Route::get('/errorOccurred','errorOccurred');

        Route::get('/ViewPaypalPayments','ViewPaypalPayments')->name('ViewPaypalPayments');
        Route::get('/DeletePaypalPayments/{id}','DeletePaypalPayments')->name('DeletePaypalPayments');

        Route::get('/ViewTrashedPaypalPayments','ViewTrashedPaypalPayments')->name('ViewTrashedPaypalPayments');
        Route::get('/RestorePaypalPayments/{id}','RestorePaypalPayments')->name('RestorePaypalPayments');
        Route::get('/RestoreAllPaypalPayments','RestoreAllPaypalPayments')->name('RestoreAllPaypalPayments');
        Route::get('/ForceDeletePaypalPayments/{id}','ForceDeletePaypalPayments')->name('ForceDeletePaypalPayments');

    });
    Route::controller(MpesaController::class)->group(function(){
//         Route::get('/confirm','confirm')->name('confirm');
        Route::get('/mpesaPayment/{id}','lipa')->name('lipa');
        Route::get('/mpesaConfirm','mpesaConfirm')->name('mpesaConfirm');

        Route::post('/lipa/{id}','stkPush')->name('stkPush');
        Route::post('/confirmTransaction','confirmTransaction')->name('confirmTransaction');

        Route::get('/DeleteMpesaPayments/{id}','DeleteMpesaPayments')->name('DeleteMpesaPayments');
        Route::get('/ViewMpesaPayments','ViewMpesaPayments')->name('ViewMpesaPayments');

        Route::get('/ViewTrashedMpesaPayments','ViewTrashedMpesaPayments')->name('ViewTrashedMpesaPayments');
        Route::get('/RestoreMpesaPayments/{id}','RestoreMpesaPayments')->name('RestoreMpesaPayments');
        Route::get('/RestoreAllMpesaPayments','RestoreAllMpesaPayments')->name('RestoreAllMpesaPayments');
        Route::get('/ForceDeleteMpesaPayments/{id}','ForceDeleteMpesaPayments')->name('ForceDeleteMpesaPayments');

    });
    Route::controller(UserPaymentsController::class)->group(function(){
        Route::post('/userPayments/{id}','userPayments')->name('userPayment');
        Route::get('/paidCoursePage/{id}', 'paidCoursePage');
        Route::get('/checkifPaid/{id}', 'checkifPaid');
    });
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/dashboard',  'dashboard')->name('dashboard');

        Route::get('/ViewUsers','ViewUsers')->name('ViewUsers');
        Route::get('/DeleteUsers/{id}','DeleteUsers')->name('DeleteUsers');

        Route::get('/ViewTrashedUsers','ViewTrashedUsers')->name('ViewTrashedUsers');
        Route::get('/RestoreUsers/{id}','RestoreUsers')->name('RestoreUsers');
        Route::get('/RestoreAllUsers','RestoreAllUsers')->name('RestoreAllUsers');
        Route::get('/ForceDeleteUsers/{id}','ForceDeleteUsers')->name('ForceDeleteUsers');


    });



