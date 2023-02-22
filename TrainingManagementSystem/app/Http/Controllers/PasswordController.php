<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;



class PasswordController extends Controller
{
    public function ForgotPassword(){
        return view('password/ForgotPassword');
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
        Mail::Send('password/reset',['action_link'=>$action_link,'body'=>$body],function($message) use ($request){
            $message->from('noreply@gmail.com','TMS');
            $message->to($request->email,'TMS')
                    ->subject('Reset Password');
        });
        return redirect('resetSuccess');
    }
    public function ResetPassword(Request $request, $token = null){
        return view('password/ResetPassword')->with(['token'=>$token,'email'=>$request->email]);
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
        return view('password/resetSuccess');
    }
}
