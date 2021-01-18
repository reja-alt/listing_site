@extends('layouts.admin_layout')
@push('styles')
@endpush
@section('content')
<div class="container p-10">
    <div class="card">
        <div class="card-body">
            <h1 style="margin-bottom: -25px">All Faqs</h1> 
            <a href="{{ route('faq.create') }}" class="btn btn-sm btn-outline-success float-right"><i class="fa fa-sm fa-plus"></i>Add Faq</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="myTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th >Name</th>
                        <th >Question</th>
                        <th >Answer</th>
                        <th >Status</th>
                        <th >Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($faqs as $faq)
                    <tr>
                        <td>{{ $faq->id }}</td>
                        <td>{{ $faq->category->name }}</td>
                        <td>{{ $faq->question }}</td>
                        <td>{{ $faq->answer }}</td>
                        <td>
                            @if($faq->status == 1) 
                            <span class="switch switch-outline switch-icon switch-success">
                                <label>
                                    <input type="checkbox" checked="checked" name="status" class="select" value="1">
                                    <span></span>
                                </label>
                            </span>
                            @else
                            <span class="switch switch-outline switch-icon switch-success" >
                                <label>
                                    <input type="checkbox"  name="status" class="select" value="0"  >
                                    <span></span>
                                </label>
                            </span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="btn-group" role="group" aria-label="Second group">
                                <a href="{{ route('faq.edit', $faq->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-sm fa-edit"></i></a>
                                <a href="faq/delete/{{$faq->id}}" class="btn btn-sm btn-danger delete-confirm"><i class="fa fa-sm fa-trash"></i></a>
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


