<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(isset(auth()->user()->role->permissions['name']['mail']['can-add'])) {
            return view('admin.mail.create');
        }else{
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
       'body'=>'required',
        ]);
        $image=$request->file('file');
        $details=[

            'body'=>$request->body,
            'file'=>$image
        ];
       if ($request->department)
       {
        $users =User::where('department_id',$request->department)->get();
        foreach($users as $user){
            Mail::to($user->email)->send(new \App\Mail\SendMail($details));
            return redirect()->back()->with('message','Mail Send Successfully');
        }
       }elseif ($request->person){
        $user=User::where('id',$request->person)->first();
        $userEmail=$user->email;
        Mail::to($userEmail)->send(new \App\Mail\SendMail($details));
           return redirect()->back()->with('message','Mail Send Successfully');
       }else{
        $users=User::all();
        foreach($users as $user){
            Mail::to($user->email)->send(new \App\Mail\SendMail($details));
            return redirect()->back()->with('message','Mail Send Successfully');

        }
       }
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
}
