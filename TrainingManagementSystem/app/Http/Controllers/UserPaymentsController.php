<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Courses;
use App\Models\Users;
use App\Models\UserPayments;
use App\Models\CourseTopics;

class UserPaymentsController extends Controller
{
//To redirect the user to the specific page they have paid for
    public function paidCoursePage( $id, $courseID)
    {
        $courses = Courses::find($courseID);
//         $coursetopics = CourseTopics::all()->where('courseID',$id)->count('id');
        return view('courses/courseContent',['courses'=>$courses,'courseID'=>$courseID]);
    }
//To check if a user has paid for a course or not on the user payments table. If no payment has been made by that user then redirect to course description page
    public function checkifPaid($courseID){
        if(Auth::check())
        {
            $userpayments = UserPayments::select('*')->where('userID', Auth::user()->id)
                            ->where('courseID', $courseID)
                            ->where('status', 'Accessible')->get();
            if(count($userpayments) == 0){
                return redirect('/coursesDescription/'.$courseID);
            }else{
                return redirect('/courseContent/'.$courseID);
            }
        }else{
            return redirect('/login');
        }
    }
}
