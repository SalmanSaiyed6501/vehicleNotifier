<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\sesssion;
use App\Models\vehicleDetail;
use App\Models\staffDetail;
use Session;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = user::where('id', session('user'))->get();
        $vehicleDetail = vehicleDetail::where('session_id',session('user'))->get();
        $countVehicle = $vehicleDetail->count();
        return view('documents.index', compact('user','vehicleDetail', 'countVehicle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $user = user::where('id', session('user'))->get();
         $sessionName = sesssion::where('id',$user[0]->session_id)->get();
         return view('documents.create', compact('user','sessionName'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'registeredNo' => 'required',
            'vehicleType' => 'required',
            'driver' => 'required',
            'cleaner' => 'required',
            'pucFrom' => 'required',
            'pucTo' => 'required',
            'pucAmt' => 'required',
            'insuranceFrom' => 'required',
            'insuranceTo' => 'required',
            'insAmt' => 'required',
            'fitnessFrom' => 'required',
            'fitnessTo' => 'required',
            'fitnessAmt' => 'required',
            'permitFrom' => 'required',
            'permitTo' => 'required',
            'permitAmt' => 'required',
          
        ],[
            'registeredNo.required' => 'Enter Registration No. !',
            'vehicleType.required' => 'Select Vehicle Type !',
            'driver.required' => 'Select Driver !',
            'cleaner.required' => 'Select cleaner !',
            'pucFrom.required' => 'Select "PUC From Date" !',
            'pucTo.required' => 'Select "PUC To Date" !',
            'pucAmt.required' => 'Enter Valid Amount',
            'insuranceFrom.required' => 'Select "Insurance From Date" !',
            'insuranceTo.required' => 'Select "Insurance To Date" !',
            'insAmt.required' => 'Enter Valid Amount',
            'fitnessFrom.required' => 'Select "Fitness From Date" !',
            'fitnessTo.required' => 'Select "Fitness To Date" !',
            'fitnessAmt.required' => 'Enter Valid Amount',
            'permitFrom.required' => 'Select "Permit From Date" !',
            'permitTo.required' => 'Select "Permit To Date" !',
            'permitAmt.required' => 'Enter Valid Amount',
        ]);

        $data = new vehicleDetail;
        $data->registeredNo = $request->registeredNo;
        $data->vehicleType = $request->vehicleType;
        $data->driver = $request->driver;
        $data->cleaner = $request->cleaner;
        $data->pucFrom = $request->pucFrom;
        $data->pucTo = $request->pucTo;
        $data->pucAmt = $request->pucAmt;
        $data->insuranceFrom = $request->insuranceFrom;
        $data->insuranceTo = $request->insuranceTo;
        $data->insuranceAmt = $request->insAmt;
        $data->fitnessFrom = $request->fitnessFrom;
        $data->fitnessTo = $request->fitnessTo;
        $data->fitnessAmt = $request->fitnessAmt;
        $data->permitFrom = $request->permitFrom;
        $data->permitTo = $request->permitTo;
        $data->permitAmt = $request->fitnessAmt;
        $data->session_id = session('academic_session_id');

         if ($data->save()) {
            session()->flash('success', 'Saved Successfully !');
            return redirect()->back();
        }
        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = vehicleDetail::find($id);
        $user = user::where('id', session('user'))->get();
        $driverSel = staffDetail::where('designation','driver')->get();
        $cleanerSel = staffDetail::where('designation','cleaner')->get();
        $sessionName = sesssion::where('id',$user[0]->session_id)->get();
        return view('documents.create', compact('user','sessionName','data','driverSel', 'cleanerSel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'registeredNo' => 'required',
            'vehicleType' => 'required',
            'driver' => 'required',
            'cleaner' => 'required',
            'pucFrom' => 'required',
            'pucTo' => 'required',
            'pucAmt' => 'required',
            'insuranceFrom' => 'required',
            'insuranceTo' => 'required',
            'insAmt' => 'required',
            'fitnessFrom' => 'required',
            'fitnessTo' => 'required',
            'fitnessAmt' => 'required',
            'permitFrom' => 'required',
            'permitTo' => 'required',
            'permitAmt' => 'required',
          
        ],[
            'registeredNo.required' => 'Enter Registration No. !',
            'vehicleType.required' => 'Select Vehicle Type !',
            'driver.required' => 'Select Driver !',
            'cleaner.required' => 'Select cleaner !',
            'pucFrom.required' => 'Select "PUC From Date" !',
            'pucTo.required' => 'Select "PUC To Date" !',
            'pucAmt.required' => 'Enter Valid Amount',
            'insuranceFrom.required' => 'Select "Insurance From Date" !',
            'insuranceTo.required' => 'Select "Insurance To Date" !',
            'insAmt.required' => 'Enter Valid Amount',
            'fitnessFrom.required' => 'Select "Fitness From Date" !',
            'fitnessTo.required' => 'Select "Fitness To Date" !',
            'fitnessAmt.required' => 'Enter Valid Amount',
            'permitFrom.required' => 'Select "Permit From Date" !',
            'permitTo.required' => 'Select "Permit To Date" !',
            'permitAmt.required' => 'Enter Valid Amount',
        ]);

        $data = vehicleDetail::find($id);
        $data->registeredNo = $request->registeredNo;
        $data->vehicleType = $request->vehicleType;
        $data->driver = $request->driver;
        $data->cleaner = $request->cleaner;
        $data->pucFrom = $request->pucFrom;
        $data->pucTo = $request->pucTo;
        $data->pucAmt = $request->pucAmt;
        $data->insuranceFrom = $request->insuranceFrom;
        $data->insuranceTo = $request->insuranceTo;
        $data->insuranceAmt = $request->insAmt;
        $data->fitnessFrom = $request->fitnessFrom;
        $data->fitnessTo = $request->fitnessTo;
        $data->fitnessAmt = $request->fitnessAmt;
        $data->permitFrom = $request->permitFrom;
        $data->permitTo = $request->permitTo;
        $data->permitAmt = $request->fitnessAmt;
        $data->session_id = session('academic_session_id');

         if ($data->save()) {
            session()->flash('success', 'Saved Successfully !');
            return redirect()->back();
        }
        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
