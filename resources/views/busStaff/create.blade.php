@extends('layouts.app')
@section('mainSection')
@push('pageTitle') Bus Staff Details @endpush
<div class="row">
    <div class="col-md-8 mx-auto">
    <div class="card">
        <div class="card-header ">
            <h4 class="card-title">Add New</h4>
            <p class="card-category">Enter The Required Details too add new staff</p>
        </div>
        <form action="{{ isset($data) ?  route('busStaffDetails.update', $data->id) : route('busStaffDetails.store') }}" method="POST">
            @if (isset($data))
                @method('PUT')
            @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session()->has('success'))
        <div class="container">
            <div class="alert alert-success" role="alert">
                <h6 class="m-0"></b>{{session('success')}}</h6>
                <script>
                setTimeout(() => {
                    window.location.href = "{{ route('busStaffDetails.index') }}";
                }, 1500); 
                </script>
            </div>
        </div>
        @endif
        @csrf
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-6">
                    <label><h6>Name <span class="text-danger">*</span></h6></label>
                    <input type="text" name="name" class="form-control" value="{{ old("name", isset($data) ? $data->name : '') }} ">
                </div>
                <div class="col-6">
                    <label for=""><h6>Designation <span class="text-danger">*</span></h6></label>
                    <select class="form-control" name="designation">
                    <option value="">--Select--</option>
                    <option value="driver"
                        {{ old('designation', $data->designation ?? '') == 'driver' ? 'selected' : '' }}>
                        Driver
                    </option>

                    <option value="cleaner"
                        {{ old('designation', $data->designation ?? '') == 'cleaner' ? 'selected' : '' }}>
                        Cleaner
                    </option>
                </select>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-6">
                    <label for=""><h6>Email <span class="text-danger">*</span></h6></label>
                    <input type="email" name="email" value="{{ old("email", isset($data) ? $data->email : '') }} " class="form-control">
                </div>
                <div class="col-6">
                    <label for=""><h6>Contact No. <span class="text-danger">*</span></h6></label>
                    <input type="text" class="form-control" value="{{ old("contact", isset($data) ? $data->contact : '') }} " name="contact" maxlength="11">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6">
                    <label for=""><h6>Date of Birth <span class="text-danger">*</span></h6></label>
                    <input type="date" name="dob" class="form-control" value="{{ old('dob', isset($data) ? \Carbon\Carbon::parse($data->dob)->format('Y-m-d') : '') }}">
                </div>
                <div class="col-6">
                    <label for=""><h6>Joining Date <span class="text-danger">*</span></h6></label>
                    <input type="date" name="doj" class="form-control" value="{{ old('doj', isset($data) ? \Carbon\Carbon::parse($data->doj)->format('Y-m-d') : '') }}">
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