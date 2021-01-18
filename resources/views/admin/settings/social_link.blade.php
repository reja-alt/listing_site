@extends('layouts.admin_layout')
@section('content')
<div class="container p-10">
    <div class="card">
        <div class="card-body"> 
            <h1>Social Links</h1> 
            <form action="{{ route('social_link.store') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="form-group">
                            <label class="control-label" for="facebook">Facebook<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="facebook" id="facebook" value="{{old('facebook')}}" placeholder="Facebook"/> 
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="youtube">Youtube<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="youtube" id="youtube" value="{{old('facebook')}}" placeholder="Facebook"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="twitter">Twitter<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="twitter" id="twitter" placeholder="Twitter" value="{{old('twitter')}}"/>
                        </div>
                        </div>
                    <div class="col-md-6 mx-auto">
                    
                        <div class="form-group">
                            <label class="control-label" for="linkedin">Linkedin <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="linkedin" id="linkedin"  placeholder="Linkedin" value="{{old('linkedin')}}"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="pinterest" >Pinterest<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="pinterest" placeholder="Pinterest " id="pinterest" value="{{old('pinterest')}}"/>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="instagram">instagram <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="instagram" placeholder="Instagram" id="instagram" value="{{old('instagram')}}"/>
                        </div>

                        <div class="model footer">
                            <button class="btn btn-success btn-uppercase" type="submit"> <i class="ti-check-box mr-2"></i>Save</button>
                            &nbsp;&nbsp;&nbsp;
                            <a class="btn btn-danger btn-square btn-uppercase" href="{{ route('social_link.create') }}"><i class="ti-trash mr-2"></i>Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
