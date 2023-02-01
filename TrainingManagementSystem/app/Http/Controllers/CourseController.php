<?php

namespace App\Http\Controllers;
use App\Models\Courses;
use App\Models\UserPayments;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function course(){
        return view('courses/course');
    }
    public function customerService($id){
    //courseid, userid
//     $courseID = Courses::all()->where('courseName', 'Customer Service');
//     $userid = Auth::user()->id;
//     $userpayment = UserPayments::all()->where('courseID', $id)->where('userID', $userid);
//       return $userpayment;
//     $userpayment->status == 'Accessible';
//
//         if(Auth::user()->status == 'Pending'){
//             return redirect('/paypalPayment');
//         }
        return view('courses/customerService');
    }
    public function complaintHandling(){
        return view('courses/complaintHandling');
    }
    public function listeningSkills(){
        return view('courses/listeningSkills');
    }
    public function leadershipProgram(){
        return view('courses/leadershipProgram');
    }
    public function etiquette(){
        return view('courses/etiquette');
    }
    public function communication(){
        return view('courses/etiquette');
    }
    public function ViewCourses(){
        $courses = Courses::all();
        return view('courses/ViewCourses',['courses'=> $courses]);
    }
    public function EditCourse($id){
        $courses = Courses::find($id);
        return view('courses/EditCourse',['courses'=> $courses]);
    }
    public function DeleteCourse($id){
        $courses = Courses::find($id);
        $courses->isDeleted = 1;
        $courses->save();
        return redirect('ViewCourses');
    }
    public function validateCourses(Request $request)
     {

        $request->validate([
             'courseName'=> 'required',
             'courseDescription'=> 'required',
             'courseVideos'=> 'required',
             'courseNotes'=> 'required'
        ]);
        $data = $request->all();
        Courses::create([
             'courseName' => $data['courseName'],
             'courseDescription' => $data['courseDescription'],
             'courseVideos' => $data['courseVideos'],
             'courseNotes' => $data['courseNotes'],
             'courseProfile' => $data['courseProfile']
        ]);
         return redirect('ViewCourses');
     }
     public function CoursesEdit($id,Request $request){
        $request->validate([
            'courseName'=> 'required',
            'courseDescription'=> 'required',
            'courseVideos'=> 'required',
            'courseNotes'=> 'required',
            'courseProfile'=> 'required'
        ]);
        $data = $request->all();

        $courses = Courses::find($id);
            $courses->courseName = $data['courseName'];
            $courses->courseDescription = $data['courseDescription'];
            $courses->courseVideos = $data['courseVideos'];
            $courses->courseNotes = $data['courseNotes'];
            $courses->courseNotes = $data['courseProfile'];

            $courses->save();

        return redirect('ViewCourses');

    }
    public function validatePayment(Request $request){
        $request->validate([
            'courseID'=> 'required',
            'courseDuration'=> 'required',
            'courseAmount'=> 'required',
            'phoneNumber'=> 'required',
        ]);
        $data = $request->all();
        Payment::create([
                'courseID' => $data['courseID'],
                'courseDuration' => $data['courseDuration'],
                'courseAmount' => $data['courseAmount'],
                'phoneNumber' => $data['phoneNumber'],
        ]);
         return redirect('/')->with('success','Successful Payment');

    }
    public static function getCourseName($id){
        $course = Courses::find($id);
        return $course->courseName;
    }

}
