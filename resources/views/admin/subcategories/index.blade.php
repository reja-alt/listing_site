@extends('layouts.admin_layout')
@push('styles')

@endpush
@section('content')
<div class="container p-10">
    <div class="card">
        <div class="card-body">
            <h1 style="margin-bottom: -25px">All Subcategories</h1> 
            <a href="{{ route('subcategory.create') }}" class="btn btn-sm btn-outline-success float-right" style="float: right"><i class="fa fa-sm fa-plus"></i>Add  Subcategory
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="myTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Subcategory Name</th>   
                        <th>Category Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subcategories as $subcategory)
                    <tr>
                        <td>{{ $subcategory->id }}</td>
                        <td>{{ $subcategory->name }}</td>
                        <td>{{ $subcategory->category->name }}</td>
                        <td>
                        @if($subcategory->status == 1) 
                        <span class="switch switch-outline switch-icon switch-success">
                            <label>
                                <input type="checkbox" checked="checked" name="status" class="select" value="1">
                                <span></span>
                            </label>
                        </span>
                        @else
                        <span class="switch switch-outline switch-icon switch-success" >
                            <label>
                                <input type="checkbox"  name="status" class="select" value="0"  >
                                <span></span>
                            </label>
                        </span>
                        @endif
                        </td>
                        <td class="text-center">
                            <div class="btn-group" role="group" aria-label="Second group">
                                <a href="{{ route('subcategory.edit', $subcategory->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-sm fa-edit"></i></a>
                                <a href="subcategory/delete/{{$subcategory->id}}" class="btn btn-sm btn-danger delete-confirm"><i class="fa fa-sm fa-trash"></i></a>
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

