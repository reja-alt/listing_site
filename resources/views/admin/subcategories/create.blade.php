@extends('layouts.admin_layout')
@section('content')
<div class="container p-10">
    <div class="card">
        <div class="card-body"> 
            <h1>Add Subcategory</h1> 
            <form action="{{ route('subcategory.store') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
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
                    <div class="col-md-6 col-md-6 mx-auto">
                        <div class="form-group">
                            <label class="control-label">category Name</label>
                                <select name="cat_name" class="form-control">
                                    <option disabled selected>-----Select-----</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}
                                        </option>
                                    @endforeach
                                </select>
                        </div> 
                        
                        <div class="form-group label-floating">
                            <label class="control-label">Status</label>
                                <select id="status" name="status" required class="form-control">
                                    <option value="1">Active </option>
                                    <option value="0">Inactive </option>
                                </select>
                        </div>
                        
                        <div class="tile-footer">
                            <button class="btn btn-sm btn-success btn-uppercase" type="submit"><i class="fa fa-fw fa-sm fa-check-circle"></i>Save</button>
                            &nbsp;&nbsp;&nbsp;
                            <a class="btn btn-sm btn-danger btn-square btn-uppercase" href="{{ route('subcategory.index') }}"><i class="fa fa-fw fa-sm fa-times-circle"></i>Cancel</a>
                        </div>
                    </div>

                    <div class="col-md-6 col-md-6 mx-auto">
                        <div class="form-group">
                            <label class="control-label" for="name">Subcategory English Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

