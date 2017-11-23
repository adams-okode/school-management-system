<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use App\User;
use DB;
use Riazxrazor\LaravelSweetAlert\LaravelSweetAlert;
class RoleController extends Controller
{
       public function __construct(){
        $this->middleware('auth');
    }
          public function permissions()
    {
        $permissions=Permission::all();
        return view('dashboard.permissions',['permissions'=>$permissions]);
    }
    public function storePermission(Request $request)
    {

     $p=new Permission();
     $p->name=$request->name;
     $p->display_name=$request->display_name;
     $p->description=$request->description;
     $p->save();
     LaravelSweetAlert::setMessage([
                        'title' => 'Successful',
                        'text' => "Permission succesfully created!",
                        'timer' => 2000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);
     return redirect('/permissions');
        
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // ==============================================================

    /**    ROLES        */
    // ==============================================================
  
    public function roles()
    {
        $roles=Role::all();
        $permissions=Permission::all();
        return view('dashboard.roles',['roles'=>$roles,'permissions'=>$permissions]);
    }
        public function addrole()
    {
        $permissions=Permission::all();
        return view('dashboard.addrole',['permissions'=>$permissions]);
    }
    public function storeRole(Request $request)
    {
           $this->validate($request,[
  'name'=>'required|unique:roles',
     ]);
    $role=Role::create($request->except(['permission','_token']));
    if($request->permission==""){
            LaravelSweetAlert::setMessage([
                        'title' => 'Successful',
                        'text' => "Role succesfully created!",
                        'timer' => 2000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);
        return redirect()->back();
        }
        else{
        foreach ($request->permission as $key=>$value){
            $role->attachPermission($value);
        }
     LaravelSweetAlert::setMessage([
                        'title' => 'Successful',
                        'text' => "Role succesfully created!",
                        'timer' => 2000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);
     return redirect('/role');
 }
        
    }
     public function editRole($id)
    {
        $role=Role::find($id);
        $permissions=Permission::all();
        $role_permissions = $role->perms()->pluck('id','id')->toArray();

         return view('dashboard.editRole',compact(['role','role_permissions','permissions']));
    }
    public function updateRole(Request $request, $id)
    {
        $role=Role::find($id);
        $role->name=$request->name;
        $role->display_name=$request->display_name;
        $role->description=$request->description;
        $role->save();

        DB::table('permission_role')->where('role_id',$id)->delete();
        if($request->permission==""){
            LaravelSweetAlert::setMessage([
                        'title' => 'Successful',
                        'text' => "Role updated!",
                        'timer' => 2000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);
        return redirect()->back();
        }
        else{
              foreach ($request->permission as $key=>$value){
            $role->attachPermission($value);
    }
     LaravelSweetAlert::setMessage([
                        'title' => 'Successful',
                        'text' => "Role updated!",
                        'timer' => 2000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);
        return redirect()->back();
        }
    }
        public function deleteRole($id){
        DB::table('permission_role')->where('role_id',$id)->delete();
        DB::table("roles")->where('id',$id)->delete();
        LaravelSweetAlert::setMessage([
                        'title' => 'Successful',
                        'text' => "Role Deleted!",
                        'timer' => 2000,
                        'type' => 'error',
                        'showConfirmButton' =>false
                    ]);
        return redirect()->back();
        
    }
    
}
