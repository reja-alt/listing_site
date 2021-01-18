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
                        <label class="control-label">category Name</label>
                            <select name="category_name" id="category_name" class="form-control">
                                <option disabled selected>-----Select-----</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}
                                    </option>
                                @endforeach
                            </select>
                    </div> 
                    <div class="form-group">
                        <label class="control-label" for="title">Blog Title  <span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control " type="text" name="title" id="title" value="{{old('title_bn')}}"/>
                    </div>
                    <div id="form-group">
                        <label class="control-label" for="details">Post Details  <span class="m-l-5 text-danger"> *</span></label>
                        <textarea class="form-control" id="summernote" name="details" ></textarea>
                    </div><br>
 
                </div>
                <div class="col-md-6 col-sm-6 mx-auto">
                    <div class="form-group">
                        <label class="control-label">Subcategory Name</label>
                            <select name="subcategory_name" class="form-control">
                                <option disabled selected>-----Select-----</option>
                                @foreach($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}">{{$subcategory->name}}
                                    </option>
                                @endforeach
                            </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="tags"> Tags <span class="m-l-5 text-danger"> *</span></label>
                        <input type="text" class="form-control" name="tags" placeholder="Tags" value="">
                    </div>
                    
                    <div class="form-group label-floating" >
                        <label class="control-label">Status</label>
                        <select id="status" name="status"  class="form-control" full-width>
                                <option value="1">Active </option>
                                <option value="0">Inactive </option>
                        </select>
                    </div>

                    <div class="custom-file mt-7">
                        <input type="file" class="custom-file-input"  id="customImage" name="image">
                        <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
                    </div><br><br>
                   
                    <div class="form-group label-floating mt-3">
                        <label class="control-label">Thumbnail</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="thumbnail_select" id="thumbnail_select" value="1">
                                <label class="form-check-label" for="thumbnail_select">Big Thumbnail</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="thumbnail_select" id="thumbnail_select" value="0">
                                <label class="form-check-label" for="inlineRadio2">Small Thumbnail</label>
                            </div>
                    </div>
                     <div class="tile-footer">
                        <button class="btn btn-sm btn-success btn-uppercase" type="submit"><i class="fa fa-fw fa-sm fa-check-circle"></i>Save</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-sm btn-danger btn-square btn-uppercase" href="{{ route('blog.index') }}"><i class="fa fa-fw fa-sm fa-times-circle"></i>Cancel</a>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection


