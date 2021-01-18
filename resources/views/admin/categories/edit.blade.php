@extends('layouts.admin_layout')
@section('content')
<div class="container p-10">
    <div class="card">
        <div class="card-body">  
            <h1>Edit Category</h1>  
            <div class="row">
                <div class="col-md-6 col-sm-6 mx-auto">
                    <form action="{{ route('category.update',$category->id) }}" method="POST" role="form" enctype="multipart/form-data">
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
                    <div class="form-group">
                        <label class="control-label" for="name">Category Name <span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control " type="text" name="name" id="nam" value="{{ $category->name}}"/>
                    </div>

                    <div class="form-group label-floating">
                        <label class="control-label">Show On Header</label>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="show_on_header" name="show_on_header" value="1" @if($category->show_on_header == 1) checked @endif>
                                <label class="form-check-label" for="headline">Show On Header</label>
                            </div>
                    </div>
                    <div class="custom-file mt-7">
                        <input type="file" class="custom-file-input"  id="customImage" name="image">
                        <label class="custom-file-label" for="inputGroupFile01">{{ $category->icon}}</label>
                    </div><br><br>
                    <div class="tile-footer">
                        <button class="btn btn-sm btn-success btn-uppercase" type="submit"><i class="fa fa-fw fa-sm fa-check-circle"></i>Save</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-sm btn-danger btn-square btn-uppercase" href="{{ route('category.index') }}"><i class="fa fa-fw fa-sm fa-times-circle"></i>Cancel</a>
                    </div> 
                </div>
                <div class="col-md-6 col-sm-6 mx-auto">
                    <div class="form-group label-floating" >
                        <label class="control-label">Status</label>
                        <select id="status" name="status"  class="form-control" full-width>
                            <option value="1" @if($category->status == 1) selected @endif>Active </option>
                            <option value="0" @if($category->status == 0) selected @endif>Inactive </option>
                        </select>
                    </div>
                </div>
            </div>
                    </form>
        </div>
    </div>
</div>
@endsection

