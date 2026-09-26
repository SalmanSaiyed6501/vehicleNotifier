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
        // Today
        $today = Carbon::today();

        // Date exactly 5 days from today
        $expiryCheckDate = $today->copy()->addDays(5);

        // Get vehicles belonging to current user/session
        $vehicles = vehicleDetail::where('session_id',session('user'))->get();

        foreach ($vehicles as $vehicle) {

            $documents = [];

            // PUC
            if (
                !empty($vehicle->pucTo) &&
                Carbon::parse($vehicle->pucTo)->isSameDay($expiryCheckDate)
            ) {
                $documents[] = 'PUC';
            }

            // Insurance
            if (
                !empty($vehicle->insuranceTo) &&
                Carbon::parse($vehicle->insuranceTo)->isSameDay($expiryCheckDate)
            ) {
                $documents[] = 'Insurance';
            }

            // Fitness
            if (
                !empty($vehicle->fitnessTo) &&
                Carbon::parse($vehicle->fitnessTo)->isSameDay($expiryCheckDate)
            ) {
                $documents[] = 'Fitness';
            }

            // Permit
            if (
                !empty($vehicle->permitTo) &&
                Carbon::parse($vehicle->permitTo)->isSameDay($expiryCheckDate)
            ) {
                $documents[] = 'Permit';
            }


            /*
            |--------------------------------------------------------------------------
            | Send Mail
            |--------------------------------------------------------------------------
            */

            if (count($documents) > 0) {

                $documentList = implode(', ', $documents);
                $to = "salmanalisaiyed313@gmail.com";
                $msg = "Vehicle document expiry reminder.\n\n";
                $msg .= "Registered No: "
                    . $vehicle->registeredNo
                    . "\n";

                $msg .= "Vehicle Type: "
                    . $vehicle->vehicleType
                    . "\n";

                $msg .= "The following document(s) will expire in 5 days:\n";

                $msg .= $documentList . "\n\n";

                $msg .= "Expiry Date: "
                    . $expiryCheckDate->format('d/m/Y');


                $subject = "Vehicle Document Expiry Reminder - "
                    . $vehicle->registeredNo;

                dd($subject);

                Mail::to($to)->send(
                    new documentUpdate(
                        $msg,
                        $subject
                    )
                );
            }
        }
    }


    public function sendMail()
    {
        $to = "salmanalisaiyed313@gmail.com";
        $msg = "A Dummy Mail message for Testing purpose";
        $subject = "Testing Mail Sended by Salman";

        Mail::to($to)->send(new documentUpdate($msg, $subject));
        return redirect()->back()->with('alert', 'Mail Sended Successfully !!');
    }
}