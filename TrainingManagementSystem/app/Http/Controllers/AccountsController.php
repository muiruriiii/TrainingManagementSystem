<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Feedback;
use App\Models\UserPayments;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;


class AccountsController extends Controller
{
    //Register Page Display
    public function register(){
        $role = Roles::all();
        return view('accounts/register',['roles'=>$role]);
    }
    //Login Page Display
    public function login(){
        return view('accounts/login');
    }
    //CRUD Functionality
    public function validateRegistration(Request $request)
    {
        $request->validate([
            'firstName'=> 'required',
            'lastName'=> 'required',
            'telephoneNumber'=> 'required',
            'email'=> 'required|email|unique:users',
            'roleID'=> 'required',
            'password'=> 'required|min:6',
            'confirmPassword'=> 'required|min:6|same:password'
        ]);
        $profileName = time().$request->file('userProfile')->getClientOriginalName();
        $pathProfile = $request->file('userProfile')->storeAs('users', $profileName, 'public');
        $users = new Users([
            "firstName" => $request->get('firstName'),
            "lastName" => $request->get('lastName'),
            "telephoneNumber" => $request->get('telephoneNumber'),
            "email" => $request->get('email'),
            "roleID" => $request->get('roleID'),
            "password" => Hash::make($request->get('password')),
            "userProfile" => '/storage/'.$pathProfile

        ]);
        $users->save();
        return redirect('/login')->with('success','Successful Registration');
    }
    public function validateLogin(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials))
        {
            if(Auth::user()->userType == 'admin')
            {
                return redirect('dashboard');
            }
            else
            {
                return redirect('/');
            }
        }
        return redirect('/login')->with('success','Invalid login details');
    }

    //Logout
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
    public function userProfile(){
        return view('home/userProfile');

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
