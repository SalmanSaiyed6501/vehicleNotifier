@extends('layouts.app')
@section('mainSection')
@push('pageTitle') Documents Management @endpush
<div class="row">
    <div class="col-md-12 mx-auto">
    <div class="card">
        <div class="card-header ">
             <div class="d-flex">
                <h4 class="card-title">Total Vehicles : {{ $countVehicle }}</h4>&nbsp; &nbsp; &nbsp;
                <a href="{{ route('documents.create') }}" class="btn btn-warning p-1" style="color: #000!important; "><span class="m-0"><b>+ Add New</b></span></a>
             </div>
             <p class="card-category">Table below shows Total Drivers and Conductors</p>
        </div>
        <div class="card-body">
            <table class="table table-head-bg-info table-striped table-hover table-border">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Registered No.</th>
                        <th scope="col">Vehicle Type</th>
                        <th scope="col">PUC Exp.Date</th>
                        <th scope="col">Insurance Exp.Date</th>
                        <th scope="col">Fitness Exp.Date</th>
                        <th scope="col">Permit Exp.Date</th>
                        <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vehicleDetail as $value)
                    <tr>
                        <td>1</td>
                        <td>{{ $value->registeredNo }}</td>
                        <td>{{ $value->vehicleType }}</td>
                        <td>{{ \Carbon\Carbon::parse($value->pucTo)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($value->insuranceTo)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($value->fitnessTo)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($value->permitTo)->format('d/m/Y') }}</td>
                        <td>
                            <button class="btn p-1" style="background: #2c0202; color:white;" data-toggle="modal" data-backdrop="static" data-target="#viewDetails"><h6 class="m-0"><i class="la la-file"></i></h6></button>
                            <a href="{{ route('documents.edit', $value->id) }}" class="btn text-white p-1" style="background: #00a870;"><h6 class="m-0"><i class="la la-edit"></i></h6></a>
                            <button class="btn btn-danger p-1" onclick="return confirm('Are You Sure to Delete?');"><h6 class="m-0"><i class="la la-trash"></i></h6></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<div class="modal fade bd-example-modal-lg" id="viewDetails" tabindex="-1" role="dialog" aria-labelledby="viewDetails" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-white bg-primary py-2">
        <h5 class="m-0" id="exampleModalLabel"><b>Vehicle Details</b></h5>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer p-2">
        <button type="submit" class="btn text-white p-1" style="background: #2c0202;" data-dismiss="modal"><h6 class="m-0">Close</h6></button>
      </div>
    </div>
  </div>
</div>
@endsection