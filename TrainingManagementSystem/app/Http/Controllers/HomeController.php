<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Feedback;


class HomeController extends Controller
{
    //Landing Page display
    public function home(){
        $courses=Courses::all()->where('isDeleted',0);
        $feedback=Feedback::all()->where('status','Good');
//         $users=Users::all()->where('id',Auth::user()->id)->first();
        return view('home/index',['courses'=>$courses,'feedback'=>$feedback]);
    }
    //CRUD Functionality
    public function feedback(Request $request){
        $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'feedback'=> 'required'
        ]);
        $data = $request->all();
        Feedback::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'feedback' => $data['feedback']
        ]);
        return redirect('/');
    }
     public function ViewFeedback(){
        if(Auth::user()->userType != 'admin'){
            return view('accounts/login');
        }else{
            $feedback = Feedback::all();
            return view('home/ViewFeedback',['feedback'=> $feedback]);
        }
    }
    public function EditFeedback($id){
        if(Auth::user()->userType != 'admin'){
            return view('accounts/login');
        }else{
            $feedback = Feedback::find($id);
            return view('home/EditFeedback',['feedback'=> $feedback]);
        }
    }
    public function FeedbackEdit($id,Request $request)
    {
        $request->validate([
        'email'=> 'required',
        'feedback'=> 'required',
        'status'=> 'required'
        ]);
        $data = $request->all();
        $feedback = Feedback::find($id);
        $feedback->email = $data['email'];
        $feedback->feedback = $data['feedback'];
        $feedback->status = $data['status'];
        $feedback->save();
    return redirect('ViewFeedback');
    }
    public function DeleteFeedback($id){
        if(Auth::user()->userType != 'admin'){
            return view('accounts/login');
        }else{
            $feedback = Feedback::find($id)->delete();
            return redirect('ViewFeedback');
        }
    }
    //SoftDeletes
    public function ViewTrashedFeedback()
    {
        $feedback = Feedback::onlyTrashed()->get();
        return view('home/ViewTrashedFeedback',['feedback'=> $feedback]);
    }
    public function RestoreFeedback($id){
        Feedback::whereId($id)->restore();
         return redirect('ViewTrashedFeedback');
    }
    public function RestoreAllFeedback(){
        Feedback::onlyTrashed()->restore();
        return back();
    }
}
