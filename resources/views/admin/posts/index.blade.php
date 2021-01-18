@extends('layouts.admin_layout')

@section('content')
<div class="container p-10">
    <div class="card">
        <div class="card-body">
            <h1>All Post</h1>
            <a href="{{ route('post.create') }}" class="btn btn-sm btn-outline-success float-right"><i class="fa fa-sm fa-plus"></i>Add Post</a>
        </div>
    </div>

<div class="card">
    <div class="card-body">
        <table id="myTable" class="table table-striped table-bordered" >
            <thead>
                <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Category Name </th>
                <th>Subcategory Name</th>
                <th>Brand</th>
                <th>Model</th>
                <th>City</th>
                <th>Price</th>
                <th>Title</th>
                <th>Status</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td> <img src="{{url('uploads/blog/'.$post->image)}}"  class="image" style="height: 70px; width: 100px;"></td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->subcategory->name }}</td>
                    <td>{{ $post->brand }}</td>
                    <td>{{ $post->model }}</td>
                    <td>{{ $post->city }}</td>
                    <td>{{ $post->price }}</td>
                    <td>{{ $post->title }}</td>
                    
                    <td>
                        @if($post->status == 1)                            
                            <button type="submit" class="btn btn-sm btn-success" name="changeStatus" value="1">
                                Active
                            </button>                                            
                        @else                                                    
                            <button type="submit" class="btn btn-sm btn-danger" name="changeStatus" value="0">
                                Inactive
                            </button>                                                                         
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="btn-group" role="group" aria-label="Second group">
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-sm fa-edit"></i></a>
                            <a href="post/delete/{{$post->id}}" class="btn btn-sm btn-danger delete-confirm"><i class="fa fa-sm fa-trash"></i></a>
                        </div>
                    </td>
                </tr> 
                @endforeach
                ...
            </tbody>
        </table>
    </div>
</div> 
@endsection

