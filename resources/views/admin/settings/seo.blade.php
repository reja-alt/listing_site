@extends('layouts.admin_layout')
@section('content')
<div class="container p-10">
    <div class="card">
        <div class="card-body">
            <h1>Seos</h1> 
            <form action="{{ route('seo.store') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="form-group">
                            <label class="control-label" for="meta_title">Meta Title<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="meta_title" id="meta_title" value="{{old('meta_title')}}" placeholder="Meta Title"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="meta_tag">Meta Tag<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="meta_tag" id="meta_tag" placeholder="Meta Tag" value="{{old('meta_tag')}}"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="meta_description">Meta Description<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="meta_description" id="meta_description"  placeholder="Meta Description" value="{{old('meta_description')}}"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="meta_author" >Meta Author<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="meta_author" placeholder="Meta Author" id="meta_author" value="{{old('meta_author')}}"/>
                        </div>
                    </div>

                    <div class="col-md-6 mx-auto">
                        <div class="form-group">
                            <label class="control-label" for="google_analytics" >Google Analytics<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="google_analytics" placeholder="Google Analytics " id="google_analytics" value="{{old('google_analytics')}}"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="google_verification">Google Verification<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="google_verification" placeholder="Google Verification" id="google_verification" value="{{old('google_verification')}}"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="bing_verification">Bing Verification<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="bing_verification" placeholder="Bing Verification" id="bing_verification" value="{{old('bing_verification')}}"/>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="alexa_analytics">Alexa Analytics<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="alexa_analytics" placeholder="Alexa Analytics" id="alexa_analytics" value="{{old('alexa_analytics')}}"/>
                        </div>

                        <div class="model footer">
                            <button class="btn btn-success btn-uppercase" type="submit"> <i class="ti-check-box mr-2"></i>Save</button>
                            &nbsp;&nbsp;&nbsp;
                            <a class="btn btn-danger btn-square btn-uppercase" href="{{ route('seo.create') }}"><i class="ti-trash mr-2"></i>Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

