@extends('layouts.app')
@section('mainSection')
@push('pageTitle') Bus Staff Details @endpush
<div class="row">
    <div class="col-md-12 mx-auto">
    <div class="card">
        <div class="card-header ">
             <div class="d-flex">
                <h4 class="card-title">Total Staff : {{ $countStaff }}</h4>&nbsp; &nbsp; &nbsp;
                <a href="{{ route('busStaffDetails.create') }}" class="btn btn-primary p-1"><span class="m-0"><b>+ Add New</b></span></a>
             </div>
             <p class="card-category">Table below shows Total Drivers and Conductors</p>
             @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                <h6 class="m-0"></b>{{session('success')}}</h6>
                <script>
                setTimeout(() => {
                    window.location.reload();
                }, 1500);
                </script>
            </div>
            @endif
        </div>
        <div class="card-body">
            <table class="table table-head-bg-warning table-striped table-hover table-border">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact No.</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Date of Joining</th>
                        <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach ($staffDetails as $value)
                    <tr> 
                        <td>{{ $i++ }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->designation }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->contact }}</td>
                        <td>{{ \Carbon\Carbon::parse($value->dob)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($value->doj)->format('d/m/Y') }}</td>
                        <td class="d-flex">
                            <a href="{{ route('busStaffDetails.edit',$value->id) }}" class="btn text-white p-1" style="background: #2c0202;"><h6 class="m-0"><i class="la la-edit"></i></h6></a>&nbsp;
                            <form action="{{ route('busStaffDetails.destroy',$value->id) }}" method="POST" onsubmit="return confirm('You Want to Delete -- {{$value->name}} ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger p-1 text-white"><h6 class="m-0"><i class="la la-trash"></i></h6></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

@endsection