@extends('layouts.admin_layout')


@section('content')
<div class="container p-10">
    <div class="card">
        <div class="card-body">
            <h1>Social Page</h1>
            <form action="{{ route('social_page.store') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="form-group">
                            <label class="control-label" for="facebook_page">Facebook Page<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="facebook_page" id="facebook_page" value="{{old('facebook_page')}}" placeholder="Facebook"/>
                        </div>

                        <div class="form-group label-floating">
                            <label class="control-label">Status</label>
                            <select id="fb_status" name="fb_status"   class="form-control" >
                                <option value="1">Active </option>
                                <option value="0">Inactive </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mx-auto">
                        <div class="form-group">
                            <label class="control-label" for="youtube_page">Youtube Page<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control " type="text" name="youtube_page" id="youtube_page" placeholder="Twitter" value="{{old('youtube_page')}}"/>
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Status</label>
                                <select id="yt_status" name="yt_status"   class="form-control" >
                                    <option value="1">Active </option>
                                    <option value="0">Inactive </option>
                                </select>
                        </div>
            
                        <div class="model footer">
                                <button class="btn btn-success btn-uppercase" type="submit"> <i class="ti-check-box mr-2"></i>Save</button>
                                &nbsp;&nbsp;&nbsp;
                                <a class="btn btn-danger btn-square btn-uppercase" href="{{ route('social_page.create') }}"><i class="ti-trash mr-2"></i>Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
