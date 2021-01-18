@extends('layouts.admin_layout')

@push('styles')
@endpush
@section('content')
    <div class="container P-10">
        <div class="card">
            <div class="card-body">
                <h1 style="margin-bottom: -25px">All Categories</h1> 
                <a href="{{ route('category.create') }}" class="btn btn-sm btn-outline-success float-right"><i class="fa fa-sm fa-plus"></i>Add Category</a>
            </div>
        </div>
        <div class="card" >
            <div class="card-body">    
                <table id="myTable" class="table table-striped table-bordered" >
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category Name</th>
                            <th>Category Slug</th>
                            <th>Icon</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td><img src="{{url('uploads/blog/'.$category->icon)}}"  class="image" style="height: 50px; width: 50px;"></td>
                        <td>
                            @if($category->status == 1) 
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
                            <a href="{{route('category.edit',$category->id)}}" class="btn btn-sm btn-success " id="edit-category" ><i class="fa fa-sm fa-edit"></i></a>
                                
                            <a href="category/delete/{{$category->id}}" class="btn btn-sm btn-danger delete-confirm"><i class="fa fa-sm fa-trash"></i></a>
                            @if(Session::has('messege'))
                                    Toastr::success('Successfully Registered','Success');
                            @endif
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
