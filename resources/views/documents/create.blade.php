@extends('layouts.app')
@section('mainSection')
@push('pageTitle') Documents Management @endpush
<div class="row">
    <div class="col-md-12 mx-auto">
    <div class="card">
        <div class="card-header ">
            <h4 class="card-title">Add Vehicle Details</h4>
            <p class="card-category">Enter All the necessary details about the vehicle.</p>
        </div>
         @if(session()->has('success'))
        <div class="container">
            <div class="alert alert-success" role="alert">
                <h6 class="m-0"></b>{{session('success')}}</h6>
                <script>
                setTimeout(() => {
                    window.location.href = "{{ route('documents.index') }}";
                }, 1500); 
                </script>
            </div>
        </div>
        @endif
        <form action="{{ isset($data) ?  route('documents.update', $data->id) : route('documents.store') }}" method="POST">
        @if (isset($data))
            @method('PUT')
        @endif
        @csrf
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-3">
                    <label for=""><h6>Registered No. <span class="text-danger">*</span></h6></label>
                    <input type="text" name="registeredNo" class="form-control" value="{{ old("registeredNo", isset($data) ? $data->registeredNo : '') }} ">
                    @error('registeredNo')
                        <div class="text-danger mt-2"><h6>{{ $message }}</h6></div>
                    @enderror
                </div>
                <div class="col-3">
                    <label for=""><h6>Vehicle Type <span class="text-danger">*</span></h6></label>
                    <select class="form-control" name="vehicleType">
                        <option value="">--Select--</option>
                        <option value="bus"
                            {{ old('vehicleType', $data->vehicleType ?? '') == 'bus' ? 'selected' : '' }}>
                            Bus
                        </option>
                        <option value="car"
                            {{ old('vehicleType', $data->vehicleType ?? '') == 'car' ? 'selected' : '' }}>
                            Car
                        </option>
                        <option value="bike"
                            {{ old('vehicleType', $data->vehicleType ?? '') == 'bike' ? 'selected' : '' }}>
                            Bike
                        </option>
                    </select>
                    @error('vehicleType')
                        <div class="text-danger mt-2"><h6>{{ $message }}</h6></div>
                    @enderror
                </div>
                 <div class="col-3">
                     <label for=""><h6>Driver <span class="text-danger">*</span></h6></label>
                    <select class="form-control" name="driver">
                        <option value="">--Select--</option>
                        <option value="common" {{ old('driver', isset($data) ? $data->driver : '') ==  'common'  ? 'selected' : ''  }}>Common Vehicle</option>
                        @foreach ($driverSel as $driverSel)
                            <option value="{{ $driverSel->id }}"
                                {{ old('driver', isset($data) ? $data->driver : '') ==  $driverSel->id  ? 'selected' : ''  }}>
                                {{ $driverSel->name }}
                            </option>
                        @endforeach
                    </select>
                     @error('driver')
                        <div class="text-danger mt-2"><h6>{{ $message }}</h6></div>
                    @enderror
                </div>
                <div class="col-3">
                     <label for=""><h6>Cleaner <span class="text-danger">*</span></h6></label>
                    <select class="form-control" name="cleaner">
                        <option value="">--Select--</option>
                        <option value="no" {{ old('driver', isset($data) ? $data->cleaner : '') ==  'no'  ? 'selected' : ''  }}>No Cleaner</option>
                        @foreach ($cleanerSel as $cleanerSel)
                            <option value="{{ $cleanerSel->id }}"
                                {{ old('cleaner', isset($data) ? $data->cleaner : '') ==  $cleanerSel->id  ? 'selected' : ''  }}>
                                {{ $cleanerSel->name }}
                            </option>
                        @endforeach
                    </select>
                   @error('cleaner')
                        <div class="text-danger mt-2"><h6>{{ $message }}</h6></div>
                    @enderror
                </div>
            </div>
            <hr class="hr" />
            <h5 class="mt-3 mb-3"><span class="bg-success px-2 text-white rounded"><b>PUC :</b></span></h5>
            <div class="row mb-0">
                <div class="col-4">
                    <label for=""><h6>From <span class="text-danger">*</span></h6></label>
                    <input type="date" name="pucFrom" class="form-control" value="{{ old('pucFrom', isset($data) ? \Carbon\Carbon::parse($data->pucFrom)->format('Y-m-d') : '') }}">
                    @error('pucFrom')
                        <div class="text-danger mt-2"><h6>{{ $message }}</h6></div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for=""><h6>To <span class="text-danger">*</span></h6></label>
                    <input type="date" name="pucTo" class="form-control" value="{{ old('pucTo', isset($data) ? \Carbon\Carbon::parse($data->pucTo)->format('Y-m-d') : '') }}">
                    @error('pucTo')
                        <div class="text-danger mt-2"><h6>{{ $message }}</h6></div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for=""><h6>Amount Paid <span class="text-danger">*</span></h6></label>
                    <input type="number" name="pucAmt" class="form-control">
                    @error('pucAmt')
                        <div class="text-danger mt-2"><h6>{{ $message }}</h6></div>
                    @enderror
                </div>
            </div>
            <hr class="hr" />
            <h5 class="mt-4 mb-3"><span class="bg-info px-2 text-white rounded"><b>Insurance :</b></span></h5>
            <div class="row mb-0">
                <div class="col-4">
                    <label for=""><h6>From <span class="text-danger">*</span></h6></label>
                    <input type="date" name="insuranceFrom" class="form-control">
                    @error('insuranceFrom')
                        <div class="text-danger mt-2"><h6>{{ $message }}</h6></div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for=""><h6>To <span class="text-danger">*</span></h6></label>
                    <input type="date" name="insuranceTo" class="form-control">
                    @error('insuranceTo')
                        <div class="text-danger mt-2"><h6>{{ $message }}</h6></div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for=""><h6>Amount Paid <span class="text-danger">*</span></h6></label>
                    <input type="number" name="insAmt" class="form-control">
                    @error('insAmt')
                        <div class="text-danger mt-2"><h6>{{ $message }}</h6></div>
                    @enderror
                </div>
            </div>
            <hr class="hr" />
            <h5 class="mt-4 mb-3"><span class="bg-primary px-2 text-white rounded"><b>Fitness :</b></span></h5>
            <div class="row mb-0">
                <div class="col-4">
                    <label for=""><h6>From <span class="text-danger">*</span></h6></label>
                    <input type="date" name="fitnessFrom" class="form-control">
                    @error('fitnessFrom')
                        <div class="text-danger mt-2"><h6>{{ $message }}</h6></div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for=""><h6>To <span class="text-danger">*</span></h6></label>
                    <input type="date" name="fitnessTo" class="form-control">
                    @error('fitnessTo')
                        <div class="text-danger mt-2"><h6>{{ $message }}</h6></div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for=""><h6>Amount Paid <span class="text-danger">*</span></h6></label>
                    <input type="number" name="fitnessAmt" class="form-control">
                    @error('fitnessAmt')
                        <div class="text-danger mt-2"><h6>{{ $message }}</h6></div>
                    @enderror
                </div>
            </div>
            <hr class="hr" />
            <h5 class="mt-4 mb-3"><span class="bg-warning px-2 text-white rounded"><b>Permit :</b></span></h5>
            <div class="row mb-0">
                <div class="col-4">
                    <label for=""><h6>From <span class="text-danger">*</span></h6></label>
                    <input type="date" name="permitFrom" class="form-control">
                    @error('permitFrom')
                        <div class="text-danger mt-2"><h6>{{ $message }}</h6></div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for=""><h6>To <span class="text-danger">*</span></h6></label>
                    <input type="date" name="permitTo" class="form-control">
                    @error('permitTo')
                        <div class="text-danger mt-2"><h6>{{ $message }}</h6></div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for=""><h6>Amount Paid <span class="text-danger">*</span></h6></label>
                    <input type="number" name="permitAmt" class="form-control">
                    @error('permitAmt')
                        <div class="text-danger mt-2"><h6>{{ $message }}</h6></div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-footer" style="text-align: end">
            <button type="button" class="btn btn-danger p-1" onclick="window.history.back();"><i class="la la-angle-double-left"></i> Back</button>
            <button type="submit" class="btn p-1 text-white" style="background: rgb(0, 61, 51)"><i class="la la-file"></i> Save</button>
        </div>
        </form>
    </div>
</div>
</div>
@endsection