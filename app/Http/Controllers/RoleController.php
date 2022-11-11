<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   if(isset(auth()->user()->role->permissions['name']['role']['can-view'])){
        $roles = Role::all();
        return view('admin.role.index',compact('roles'));}
        else{
            return redirect()->back()->with('error','You are not authorized to access this page');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   if(isset(auth()->user()->role->permissions['name']['role']['can-add'])){
        return view('admin.role.create');}
        else{
            return redirect()->back()->with('error','You are not authorized to access this page');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
           'name'=>'required|unique:roles',
//           'description'=>'required'
       ]);
         $role = new Role();
            $role->name = $request->name;
            $role->description = $request->description;
            $role->save();
            return redirect()->route('role.index')->with('massage','Role Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    {   if(isset(auth()->user()->role->permissions['name']['role']['can-edit'])){
        $role = Role::find($id);
        return view('admin.role.edit',compact('role'));}
        else{
            return redirect()->back()->with('error','You are not authorized to access this page');
        }
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
        $this->validate($request,[
            'name'=>'required|unique:roles,name,'.$id,
//            'description'=>'required'
        ]);
        $role = Role::find($id);
        $role->update($request->all());
        return redirect()->route('role.index')->with('massage','Role Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   if(isset(auth()->user()->role->permissions['name']['role']['can-delete'])){
     $role = Role::find($id);
        $role->delete();
        return redirect()->route('role.index')->with('massage','Role Deleted Successfully');}
        else{
            return redirect()->back()->with('error','You are not authorized to access this page');
        }
    }
}
