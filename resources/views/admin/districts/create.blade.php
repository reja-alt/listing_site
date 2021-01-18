@extends('layouts.admin_layout')
@section('content')
<div class="container p-10">
    <div class="card">
        <div class="card-body">  
            <h1>Add District</h1> 
            <form action="{{ route('district.store') }}" method="POST" role="form" enctype="multipart/form-data">
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
                <div class="col-md-6 mx-auto">
                    <div class="form-group">
                        <label class="control-label" for="english_name">Division Name <span class="m-l-5 text-danger"> *</span></label>
                        <select name="div_name" class="form-control">
                            <option disabled selected>-----Select-----</option>
                                @foreach($divisions as $division)
                                <option value="{{$division->id}}">{{$division->name}} </option>
                                @endforeach
                        </select>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-success btn-uppercase" type="submit">
                            <i class="fa fa-fw fa-sm fa-check-circle"></i>Save
                        </button>
                            &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-danger btn-square btn-uppercase" href="{{ route('district.index') }}"><i class="fa fa-fw fa-sm fa-times-circle"></i>Cancel</a>
                    </div>
                </div>

                <div class="col-md-6 mx-auto">
                    <div class="form-group">
                        <label class="control-label" for="name">District Bangla Name <span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}"/>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

