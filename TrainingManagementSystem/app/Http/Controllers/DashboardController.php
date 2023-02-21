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
//     //To display total number of courses paid for
//         $coursesPaid = UserPayments::all()->where('status','Accessible')->count('courseID');
    //To display total number of users in the system
        $users = Users::all()->where('deleted_at',NULL)->count('id');
    //To display users with accounts but have not paid for any course
        $noCourseUsers = Users::all()->where('paymentStatus','Pending')
                                    ->where('userType','user')
                                    ->count('id');
        return view ('home/dashboard',['courses'=>$courses,'users'=>$users,'noCourseUsers'=>$noCourseUsers]);
        }
    }
    public function userProfile($id){
        $users = Users::find($id);
        return view('home/userProfile',['users'=>$users]);

    }
    public function changePassword(Request $request){
        $request->validate([
            'oldPassword'=> 'required|min:6',
            'password'=> 'required|min:6',
            'confirmPassword'=> 'required|min:6|same:password'
        ]);
//Check the entered password if its similar to the password that is in the database
        $oldPasswordStatus = Hash::check($request->oldPassword, auth()->user()->password);
//If the two match the the password in the db will update to the new password entered
        if($oldPasswordStatus){

            Users::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('message','Password Updated Successfully');

        }else{

            return redirect()->back()->with('message','Current Password does not match with Old Password');
        }
    }
    public function changeDetails($id,Request $request)
    {
        $request->validate([
            'firstName'=> 'required',
            'lastName'=> 'required',
            'email'=> 'required|email',
            'telephoneNumber'=> 'required'
        ]);
        $data = $request->all();

            $users = Users::find($id);
            $users->firstName = $data['firstName'];
            $users->lastName = $data['lastName'];
            $users->email = $data['email'];
            $users->telephoneNumber = $data['telephoneNumber'];
            $users->save();
            return redirect()->back()->with('message','Profile Details Updated Successfully');
    }
    public function ProfileEdit($id,Request $request){
            $request->validate([
            'userProfile'=> 'required',
            ]);
            if($request->userProfile){
                $profileName = time().$request->file('userProfile')->getClientOriginalName();
                $pathProfile = $request->file('userProfile')->storeAs('users', $profileName, 'public');
            }
                $users = Users::find($id);
                $users->userProfile =  '/storage/'.$pathProfile;
                $users->save();
           return redirect()->back();
    }


}
