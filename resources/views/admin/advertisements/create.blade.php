@extends('layouts.admin_layout')
@section('content')
<div class="container p-10">
    <div class="card">
        <div class="card-body">  
            <h1>Add Adevertise</h1> 
            <form action="{{ route('advertisement.store') }}" method="POST" role="form" enctype="multipart/form-data">
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
                        <div class="form-group label-floating" id="advertise_type">
                            <label class="control-label">Advertise Type</label>
                            <select name="ads_type" id="ads_type" class="form-control">
                                <option>-----Select-----</option>
                                <option value="1">Google Ads</option>
                                <option value="2">Vertical Ads</option>
                                <option value="3">Horizontal Ads</option>
                            </select>
                        </div>
                        <div class="form-group" id="advertise_code" >
                            <label class="control-label" for="ads_code">Advertise Code <span class="m-l-5 text-danger"> *</span></label>
                            <textarea class="form-control" id="ads_code"  name="ads_code" value="{{ old('ads_code') }}" rows="3"></textarea>
                        </div>
                        <div class="form-group" id="advertise_link" >
                            <label class="control-label" for="ads_link">Advertise Link <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control" type="text" name="ads_link" id="ads_link" value="{{ old('ads_link') }}"/>
                        </div> 
                        <div class="tile-footer mt-5">
                            <button class="btn btn-sm btn-success btn-uppercase" type="submit"><i class="fa fa-fw fa-sm fa-check-circle"></i>Save
                            </button>
                            &nbsp;&nbsp;&nbsp;
                            <a class="btn btn-sm btn-danger btn-square btn-uppercase" href="{{ route('advertisement.index') }}"><i class="fa fa-fw fa-sm fa-times-circle"></i>Cancel</a>
                        </div>
                    </div>  
                    <div class="col-md-6 col-sm-6 mx-auto mt-8">
                        <div class="input-group mb-3" id="hide_image">
                            <div class="custom-file" id="customImage">
                                <span class="input-group-text">Upload</span>
                                    <input type="file" class="custom-file-input"  id="customImage" name="ads_image">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
                                </div>
                        </div>
                        <div class="form-group label-floating mt-7" id="hide_status">
                            <label class="control-label">Status</label>
                            <select id="status" name="status"   class="form-control" >
                                    <option value="1">Active </option>
                                    <option value="0">Inactive </option>
                            </select>
                        </div> 
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#advertise_code').hide();
        $('#advertise_link').hide();
        $('#hide_image').hide();
        $('#hide_status').hide();
        $('#ads_type').on('change', function() {
        var el = $('#advertise_link');
        var e2 = $('#hide_image');
        var e3 = $('#hide_status');
    
        if (this.value === '1') {
            el.hide();
            e2.hide();
            e3.show();
            
        } else {
            el.show();
            e2.show();
     
        }
    
        var el = $('#advertise_code');
        
        if (this.value === '2' || this.value === '3') {
            el.hide();
            e2.show();
            e3.show();
               
        } else {
            el.show();
        
          
        }
    
        });
       
    
    });
    </script>
@endsection
