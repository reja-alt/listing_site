<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Division;
use App\Models\Admin\District;
use App\Models\Admin\Subdistrict;


class SubDistrictController extends Controller
{
    public function index()
    {
        $subdistricts=Subdistrict::all();
        return view('admin.subdistricts.index',compact('subdistricts'));
    }
    public function create()
    {
        $divisions=Division::all();
        $districts=District::all();
        return view('admin.subdistricts.create',compact('divisions','districts'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'subdis_name' => 'required',
            'div_name' => 'required',
        ]);
        $subdistricts=new Subdistrict();
        $subdistricts->div_id=$request->div_name;
        $subdistricts->district_id=$request->dis_name;
        $subdistricts->subdis_name=$request->subdis_name;
        $subdistricts->save();
        $notification = array(
            'message' => 'Created successfully!',
            'alert-type' => 'success'
        );
        return redirect('admin/home/subdistrict')->with($notification);
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $subdistrict=Subdistrict::findOrFail($id);
        $divisions=Division::all();
        $districts=District::where('div_id',$subdistrict->div_id)->get();

        
        return view('admin.subdistricts.edit',compact('subdistrict','divisions','districts'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'subdis_name' => 'required',
            'div_name' => 'required',
        ]);
        $subdistrict=Subdistrict::findOrFail($id);
        $subdistrict->div_id=$request->div_name;
        $subdistrict->district_id=$request->dis_name;
        $subdistrict->subdis_name=$request->subdis_name;
        $subdistrict->save();
        $notification = array(
            'message' => 'Created successfully!',
            'alert-type' => 'success'
        );
        return redirect('admin/home/subdistrict')->with( $notification);
    }
    public function destroy($id)
    {
        $users=Subdistrict::findOrFail($id);
        $users->delete();
        $notification = array(
            'message' => 'Created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('subdistrict.index')->with($notification);
    }

    public function filterdistrict(Request $request){
        if($request->ajax())
        {
            $get_data = District::where('div_id',$request->id)->get();
            $data = view('admin.subdistricts.select-ajax',compact('get_data'))->render();
            return response()->json(['options'=>$data]);
        }
    }

    public function filterdistrict_edit(Request $request){
        if($request->ajax())
        {
            $get_data = District::where('div_id',$request->id)->get();
            $data = view('admin.subdistricts.select-ajax',compact('get_data'))->render();
            return response()->json(['options'=>$data]);
        }
    
    }

}