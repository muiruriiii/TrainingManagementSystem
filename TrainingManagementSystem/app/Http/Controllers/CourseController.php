<?php

namespace App\Http\Controllers;
use App\Models\Courses;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function course(){
        return view('courses/course');
    }
   public function courseContent(){
        return view('courses/courseContent');
    }

    public function coursesDescription($id){
        $courses = Courses::find($id);
        return view('courses/coursesDescription', ['courses'=>$courses]);
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
        $courses = $request->hasFile('courseVideos');
        if($courses)
        {

             $newFile= $request->file('courseVideos');
             $newFile->store('uploads');
        }
        $courses = $request->hasFile('courseNotes');
        if($courses)
        {

            $newFile= $request->file('courseNotes');
            $newFile->store('uploads');

        }
        $courses = $request->hasFile('courseProfile');
        if($courses)
        {

            $newFile= $request->file('courseProfile');
             $newFile->store('uploads');

        }
     $courses = new Courses([
     "courseName" => $request->get('courseName'),
     "courseDescription" => $request->get('courseDescription'),
     "courseVideos" => $request->courseVideos,
     "courseNotes" => $request->courseNotes,
     "courseProfile"=> $request->courseProfile
     ]);
     $courses->save();
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
            $courses->courseProfile = $data['courseProfile'];


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
