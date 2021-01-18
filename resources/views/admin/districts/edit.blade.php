@extends('layouts.admin_layout')
@section('content')
<div class="container p-20">
    <div class="card">
        <div class="card-body">  
            <h1>Edit District</h1>
            <form action="{{ route('district.update',$districts->id)}}" method="POST" role="form" enctype="multipart/form-data">
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
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="form-group">
                            <label class="control-label" for="english_name">Division Bangla Name <span class="m-l-5 text-danger"> *</span></label>
                            <select name="div_name" class="form-control" >
                                @foreach($divisions as $division)
                                @if($division->id == $districts->div_id)
                                    <option value="{{$division->id}}" selected>{{$division->name}} </option>
                                @else
                                <option value="{{$division->id}}">{{$division->name}} </option>
                                @endif
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
                            <label class="control-label" for="name">District Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ $districts->name }}"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

