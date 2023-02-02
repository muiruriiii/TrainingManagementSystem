<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Courses;
use App\Models\Users;

class UserPaymentsController extends Controller
{
    public function userPayments($id)
    {
//         if(Auth::check()){
//             $users = Users::find(Auth::user()->id);
//         }
//          $courses = Courses::find($id);
//          $users->save();
//          $courses->save();
         return redirect('/payment');
    }
}
