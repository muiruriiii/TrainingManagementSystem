<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function role(){
        if(Auth::user()->userType != 'admin'){
            return view('accounts/login');
        }else{
            return view('roles/role');
        }
    }
    public function EditRole($id){
        if(Auth::user()->userType != 'admin'){
            return view('accounts/login');
        }else{
        $roles = Roles::find($id);
        return view('roles/EditRole',['roles'=> $roles]);
        }
    }
    public function DeleteRole($id){
        if(Auth::user()->userType != 'admin'){
            return view('accounts/login');
        }else{
        $roles = Roles::find($id)->delete();;
        return redirect('ViewRoles');
        }
    }
    public function ViewTrashedRoles()
    {
        $roles = Roles::onlyTrashed()->get();
        return view('roles/ViewTrashedRoles',['roles'=> $roles]);
    }
    public function RestoreRoles($id){
        Roles::whereId($id)->restore();
         return redirect('ViewTrashedRoles');
    }
    public function RestoreAllRoles(){
        Roles::onlyTrashed()->restore();
        return back();
    }
    public function ForceDeleteRoles($id){
        Roles::find($id)->forceDelete();
        return back();
    }


    public function ViewRoles(){
        if(Auth::user()->userType != 'admin'){
            return view('accounts/login');
        }else{
            $roles = Roles::paginate(1);
        return view('roles/ViewRoles',['roles'=> $roles]);
        }
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
