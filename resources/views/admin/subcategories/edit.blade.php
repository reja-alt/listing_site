@extends('layouts.admin_layout')
@section('content')
<div class="container p-10">
    <div class="card">
        <div class="card-body">
            <h1>Edit Subcategory</h1> 
            <form action="{{ route('subcategory.update',$subcategory->id) }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif 
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="form-group">
                            <label class="control-label">category Name</label>
                                <select name="cat_name" class="form-control">
                                    @foreach($categories as $category)
                                        @if($category->id == $subcategory->category_id)
                                            <option value="{{$category->id}}">{{$category->name}} 
                                            </option>
                                        @else
                                            <option value="{{$category->id}}">{{$category->name }} 
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                        </div>
                        
                        <div class="form-group label-floating">
                            <label class="control-label">Status</label>
                                <select id="status" name="status" required class="form-control">
                                    <option value="1" @if($subcategory->status == 1) selected @endif>Active </option>
                                    <option value="0" @if($subcategory->status == 0) selected @endif >Inactive </option>
                                </select>
                        </div>

                        <div class="tile-footer">
                            <button class="btn btn-sm btn-success btn-uppercase" type="submit"><i class="fa fa-fw fa-sm fa-check-circle"></i>Save</button>
                            &nbsp;&nbsp;&nbsp;
                            <a class="btn btn-sm btn-danger btn-square btn-uppercase" href="{{ route('subcategory.index') }}"><i class="fa fa-fw fa-sm fa-times-circle"></i>Cancel</a>
                        </div>
                    </div>
            
                    <div class="col-md-6 mx-auto">
                        <div class="form-group">
                            <label class="control-label" for="name"> Subcategory Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control" type="text" name="name" id="name" value="{{$subcategory->name }}"/>
                        </div> 
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

