<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\sesssion;
use App\Models\staffDetail;
use Session;

class BusStaffDetails extends Controller
{
    public function index()
    {
        $user = user::where('id', session('user'))->get();
        $staffDetails = staffDetail::where('session_id',session('user'))->get();
        $countStaff = $staffDetails->count();
        return view('busStaff.index', compact('user', 'staffDetails', 'countStaff'));
    }
    public function create()
    {
        $user = user::where('id', session('user'))->get();
        $sessionName = sesssion::where('id',$user[0]->session_id)->get();
        return view('busStaff.create', compact('user','sessionName'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'dob' => 'required',
            'doj' => 'required',
        ],[
            'name.required' => 'Please Enter Name !',
            'designation.required' => 'Please Select Designation !',
            'email.required' => 'Please Enter E-mail!',
            'contact.required' => 'Please Enter Contact !',
            'dob.required' => 'Please Select Date of Birth !',
            'doj.required' => 'Please Select Joining Date !',
        ]);

        $value = new staffDetail;
        $value->name = $request->name;
        $value->designation = $request->designation;
        $value->email = $request->email;
        $value->contact = $request->contact;
        $value->dob = $request->dob;
        $value->doj = $request->doj;
        $value->session_id = session('academic_session_id');

        if ($value->save()) {
            session()->flash('success', 'Saved Successfully !');
            return redirect()->back();
        }
        return redirect()->back()->withInput();
    }
    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        $data = staffDetail::find($id);
        $user = user::where('id', session('user'))->get();
        $sessionName = sesssion::where('id',$user[0]->session_id)->get();
        return view('busStaff.create', compact('user','sessionName','data'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'dob' => 'required',
            'doj' => 'required',
        ],[
            'name.required' => 'Please Enter Name !',
            'designation.required' => 'Please Select Designation !',
            'email.required' => 'Please Enter E-mail!',
            'contact.required' => 'Please Enter Contact !',
            'dob.required' => 'Please Select Date of Birth !',
            'doj.required' => 'Please Select Joining Date !',
        ]);
        
        $value = staffDetail::find($id);
        $value->name = $request->name;
        $value->designation = $request->designation;
        $value->email = $request->email;
        $value->contact = $request->contact;
        $value->dob = $request->dob;
        $value->doj = $request->doj;
        $value->session_id = session('academic_session_id');

        if ($value->save()) {
            session()->flash('success', 'Saved Successfully !');
            return redirect()->back();
        }
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $value = staffDetail::findOrFail($id);
        $value->delete();
        session()->flash('success', 'Deleted Successfully !');
        return redirect()->back();
    }
}
