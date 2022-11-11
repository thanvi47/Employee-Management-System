<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   if(isset(auth()->user()->role->permissions['name']['user']['can-view'])){
        $users = User::all();
        return view('admin.user.index',compact('users'));}
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
    {   if(isset(auth()->user()->role->permissions['name']['user']['can-add'])){
        $departments = Department::all();
        $roles = Role::all();
        return view('admin.user.create',compact('departments','roles'));}
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
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required',
            'address'=>'required',
            'mobile_number'=>'required|unique:users',
            'department_id'=>'required',
            'role_id'=>'required',
            'designation'=>'required',
            'start_form'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png,gif'
        ]);
        $data=$request->all();

         if ($request->hasFile('image')){

             $image = time().$request->image->getClientOriginalName();
             $request->image->move(public_path('profile'),$image);
//             $data['image'] = $image_name;
         }else{
          $image='avatar.png';

         }
            $user = new User();
            $user->name = $request->firstname.' '.$request->lastname;
            $user->image = $image;
            $user->password = bcrypt($request->password);
            $user->email = $request->email;
            $user->address = $request->address;
            $user->mobile_number = $request->mobile_number;
            $user->department_id = $request->department_id;
            $user->designation = $request->designation;
            $user->start_form = $request->start_form;
            $user->role_id = $request->role_id;

            $user->save();

            return redirect()->route('user.index')->with('message','User Created Successfully');




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
    {   if(isset(auth()->user()->role->permissions['name']['user']['can-edit'])){
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));}
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
        $user = User::find($id);

        $this->validate($request,[

            'name'=>'required',
            'email'=>'required|unique:users,email,'.$id,
//            'password'=>'required',
            'address'=>'required',
//            'mobile_number'=>'required|unique:users,mobile_number,'.$id,
            'department_id'=>'required',
            'role_id'=>'required',
            'designation'=>'required',
            'start_form'=>'required',
            'image'=>'mimes:jpeg,jpg,png,gif'
        ]);
//        dd($request->all());


        if ($request->hasFile('image')){

            $image = time().$request->image->getClientOriginalName();
            $request->image->move(public_path('profile'),$image);
//             $data['image'] = $image_name;
        }else{
            $image=$user->image;

        }
        if ($request->password) {
            $password = bcrypt($request->password);
        }else{
            $password = $user->password;
        }
        $user->name = $request->name;
        $user->image = $image;
        $user->password = $password;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->mobile_number = $request->mobile_number;
        $user->department_id = $request->department_id;
        $user->designation = $request->designation;
        $user->start_form = $request->start_form;
        $user->role_id = $request->role_id;
        $user->save();
        return redirect()->route('user.index')->with('message','User Updated Successfully');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   if(isset(auth()->user()->role->permissions['name']['user']['can-delete'])){
        $user = User::find($id);
        if (auth()->user()->id == $user->id){
            return redirect()->back()->with('error','You are not authorized to delete yourself');
        }else{  $user->delete();}

        return redirect()->route('user.index')->with('message','User Deleted Successfully');}
        else{
            return redirect()->back()->with('error','You are not authorized to access this page');
        }
    }
}
