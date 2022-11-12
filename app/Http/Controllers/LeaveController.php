<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
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
    {   $leaves = Leave::latest()->where('user_id',auth()->user()->id)->get();
        return view('admin.leave.create',compact('leaves'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'from' => 'required',
                'to' => 'required',
                'type' => 'required',
                'description' => 'required',
            ]
        );
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['status'] = 0;
        $data['message'] = 'Pending';
        Leave::create($data);
        return redirect()->back()->with('message', 'Leave Created Successfully');

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
        $leave = Leave::find($id);
        return view('admin.leave.edit',compact('leave'));
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

        $this->validate(
            $request,
            [
                'from' => 'required',
                'to' => 'required',
                'type' => 'required',
                'description' => 'required',
            ]
        );
        $data = $request->all();

        $leave = Leave::find($id);
        $data['user_id'] = auth()->user()->id;
        $data['status'] = 0;
        $data['message'] = 'Pending';
        $leave->update($data);
        return redirect()->route('leave.create')->with('message', 'Leave Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Leave::find($id)->delete();
        return redirect()->back()->with('message', 'Leave Deleted Successfully');
    }
}
