@extends('layouts.admin_layout')
@push('styles')

@endpush
@section('content')
<div class="container p-10">
<div class="card">
    <div class="card-body">
        <a href="{{ route('blog.create') }}" class="btn btn-outline-success btn-uppercase pull-right" style="float: right;"><i class="ti-plus mr-2"></i>Add Blog Post</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table id="myTable" class="table table-striped table-bordered" >
            <thead>
                <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Post Title  </th>
                <th>Published Date </th>
                <th>Category Name</th>
                <th>Subcategory Name</th>
                <th>Status</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>        
                @foreach($blogs as $blog)
                <tr>
                    <td>{{ $blog->id }}</td>
                    <td> <img src="{{url('uploads/blog/'.$blog->image)}}"  class="image" style="height: 70px; width: 130px;"></td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ \Carbon\Carbon::parse($blog->created_at)->format('j F, Y')}}</td>
                    <td>{{ $blog->category->name }}</td>
                    <td>{{ $blog->subcategory->name }}</td>
                    <td>@if($blog->status == 1)                             
                            <button type="submit" class="btn btn-sm btn-success" name="changeStatus" value="1">Active</button>                                                
                         @else                                                      
                            <button type="submit" class="btn btn-sm btn-danger" name="changeStatus" value="0">Inactive</button>
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="btn-group" role="group" aria-label="Second group">
                            <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-sm fa-edit"></i></a>
                            <a href="blog/delete/{{$blog->id}}" class="btn btn-sm btn-danger delete-confirm"><i class="fa fa-sm fa-trash"></i></a>
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
