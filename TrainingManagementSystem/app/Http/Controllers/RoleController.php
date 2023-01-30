<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function role(){
        return view('roles/role');
    }
    public function EditRole($id){
        $roles = Roles::find($id);
        return view('roles/EditRole',['roles'=> $roles]);
    }
    public function DeleteRole($id){
         $roles = Roles::find($id);
         $roles->isDeleted = 1;
         $roles->save();
         return redirect('ViewRoles');
     }
    public function ViewRoles(){
        $roles = Roles::all();
        return view('roles/ViewRoles',['roles'=> $roles]);
    }
    public function validateRoles(Request $request)
     {
        $request->validate([
            'roleName'=> 'required',
            'roleDescription'=> 'required'
        ]);
        $data = $request->all();
        Roles::create([
            'roleName' => $data['roleName'],
            'roleDescription' => $data['roleDescription']
         ]);
            return redirect('ViewRoles');
     }
     public function RolesEdit($id,Request $request)
     {
         $request->validate([
            'roleName'=> 'required',
            'roleDescription'=> 'required'
         ]);
            $data = $request->all();

            $roles = Roles::find($id);
            $roles->roleName = $data['roleName'];
            $roles->roleDescription = $data['roleDescription'];
            $roles->save();

            return redirect('ViewRoles');

     }

}
