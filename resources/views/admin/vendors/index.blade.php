@extends('layouts.admin_layout')
@push('styles')

@endpush
@section('content')
<div class="container p-10">
<div class="card">
    <div class="card-body">
        <a href="{{ route('vendor.create') }}" class="btn btn-outline-success btn-uppercase pull-right" style="float: right;"><i class="ti-plus mr-2"></i>Add Vendor</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table id="myTable" class="table table-striped table-bordered" >
            <thead>
                <tr>
                <th>Id</th>
                <th>Image</th>
                <th>name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>        
                @foreach($vendors as $vendor)
                <tr>
                    <td>{{ $vendor->id }}</td>
                    <td> <img src="{{url('uploads/blog/'.$vendor->image)}}"  class="rounded-circle" style="height: 50px; width: 50px;"></td>
                    <td>{{ $vendor->name }}</td>
                    <td>{{ $vendor->email }}</td>
                    <td>{{ $vendor->address }}</td>
                    <td>{{ $vendor->phone_number}}</td>
                    <td class="text-center">
                        <div class="btn-group" role="group" aria-label="Second group">
                            <a href="{{ route('vendor.edit', $vendor->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-sm fa-edit"></i></a>
                            <a href="vendor/delete/{{$vendor->id}}" class="btn btn-sm btn-danger delete-confirm"><i class="fa fa-sm fa-trash"></i></a>
                        </div>
                    </td>
                </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
</div> 
</div> 
@endsection
@push('scripts')

@endpush
