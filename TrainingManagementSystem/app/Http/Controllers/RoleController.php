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
    public function validateRoles(Request $request)
     {
        $request->validate([
            'roleName'=> 'required',
            'roleDescription'=> 'required'
        ]);
        $data = $request->all();
        Roles::create([
            'roleName' => $data('roleName'),
            'roleDescription' => $data('roleDescription')
         ]);
            return redirect('/');
     }
     public function RolesEdit($id,Request $request)
     {
         $request->validate([
            'roleName'=> 'required',
            'roleDescription'=> 'required'
         ]);
            $data = $request->all();

            $roles = Roles::find($id);
            $roles->roleName = $data->input('roleName');
            $roles->roleDescription = $data->input('roleDescription');
            $roles->save();

            return redirect('ViewRoles');

     }

}
