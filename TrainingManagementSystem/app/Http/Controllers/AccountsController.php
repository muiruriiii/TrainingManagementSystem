<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\UserPayments;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;



class AccountsController extends Controller
{
    public function register(){
        $role = Roles::all();
        return view('accounts/register',['roles'=>$role]);
    }

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
        $data = $request->all();
        Users::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'telephoneNumber' => $data['telephoneNumber'],
            'email' => $data['email'],
            'roleID' => $data['roleID'],
            'password' => Hash::make($data['password'])
        ]);
        return redirect('/login')->with('success','Successful Registration');
    }
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
    public function login(){
        return view('accounts/login');
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
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
