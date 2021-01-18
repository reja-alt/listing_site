@extends('layouts.admin_layout')
@section('content')
<div class="container p-20">
    <div class="card">
        <div class="card-body"> 
            <h1>Edit Division</h1>
            <form action="{{ route('division.update',$division->id) }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-10 mx-auto">
                    <div class="form-group">
                        <label class="control-label" for="bangla_name">Divisin Bangla Name <span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control" type="text" name="name_bn" id="name_bn" value="{{ $division->name_bn }}"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="english_name">Divisin English Name <span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control" type="text" name="name_en" id="name_en" value="{{ $division->name_en }}"/>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-sm btn-success btn-uppercase" type="submit"><i class="fa fa-fw fa-sm fa-check-circle"></i>Save</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-sm btn-danger btn-square btn-uppercase" href="{{ route('division.index') }}"><i class="fa fa-fw fa-sm fa-times-circle"></i>Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

