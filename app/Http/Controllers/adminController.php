<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\user;
use App\Models\sesssion;
use App\Models\staffDetail;
use App\Models\vehicleDetail;
use App\Mail\documentUpdate;
use Hash;
use Session;
use Carbon\Carbon;

class adminController extends Controller
{
    public function index(){
        $user = user::where('id', session('user'))->get();
        $countStaff = StaffDetail::where('session_id', session('user'))->count();
        $countvehicle = vehicleDetail::where('session_id', session('user'))->count();
        return view('index', compact('user','countStaff','countvehicle'));
    }

    public function login(){
        $session = sesssion::all();
        return view('login', compact('session'));
    }

    public function logout(){
        session::flush();
        return redirect()->route('vehicle.login');
    }

    public function authenticate(Request $request)
    {
        // $insert = new user;
        // $insert->name = "Salman";
        // $insert->email = "st.francishighschool.vapi@gmail.com";
        // $insert->password = Hash::make('123456');
        // return $insert->save();

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = user::where('email', $request->email)->first();
        $session_name = Sesssion::where('id', $request->session)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Invalid Username or Password !!!');
        }
        
        Session::put([
            'user' => $user->id,
            'academic_session_id' => $request->session,
            'session_name' => $session_name->session,
        ]);
        return redirect()->back()->with('success', 'Login Successfully !!');
    }

    public function checkExpiry()
    {
       
    }


    public function sendMail()
    {
        $MailId = user::where('id', session('user'))->first();
        $document = vehicleDetail::all();
        // $insuranceTo = 
        $to = $MailId->email;

        $msg = $document;
        $subject = "Testing Mail Sended by Salman";

        foreach ($document as $vehicle) {
            // dd($vehicle->pucTo, $vehicle->insuranceTo, $vehicle->fitnessTo, $vehicle->permitTo);    
        }
        
        $notificationDate = now()->addDays(7)->toDateString();

        $documents = VehicleDetail::whereDate('pucTo', $notificationDate)->get();

        dd($notificationDate);

        // Mail::to($to)->send(new documentUpdate($msg, $subject));
        // return redirect()->back()->with('success', 'Mail Sended Successfully !!');
    }
}