<?php

namespace App\Http\Controllers;
use App\Models\Courses;
use App\Models\CourseTopics;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    //Page Displays
    public function course(){
        if(Auth::user()->userType != 'admin'){
            return view('accounts/login');
        }else{
            return view('courses/course');
        }
    }
    public function courseTopics(){
        $course = Courses::all();
        return view('courses/courseTopics',['courses'=>$course]);
    }
    public function courseContent($id){
        $courses = Courses::find($id);
        return view('courses/courseContent', ['courses'=>$courses , 'courseID'=>$id]);
    }
    public function courseNotes($id){
        $coursetopics = CourseTopics::find($id);
       //To display the course name based on the chosen course
        $courses = Courses::find($id);
        return view('courses/courseNotes', ['courseID'=>$id, 'coursetopics'=>$coursetopics]);
    }

    public function listTopics($id){
        //To fetch all the topics
        $coursetopics = CourseTopics::all()->where('courseID',$id);
        //To display the course name based on the chosen course
        $courses = Courses::find($id);
        return view('courses/listTopics', ['courseID'=>$id,'courses'=>$courses,'coursetopics'=>$coursetopics]);
    }

    public function topicContent($id){
        //To display the notes and videos options specific to the course
        $coursetopics = CourseTopics::find($id);
        //To display the course name based on the chosen course
        $courses = Courses::find($id);
        return view('courses/topicContent', ['courseID'=>$id,'courses'=>$courses,'coursetopics'=>$coursetopics]);
    }
    public function courseVideos($id){
        $coursetopics = CourseTopics::find($id);
        //To display the course name based on the chosen course
        $courses = Courses::find($id);
        return view('courses/courseVideos',['courseID'=>$id,'courses'=>$courses, 'coursetopics'=>$coursetopics]);
    }
    public function coursesDescription($id){
        $courses = Courses::find($id);
        $coursetopics = CourseTopics::all()->where('courseID',$id);
        return view('courses/coursesDescription', ['courses'=>$courses,'coursetopics'=>$coursetopics]);
    }
    //CRUD Functionality
    public function validateCourses(Request $request)
    {
        $request->validate([
            'courseName'=> 'required',
            'courseDescription'=> 'required',
            'courseProfile'=>'nullable'
        ]);
        $profileName = time().$request->file('courseProfile')->getClientOriginalName();
        $pathProfile = $request->file('courseProfile')->storeAs('uploads', $profileName, 'public');

        $courses = new Courses([
            "courseName" => $request->get('courseName'),
            "courseDescription" => $request->get('courseDescription'),
            "courseProfile"=> '/storage/'.$pathProfile
        ]);

        $courses->save();
        return redirect('courseTopics');
    }
    public function validateCourseTopics(Request $request)
    {
        $request->validate([
            'courseID'=> 'required',
            'topicName'=> 'required',
            'topicNumber'=> 'required',
            'courseNotes'=>'required',
            'courseVideos'=>'required',
        ]);

        $notes = time().$request->file('courseNotes')->getClientOriginalName();
        $pathNotes = $request->file('courseNotes')->storeAs('notes', $notes, 'public');

        $videos = time().$request->file('courseVideos')->getClientOriginalName();
        $pathVideos = $request->file('courseVideos')->storeAs('videos', $videos, 'public');

        $coursetopics = new CourseTopics([
            "courseID" => $request->get('courseID'),
            "topicNumber" => $request->get('topicNumber'),
            "topicName" => $request->get('topicName'),
            "courseVideos" => '/storage/'.$pathVideos,
            "courseNotes" => '/storage/'.$pathNotes,
        ]);

        $coursetopics->save();
        return redirect('ViewCourses');
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
    //SoftDeletes
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
