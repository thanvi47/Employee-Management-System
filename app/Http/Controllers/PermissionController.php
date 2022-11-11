<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   if(isset(auth()->user()->role->permissions['name']['permission']['can-view'])){
        $permissions = Permission::all();
        return view('admin.permission.index',compact('permissions'));}else{
            return redirect()->back()->with('error','You are not authorized to access this page');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   if(isset(auth()->user()->role->permissions['name']['permission']['can-add'])){
        return view('admin.permission.create');}else{
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
//        'name'=>'required',
        'role_id'=>'required|unique:permissions',
      ]);
     Permission::create($request->all());
        return redirect()->route('permission.index')->with('message','Permission created successfully');
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
    {       if(isset(auth()->user()->role->permissions['name']['permission']['can-edit'])){
        $permission = Permission::find($id);
        return view('admin.permission.edit',compact('permission'));}else{
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
            'name'=>'required',

        ]);
        $permission = Permission::find($id);
        $permission->update($request->all());
        return redirect()->route('permission.index')->with('message','Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   if(isset(auth()->user()->role->permissions['name']['permission']['can-delete'])){
        $permission = Permission::find($id);
        $permission->delete();
        return redirect()->route('permission.index')->with('message','Permission deleted successfully');}else{
            return redirect()->back()->with('error','You are not authorized to access this page');
        }
    }
}
