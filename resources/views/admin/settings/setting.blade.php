@extends('layouts.admin_layout')

@section('content')
<div class="container p-10">
    <div class="card">
        <div class="card-body"> 
            <h1>Settings</h1> 
            <form action="{{ route('setting.store') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="form-group">
                            <label class="control-label" for="autherity_name">Autherity Bangla Name<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="autherity_name" id="autherity_name" value="{{old('autherity_name')}}" placeholder="Autherity Bangla Name"/>
                        </div>
                
                        <div class="form-group">
                            <label class="control-label" for="title">Website Bangla Title<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="title" id="title" value="{{old('title')}}" placeholder="Facebook Page"/>
                        </div> 

                        <div class="form-group">
                            <label class="control-label" for="facrbook_page">Facebook Page<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="facebook_page" id="facebook_page" value="{{old('facebook_page')}}" placeholder="Facebook Page"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="youtube_channel"> Youtube Channel<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="youtube_channel" id="youtube_channel" placeholder="Facebook Page" value="{{old('youtube_channel')}}"/> 
                        </div>
                    </div>
                    <div class="col-md-6 mx-auto">
                        <div class="form-group">
                            <label class="control-label" for="address">Address <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="address" id="address"  placeholder="Address" value="{{old('address')}}"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="phone_number" >Phone Number<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="phone_number" placeholder="Phone Number" id="phone_number" value="{{old('phone_number')}}"/>
                        </div>
                        
                        <div class="input-group mt-9">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input"  id="customImage" name="frontend_logo">
                                <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
                            </div>
                        </div>
                        <div class="input-group mt-9">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input"  id="customImage" name="backend_logo">
                                <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
                            </div>
                        </div>
                        {{-- <div class="custom-file mt-7"> 
                            <label class="custom-file-label" for="customFile">Fab Icon</label>
                            <input type="file" class="custom-file-input" id="customImage" name="fab_icon">
                        </div>
                         --}}
    
                        

                        <div class="form-group mt-8">
                            <label class="control-label" for="email_address">Email Address <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="email_address" placeholder="Email Address" id="email_address" value="{{old('email_address')}}"/>
                        </div>

                        <div class="model footer">
                            <button class="btn btn-success btn-uppercase" type="submit"> <i class="ti-check-box mr-2"></i>Save</button>
                            &nbsp;&nbsp;&nbsp;
                            <a class="btn btn-danger btn-square btn-uppercase" href="{{ route('setting.create') }}"><i class="ti-trash mr-2"></i>Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $("input.tagsinput-example").tagsinput('items');
</script>
@endsection
