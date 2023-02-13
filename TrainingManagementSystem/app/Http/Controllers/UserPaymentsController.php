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
        $courses = Courses::find($courseID);
        return view('courses/courseContent',['courses'=>$courses,'courseID'=>$courseID]);
    }
    //To check if a user has paid for a course or not on the user payments table. If no payment has been made by that user then redirect to course description page
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
