@extends('layouts.admin_layout')
@section('content')
<div class="container p-10">
    <div class="card">
        <div class="card-body">  
            <h1>Add Vendor</h1>  
            <form action="{{ route('vendor.update',$vendor->id) }}" method="POST" role="form" enctype="multipart/form-data">
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
                    <div class="col-md-6 col-sm-6 mx-auto">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" value="{{ $vendor->name }}" placeholder="Username" required autofocus>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" value="{{ $vendor->email }}"  placeholder="Username or email" required autofocus>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="address" value="{{ $vendor->address }}" placeholder="Address" required autofocus>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 mx-auto">
                        <div class="form-group">
                            <input type="number" class="form-control" name="phone_number" value="{{ $vendor->phone_number }}" placeholder="Phone Number" required autofocus>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input"  id="customImage" name="image">
                            <label class="custom-file-label" for="inputGroupFile01">{{ $vendor->image }}</label>
                        </div>
                        <div class="form-group mt-5">
                            <label class="checkbox checkbox-outline checkbox-success">
                                <input type="checkbox" name="is_admin" value="3" @if($vendor->is_admin == 3) checked @endif>
                                <span></span> confirm
                            </label>
                        </div>
                        <div class="tile-footer">
                            <button class="btn btn-sm btn-success btn-uppercase" type="submit"><i class="fa fa-fw fa-sm fa-check-circle"></i>Save</button>
                            &nbsp;&nbsp;&nbsp;
                            <a class="btn btn-sm btn-danger btn-square btn-uppercase" href="{{ route('vendor.index') }}"><i class="fa fa-fw fa-sm fa-times-circle"></i>Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $("#cat_name").change(function(){
    var id = $(this).val();
    var token = $("input[name='_token']").val();
  
    $.ajax({
        url: "{{ route('filter.subcategory') }}",
        method: 'POST',
        data: {id:id, _token:token},
        success: function(data) {
            //   alert(data.options);
            $("select[name='subcategory_name'").html('');
            $("select[name='subcategory_name'").html(data.options);
        }
    });
});
</script>
@endsection


