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


class AccountsController extends Controller
{
    public function register(){
        $role = Roles::all();
        return view('accounts/register',['roles'=>$role]);
    }
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
    public function EditFeedback($id){
        if(Auth::user()->userType != 'admin'){
            return view('accounts/login');
        }else{
            $feedback = Feedback::find($id);
            return view('accounts/EditFeedback',['feedback'=> $feedback]);
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
    public function ViewTrashedFeedback()
    {
        $feedback = Feedback::onlyTrashed()->get();
        return view('accounts/ViewTrashedFeedback',['feedback'=> $feedback]);
    }
    public function RestoreFeedback($id){
        Feedback::whereId($id)->restore();
         return redirect('ViewTrashedFeedback');
    }
    public function RestoreAllFeedback(){
        Feedback::onlyTrashed()->restore();
        return back();
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
    public function ViewFeedback(){
        if(Auth::user()->userType != 'admin'){
            return view('accounts/login');
        }else{
            $feedback = Feedback::all();
            return view('accounts/ViewFeedback',['feedback'=> $feedback]);
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
    public function ForgotPassword(){
        return view('accounts/ForgotPassword');
    }
//Checks if the email entered is valid/if it exists in the system
    public function sendResetLink(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email'
        ]);
//Token is generated and the data is filled in the password_resets table
        $token = \Illuminate\Support\Str::random(64);
        \Illuminate\Support\Facades\DB::table('password_resets')->insert([
            'email'=>$request->email,
            'token'=>$token,
            'created_at'=>Carbon::now(),
        ]);
//The body message to reset the password
        $action_link = route('ResetPassword',['token'=>$token,'email'=>$request->email]);
        $body = "We have received a request to reset the password. Account associated with ".$request->email.". You can reset by clicking the link below";
        Mail::Send('accounts/reset',['action_link'=>$action_link,'body'=>$body],function($message) use ($request){
            $message->from('noreply@gmail.com','TMS');
            $message->to($request->email,'TMS')
                    ->subject('Reset Password');
        });
        return redirect('resetSuccess');
    }
    public function ResetPassword(Request $request, $token = null){
        return view('accounts/ResetPassword')->with(['token'=>$token,'email'=>$request->email]);
    }
    public function passwordReset(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=> 'required|min:6',
            'confirmPassword'=> 'required|min:6|same:password'
        ]);
//Compare requested user's email and token to the user email and token in the password_resets table
        $check_token = \Illuminate\Support\Facades\DB::table('password_resets')->where([
            'email'=>$request->email,
            'token'=>$request->token,
        ])->first();
//If the values match update the password and delete the entry in the password_resets table
        if(!$check_token){
            return back()->withInput()->with('fail','Invalid Token');
        }else{
            Users::where('email', $request->email)->update([
                'password'=> Hash::make($request->password)
            ]);
            \Illuminate\Support\Facades\DB::table('password_resets')->where([
                'email'=>$request->email
            ])->delete();

            return redirect('login')->with('info','Your password has been changed!You can log in with the new password!');
        }
    }
    public function resetSuccess(){
        return view('accounts/resetSuccess');
    }

}
