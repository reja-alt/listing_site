<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Division;
use App\Models\Admin\District;
use App\Models\Admin\Subdistrict;
use Validator;
use Str;

class DistrictController extends Controller
{
    public function index()
    {
        $districts=District::all();
        return view('admin.districts.index',compact('districts'));
    }

    
    public function create()
    {
        $divisions=Division::all();
        return view('admin.districts.create',compact('divisions'));
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'div_name' => 'required',
        ]);
        $districts=new District();
        $districts->div_id=$request->div_name;
        $districts->name=$request->name;
        $districts->save();
        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
        return redirect('admin/home/district')->with($notification);
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $districts=District::findOrFail($id);
        $divisions=Division::all();
        return view('admin.districts.edit',compact('districts','divisions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'div_name' => 'required',
        ]);
        $districts=District::findOrFail($id);
        $districts->div_id=$request->div_name;
        $districts->name=$request->name;
        
        $districts->update();
        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
        return redirect('admin/home/district')->with($notification);
    }

   
    public function destroy($id)
    {
        $district=District::findOrFail($id);
        $district->delete();
        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
        return redirect()->route('district.index')->with($notification);
    }
}
