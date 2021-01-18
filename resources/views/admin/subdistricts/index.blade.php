@extends('layouts.admin_layout')
@push('styles')
@endpush
@section('content')
<div class="container p-10">
    <div class="card">
        <div class="card-body">
            <h1 style="margin-bottom: -25px">All Subdistrict</h1> 
            <a href="{{ route('subdistrict.create') }}" class="btn btn-sm btn-outline-success float-right"><i class="fa fa-sm fa-plus"></i>Add  Subdistricts
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="myTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th >Subdistrict Name</th>
                        <th>Division Name</th>
                        <th>District Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subdistricts as $subdistrict)
                    <tr>
                        <td>{{ $subdistrict->id }}</td>
                        <td>{{ $subdistrict->subdis_name}}</td>
                        <td>{{ $subdistrict->divisions->name }}</td>
                        <td>{{ $subdistrict->district->name }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Second group">
                            <a href="{{ route('subdistrict.edit', $subdistrict->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-xs fa-edit"></i></a>
                            <a href="subdistrict/delete/{{$subdistrict->id}}" class="btn btn-sm btn-danger delete-confirm"><i class="fa fa-xs fa-trash"></i></a>
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
  

