@extends('layouts.admin_layout')
@section('content')
<div class="container p-10">
    <div class="card">
        <div class="card-body">
            <h1>Add Post</h1>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('post.store') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf 
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="form-group label-floating">
                            <label class="control-label">Category Bangla Name</label>
                            <select name="category_name" id="category_name" class="form-control">
                                <option disabled selected>-----Select-----</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">
                                        {{$category->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group label-floating">
                            <label class="control-label">Subcategory Name</label>
                            <select name="subcategory_name" class="form-control" id="subcategory_name">
                                <option disabled selected>-----Select-----</option>
                                @foreach($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}">
                                        {{$subcategory->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group label-floating">
                            <label class="control-label">User Name</label>
                            <select name="user_name" class="form-control" >
                                <option>-----Select-----</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">
                                        {{ $user->name }} 
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="brand">Brand<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="brand" id="brand" value="{{old('brand')}}"/>
                        </div>
                    
                        <div class="form-group">
                            <label class="control-label" for="model">Model<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="model" id="model" value="{{old('model')}}"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="city">City<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="city" id="city" value="{{old('city')}}"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="title_bn">Address<span class="m-l-5 text-danger"> *</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="address" placeholder="Enter your address">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-map-marker"></i>
                                    </span>
                                </div>
                            </div>
                            <span class="form-text text-muted">Please enter your address</span>
                        </div>

                        <div class="form-group label-floating">
                            <label class="control-label">Price </label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">                           
                                    <select id="price_type" name="price_type"   class="form-control" required>
                                       
                                            <option value="1">Fixed </option>
                                            <option value="0">Negotiable </option>
                                    </select>
                                </div>
                                <input class="form-control " type="number" name="price" id="price" value="{{old('price')}}"/>
                            </div>
                        </div>

                        <div class="input-group mt-9">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input"  id="customImage" name="image">
                                <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
                            </div>
                        </div>

                </div>
                    <div class="col-md-6 mx-auto">
                        <div class="tile">
                            <div class="form-group">
                                <label class="control-label" for="title">Post Title <span class="m-l-5 text-danger"> *</span></label>
                                <input class="form-control " type="text" name="title" id="title" value="{{old('title')}}"/>
                            </div>

                            <div id="form-group">
                                <label class="control-label" for="description">Post Description<span class="m-l-5 text-danger"> *</span></label>
                                <textarea class="form-control" id="summernote" name="description" ></textarea>
                            </div>

                            <div class="form-group mt-7">
                                <label class="control-label" for="published_date">Published Date<span class="m-l-5 text-danger"> *</span></label>
                                <input class="form-control " type="date" name="published_date" id="published_date" value="{{old('published_date')}}"/>
                            </div>

                             {{-- <div class="col-10">
                                <input class="form-control" type="month" value="2011-08" id="example-month-input">
                            </div> --}}

                            <div class="form-group">
                                <label class="input-label--3sYLB number-label" for="input_model_year">Model year</label>
                                <input class="form-control" type="year" value="2011-08" id="example-month-input" name="model_year">
                            </div> 

                            <div class="form-group label-floating mt-">
                                <label class="control-label">Status</label>
                                <select id="status" name="status"   class="form-control" >
                                    
                                        <option value="1">Active </option>
                                        <option value="0">Inactive </option>
                                </select>
                            </div>
                            
                            <div class="form-group label-floating">
                                <label class="control-label">Condition</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="type" value="1">
                                        <label class="form-check-label" for="thumbnail_select">New</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="type" value="0">
                                        <label class="form-check-label" for="inlineRadio2">Used</label>
                                    </div>
                            </div>
                            <div class="form-group label-floating">
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
                        
                            <div class="model footer">
                                <button class="btn btn-success btn-uppercase" type="submit" > <i class="ti-check-box mr-2"></i>Save</button>
                                &nbsp;&nbsp;&nbsp;
                            <a class="btn btn-danger btn-square btn-uppercase" href="{{ route('post.index') }}"><i class="ti-trash mr-2"></i>Cancel</a>
                            </div>
                        </div>
                    </div>
                    </div>
            </form>
        </div>
    </div>
</div>

@endsection

