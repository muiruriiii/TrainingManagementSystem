<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Courses;
use App\Models\Users;
use App\Models\UserPayments;

class UserPaymentsController extends Controller
{
    public function paidCoursePage($courseID)
    {
        return view('courses/courseContent',['courseID'=>$courseID]);
    }
    public function checkifPaid($courseID){
        $userpayments = UserPayments::select('*')->where('userID', Auth::user()->id)
                            ->where('courseID', $courseID)
                            ->where('status', 'Accessible')->get();
        if(count($userpayments) == 0){
            return redirect('/coursesDescription/'.$courseID);
        }else{
            return redirect('/courseContent/'.$courseID);
        }
    }
}
