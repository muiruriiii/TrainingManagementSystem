<?php

namespace App\Http\Controllers;
use App\Models\Courses;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function course(){
        return view('courses/course');
    }
    public function courseContent($id){
        return view('courses/courseContent', ['courseID'=>$id]);
    }
    public function courseNotes($id){
        $courses = Courses::find($id);
        return view('courses/courseNotes', ['courseID'=>$id, 'course'=>$courses]);
    }
    public function courseVideos($id){
            $courses = Courses::find($id);
            return view('courses/courseVideos',['courseID'=>$id, 'course'=>$courses]);
    }
    public function coursesDescription($id){
        $courses = Courses::find($id);
        return view('courses/coursesDescription', ['courses'=>$courses]);
    }
    public function ViewCourses(){
        $courses = Courses::all();
        return view('courses/ViewCourses',['course'=> $courses]);
    }
    public function EditCourse($id){
        $courses = Courses::find($id);
        return view('courses/EditCourse',['courseID'=>$id, 'course'=>$courses]);
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
                'courseNotes'=>'required',
                'courseVideos'=>'required',
                'courseProfile'=>'nullable'
        ]);
        $profileName = time().$request->file('courseProfile')->getClientOriginalName();
        $pathProfile = $request->file('courseProfile')->storeAs('uploads', $profileName, 'public');

        $videos = time().$request->file('courseVideos')->getClientOriginalName();
        $pathVideos = $request->file('courseVideos')->storeAs('videos', $videos, 'public');

        $notes = time().$request->file('courseNotes')->getClientOriginalName();
        $pathNotes = $request->file('courseNotes')->storeAs('notes', $notes, 'public');

        $courses = new Courses([
        "courseName" => $request->get('courseName'),
        "courseDescription" => $request->get('courseDescription'),
        "courseVideos" => '/storage/'.$pathVideos,
        "courseNotes" => '/storage/'.$pathNotes,
        "courseProfile"=> '/storage/'.$pathProfile
        ]);

        $courses->save();
        return redirect('ViewCourses');
     }
    public function CoursesEdit($id,Request $request){
        $request->validate([
        'courseName'=> 'required',
        'courseDescription'=> 'required',
        'courseNotes'=>'required',
        'courseVideos'=>'required',
        'courseProfile'=>'required'
        ]);
        if($request->courseProfile){
            $profileName = time() . '.' . $request->courseProfile->getClientOriginalName();
            $pathProfile = $request->courseProfile->storeAs('uploads', $profileName, 'public');
        }
        if($request->courseNotes){
            $notes = time() . '.' . $request->courseNotes->getClientOriginalName();
            $pathNotes = $request->courseNotes->storeAs('notes', $notes, 'public');
        }
        if($request->courseVideos){
            $videos = time() . '.' . $request->courseVideos->getClientOriginalName();
            $pathVideos = $request->courseVideos->storeAs('videos', $videos, 'public');
        }
            $courses = Courses::find($id);
            $courses->courseName = $request->get('courseName');
            $courses->courseDescription = $request->get('courseDescription');
            $courses->courseNotes =  '/storage/'.$pathNotes;
            $courses->courseVideos =  '/storage/'.$pathVideos;
            $courses->courseProfile =  '/storage/'.$pathProfile;

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
