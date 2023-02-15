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
        if(Auth::user()->userType != 'admin'){
            return view('accounts/login');
        }else{
            return view('courses/course');
        }
    }
    public function courseContent($id){
        $courses = Courses::find($id);
        return view('courses/courseContent', ['courses'=>$courses , 'courseID'=>$id]);
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
        if(Auth::user()->userType != 'admin'){
            return view('accounts/login');
        }else{
            $courses = Courses::paginate(3);
            return view('courses/ViewCourses',['course'=> $courses]);
        }
    }
    public function EditCourse($id){
        if(Auth::user()->userType != 'admin'){
            return view('accounts/login');
        }else{
            $courses = Courses::find($id);
            return view('courses/EditCourse',['courseID'=>$id, 'course'=>$courses]);
        }
    }
    public function DeleteCourse($id){
        if(Auth::user()->userType != 'admin'){
            return view('accounts/login');
        }else{
        $courses = Courses::find($id)->delete();
        return redirect('ViewCourses');
        }
    }
    public function ViewTrashedCourses()
    {
        $courses = Courses::onlyTrashed()->get();
        return view('courses/ViewTrashedCourses',['course'=> $courses]);
    }
    public function RestoreCourses($id){
        Courses::whereId($id)->restore();
         return redirect('ViewTrashedCourses');
    }
    public function RestoreAllCourses(){
        Courses::onlyTrashed()->restore();
        return back();
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

}
