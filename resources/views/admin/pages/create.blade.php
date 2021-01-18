@extends('layouts.admin_layout')
@section('content')
<div class="container p-10">
    <div class="card">
        <div class="card-body">  
            <h1>Add Category</h1>  
            <form action="{{ route('blog.store') }}" method="POST" role="form" enctype="multipart/form-data">
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
                <div class="col-md-6 col-sm-6 mx-auto">
                    <div class="form-group">
                        <label class="control-label" for="name">Page name  <span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control " type="text" name="name" id="name" value="{{old('name')}}"/>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="title">Page Title  <span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control " type="text" name="title" id="title" value="{{old('title')}}"/>
                    </div>

                    <div id="form-group">
                        <label class="control-label" for="details">Page Details  <span class="m-l-5 text-danger"> *</span></label>
                        <textarea class="form-control" id="summernote" name="details" ></textarea>
                    </div><br>

                    <div class="form-group">
                        <label class="control-label" for="page_link">Page Link  <span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control " type="text" name="page_link" id="page_link" value="{{old('page_link')}}"/>
                    </div>
                    
 
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">Customize</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="type" value="3">
                            <label class="form-check-label" for="thumbnail_select">Open the link in new window</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="type" value="2">
                            <label class="form-check-label" for="inlineRadio2">Exclude from footer</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="type" value="1">
                            <label class="form-check-label" for="inlineRadio2">Active</label>
                        </div>
                </div>
                <div class="col-md-6 col-sm-6 mx-auto">
                    <div class="form-group label-floating" >
                        <label class="control-label">Type</label>
                        <select id="status" name="status"  class="form-control" full-width>
                                <option value="1">Active </option>
                                <option value="0">Inactive </option>
                        </select>
                    </div>
                   
                    <div class="form-group label-floating" >
                        <label class="control-label">Type</label>
                        <select id="status" name="status"  class="form-control" full-width>
                                <option value="1">Standard </option>
                                <option value="2">Terms </option>
                                <option value="3">Privacy </option>
                                <option value="4">TIPS </option>
                        </select>
                    </div>

                    <div class="col-10">
                        <input class="form-control" type="color" value="#563d7c" id="example-color-input">
                    </div>

                    <div class="col-10">
                        <input class="form-control" type="color" value="#563d7c" id="example-color-input">
                    </div>

                    <div class="custom-file mt-7">
                        <input type="file" class="custom-file-input"  id="customImage" name="image">
                        <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
                    </div><br><br>
                   
                  
                     <div class="tile-footer">
                        <button class="btn btn-sm btn-success btn-uppercase" type="submit"><i class="fa fa-fw fa-sm fa-check-circle"></i>Save</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-sm btn-danger btn-square btn-uppercase" href="{{ route('page.create') }}"><i class="fa fa-fw fa-sm fa-times-circle"></i>Cancel</a>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection


