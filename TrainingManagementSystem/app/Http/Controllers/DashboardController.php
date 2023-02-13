<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Courses;
use App\Models\UserPayments;
use App\Models\Users;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if(Auth::user()->userType != 'admin'){
            return view('accounts/login');
        }else{
    //To display total number of courses in the system
        $courses = Courses::all()->where('isDeleted',0)->count('id');
//     //To display total number of courses paid for
//         $coursesPaid = UserPayments::all()->where('status','Accessible')->count('courseID');
    //To display total number of users in the system
        $users = Users::all()->where('isDeleted',0)->count('id');
    //To display users with accounts but have not paid for any course
        $noCourseUsers = Users::all()->where('paymentStatus','Pending')
                                    ->where('userType','user')
                                    ->count('id');
        return view ('home/dashboard',['courses'=>$courses,'users'=>$users,'noCourseUsers'=>$noCourseUsers]);
        }
    }


}
