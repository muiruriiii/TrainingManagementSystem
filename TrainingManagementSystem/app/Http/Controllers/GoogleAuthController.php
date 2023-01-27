<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Socialite;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callbackGoogle()
    {
        try
        {
            $google_user = Socialite::driver('google')->user();

            $user = Users::where('googleID', $google_user->getId())->first();

            if(!$user)
            {
                 $new_user =
                [
                    'name'=>$google_user->getName(),
                    'email'=>$google_user->getEmail(),
                    'googleID'=>$google_user->getId()
                ];
                Auth::login($new_user);

                return redirect()->intended('/');
            }
            else
            {
                Auth::login($user);
                return redirect()->intended('/');
            }
        }
        catch(\Throwable $th)
        {
            dd('Something went wrong! '. $th->getMessage());
        }
    }
}
