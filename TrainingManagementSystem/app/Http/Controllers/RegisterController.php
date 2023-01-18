<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Hash;

class RegisterController extends Controller
{
    public function register(){
        return view('register');
    }

    public function validateRegistration(Request $request)
    {
        $request->validate([
            'firstName'=> 'required',
            'lastName'=> 'required',
            'telephoneNumber'=> 'required',
            'email'=> 'required|email|unique:users',
            'roleID'=> 'required',
            'courseID'=> 'required',
            'password'=> 'required|min:6',
            'confirmPassword'=> 'required|min:6'
        ]);
        $data = $request->all();


        Users::create([
                'firstName' => $data('firstName'),
                'lastName' => $data('lastName'),
                'telephoneNumber' => $data('telephoneNumber'),
                'email' => $data('email'),
                'roleID' => $data('roleID'),
                'courseID' => $data('courseID'),
                'password' => Hash::make($data['password'])
        ]);
            return redirect('/login')->with('success','Successful Registration');

    }

}
