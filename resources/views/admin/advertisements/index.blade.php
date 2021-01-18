@extends('layouts.admin_layout')

@push('styles')
@endpush
@section('content')
<div class="container p-10">
    <div class="card">
        <div class="card-body">
            <h1 style="margin-bottom: -25px">All Advertises</h1> 
            <a href="{{ route('advertisement.create') }}" class="btn btn-sm btn-outline-success float-right"><i class="fa fa-sm fa-plus"></i>Add Advertise</a>
        </div>
    </div>
      <div class="card">
          <div class="card-body">    
              <table id="myTable" class="table table-striped table-bordered" >
                  <thead>
                      <tr>
                          <th>Id</th>
                          <th>Advertise Type</th>
                          <th>Advertise Code</th>
                          <th>Image</th>
                          <th>Status</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                        @foreach($advertises as $advertise)
                        <tr>
                            <td>{{ $advertise->id }}</td>
                            <td>
                                @if($advertise->ads_type == 1) 
                                    <button type="button" class="btn  btn-sm btn-success"  value="1">Google Ads</button>
                                @elseif($advertise->ads_type == 2) 
                                    <button type="button" class="btn btn-sm btn-primary"  value="2">Vertical Ads</button>
                                @elseif($advertise->ads_type == 3) 
                                    <button type="button" class="btn btn-sm btn-info"  value="2">Horizontal Ads</button>   
                                @endif
                            </td>
                            <td>{{ $advertise->ads_code }}</td>
                            <td><img src="{{url('uploads/post',$advertise->ads_image)}}" style="width: 60px; height: 40px;"   class="ads_image"></td>
                            <td>
                                @if($advertise->ads_status == 1) 
                                    <button type="submit" class="btn btn-sm btn-success" name="changeStatus">Active</button>
                                @else
                                    <button type="submit" class="btn btn-sm btn-danger" name="changeStatus">Inactive</button>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Second group">
                                  <a href="{{route('advertisement.edit',$advertise->id)}}" class="btn btn-sm btn-success" id="edit-Advertise" ><i class="fa fa-sm fa-edit"></i></button>
                                        @if(Session::has('messege'))
                                              Toastr::success('Successfully Registered','Success');
                                        @endif
                                    <a href="advertisement/delete/{{$advertise->id}}" class="btn btn-sm btn-danger delete-confirm"><i class="fa fa-sm fa-trash"></i></a>
                                </div>
                            </td>
                        </tr> 
                        @endforeach
                  </tbody>
              </table>
          </div>
      </div>
</div>
@endsection

