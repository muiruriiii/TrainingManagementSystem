<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function role(){
        return view('role');
    }
     public function EditRole($id){
           $roles = Roles::find($id);
            return view('EditRole',['roles'=> $roles]);
     }
    public function ViewRoles(){
            $roles = Roles::all();
            return view('ViewRoles',['roles'=> $roles]);
    }


}
