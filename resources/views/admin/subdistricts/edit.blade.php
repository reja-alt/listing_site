@extends('layouts.admin_layout')
@section('content')
<div class="container p-10">
    <div class="card">
        <div class="card-body">  
            <h1>Edit Subdistrict</h1>
            <form action="{{ route('subdistrict.update',$subdistrict->id) }}" method="POST" role="form" enctype="multipart/form-data">
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
                                <select name="div_name" id="div_name" class="form-control">
                                    <option disabled selected>-----Select-----</option>
                                    @foreach($divisions as $division)
                                    @if($division->id == $subdistrict->div_id  )
                                    <option  value="{{$division->id}}" selected>{{$division->name}}
                                    </option>
                                    @else
                                    <option value="{{$division->id}}">{{$division->name}} 
                                    </option>
                                    @endif
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="dis_name">District Name <span class="m-l-5 text-danger"> *</span></label>
                                <select name="dis_name" id="dis_name" class="form-control">
                                
                                    @foreach($districts as $district)
                                    @if($district->id == $subdistrict->district_id  )
                                    <option value="{{$district->id}}" selected>{{$district->name}} </option>
                                    @else
                                    <option value="{{$district->id}}">{{$district->name}} </option>
                                    @endif
                                    @endforeach
                                </select>
                        </div>
                        <div class="tile-footer">
                            <button class="btn btn-sm btn-success btn-uppercase" type="submit"><i class="fa fa-fw fa-sm fa-check-circle"></i>Save</button>
                            &nbsp;&nbsp;&nbsp;
                            <a class="btn btn-sm btn-danger btn-square btn-uppercase" href="{{ route('subdistrict.index') }}"><i class="fa fa-fw fa-sm fa-times-circle"></i>Cancel</a>
                        </div>
                    </div>
                    <div class="col-md-6 mx-auto">
                        <div class="form-group">
                            <label class="control-label" for="subdis_name">Subdistrict Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control" type="text" name="subdis_name" id="subdis_name" value="{{ $subdistrict->subdis_name }}"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $("#div_name").change(function(){
    var id = $(this).val();
    var token = $("input[name='_token']").val();
  
    $.ajax({
        url: "{{ route('filter.edit') }}",
        method: 'POST',
        data: {id:id, _token:token},
        success: function(data) {
            //   alert(data.options);
            $("select[name='dis_name'").html('');
            $("select[name='dis_name'").html(data.options);
        }
    });
});
</script>
@endsection
@push('scripts')

@endpush