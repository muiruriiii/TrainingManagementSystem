<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Courses;
use App\Models\UserPayments;
use App\Models\Users;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if(Auth::user()->userType != 'admin'){
            return view('accounts/login');
        }else{
    //To display total number of courses in the system
        $courses = Courses::all()->where('deleted_at',NULL)->count('id');
    //To display total number of users in the system
        $users = Users::all()->where('deleted_at',NULL)->count('id');
    //To display users with accounts but have not paid for any course
        $noCourseUsers = Users::all()->where('paymentStatus','Pending')
                                    ->where('userType','user')
                                    ->count('id');
        return view ('home/dashboard',['courses'=>$courses,'users'=>$users,'noCourseUsers'=>$noCourseUsers]);
        }
    }
    //CRUD Functionality on users
    public function ViewUsers(){
        if(Auth::user()->userType != 'admin'){
            return view('accounts/login');
        }else{
            $users = Users::paginate(3);
            return view('accounts/ViewUsers',['users'=> $users]);
        }
    }
    public function DeleteUsers($id){
        if(Auth::user()->userType != 'admin'){
            return view('accounts/login');
        }else{
        $users = Users::find($id)->delete();
        return redirect('ViewUsers');
        }
    }
    //SoftDeletes
    public function ViewTrashedUsers()
    {
        $users = Users::onlyTrashed()->get();
        return view('accounts/ViewTrashedUsers',['users'=> $users]);
    }
    public function RestoreUsers($id){
        Users::whereId($id)->restore();
         return redirect('ViewTrashedUsers');
    }
    public function RestoreAllUsers(){
        Users::onlyTrashed()->restore();
        return back();
    }
}
