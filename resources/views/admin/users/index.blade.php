@extends('layouts.admin_layout')
@push('styles')

@endpush
@section('content')
<div class="container p-10">
<div class="card">
    <div class="card-body">
        <h1>User Lists</h1>
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
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td> <img src="{{url('uploads/blog/'.$user->image)}}"  class="rounded-circle" style="height: 50px; width: 50px;"></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->phone_number}}</td>
                    <td class="text-center">
                        <div class="btn-group" role="group" aria-label="Second group">
                            <a href="{{ route('user.show', $user->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-sm fa-edit"></i></a>
                            
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
