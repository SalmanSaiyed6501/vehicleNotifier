@extends('layouts.app')
@section('mainSection')
@push('pageTitle') Dashboard @endpush
<div class="row">
    <div class="col-md-3 mx-auto">
        <div class="card card-stats card-warning">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="la la-users"></i>
                        </div>
                    </div>
                    <div class="col-7 d-flex align-items-center">
                        <div class="numbers">
                            <p class="card-category">Total Bus Staff</p>
                            <h4 class="card-title">{{ $countStaff }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-stats card-success">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="la la-bar-chart"></i>
                        </div>
                    </div>
                    <div class="col-7 d-flex align-items-center">
                        <div class="numbers">
                            <p class="card-category">Total Amount Paid</p>
                            <h4 class="card-title">₹ 1250 /-</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-stats card-danger">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="la la-car"></i>
                        </div>
                    </div>
                    <div class="col-7 d-flex align-items-center">
                        <div class="numbers">
                            <p class="card-category">Total Vehicles</p>
                            <h4 class="card-title">{{ $countvehicle }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 mx-auto">
    <div class="card">
        <div class="card-header ">
            <h4 class="card-title">Total Cost - Vehicle Wise</h4>
            <p class="card-category">Table below shows how much cost per vehicle paid</p>
        </div>
        <div class="card-body">
            <table class="table table-head-bg-primary table-striped table-hover table-border">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Vehicle Type</th>
                        <th scope="col">Registered No.</th>
                        <th scope="col">Amount Paid</th>
                        <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Bike</td>
                        <td>GJ15XX0001</td>
                        <td>₹ 250 /-</td>
                        <td><button class="btn p-1" style="background: #2c0202; color:white;" data-toggle="modal" data-backdrop="static" data-target="#exampleModal"><h6 class="m-0"><i class="la la-file"></i></h6></button></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Bike</td>
                        <td>GJ15XX0001</td>
                        <td>₹ 250 /-</td>
                        <td><button class="btn p-1" style="background: #2c0202; color:white;" data-toggle="modal" data-backdrop="static" data-target="#exampleModal"><h6 class="m-0"><i class="la la-file"></i></h6></button></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Bike</td>
                        <td>GJ15XX0001</td>
                        <td>₹ 250 /-</td>
                        <td><button class="btn p-1" style="background: #2c0202; color:white;" data-toggle="modal" data-backdrop="static" data-target="#exampleModal"><h6 class="m-0"><i class="la la-file"></i></h6></button></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Bike</td>
                        <td>GJ15XX0001</td>
                        <td>₹ 250 /-</td>
                        <td><button class="btn p-1" style="background: #2c0202; color:white;" data-toggle="modal" data-backdrop="static" data-target="#exampleModal"><h6 class="m-0"><i class="la la-file"></i></h6></button></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Bike</td>
                        <td>GJ15XX0001</td>
                        <td>₹ 250 /-</td>
                        <td><button class="btn p-1" style="background: #2c0202; color:white;" data-toggle="modal" data-backdrop="static" data-target="#exampleModal"><h6 class="m-0"><i class="la la-file"></i></h6></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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