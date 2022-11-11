<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   if(isset(auth()->user()->role->permissions['name']['department']['can-view'])){
        $departments = Department::all();
        return view('admin.department.index',compact('departments'));}else{
            return redirect()->back()->with('error','You are not authorized to access this page');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(isset(auth()->user()->role->permissions['name']['department']['can-add']))
        {
            return view('admin.department.create'); } else{

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
            'name'=>'required|unique:departments',
//            'description'=>'required',
        ]);
    $department = new Department;
    $department->name = $request->name;
    $department->description = $request->description;
    $department->save();
    return redirect()->route('department.index')->with('message','Department Created Successfully');

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
    {
        if(isset(auth()->user()->role->permissions['name']['department']['can-edit'])){
        $department = Department::find($id);
        return view('admin.department.edit',compact('department'));}else{
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
            'name'=>'required|unique:departments,name,'.$id,
//            'description'=>'required',
        ]);
        $department = Department::find($id);
        $department->name = $request->name;
        $department->description = $request->description;
        $department->save();
        return redirect()->route('department.index')->with('message','Department Updated Successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(isset(auth()->user()->role->permissions['name']['department']['can-delete'])){
        $department = Department::find($id);
        $department->delete();
        return redirect()->route('department.index')->with('massage','Department Deleted Successfully');}else{
            return redirect()->back()->with('error','You are not authorized to access this page');
        }

    }
}
