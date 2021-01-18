<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Division;
use Validator;
use Str;

class DivisionController extends Controller
{
    public function index()
    {
       $divisions=Division::all();
       return view('admin.divisions.index',compact('divisions'));
    }
    public function create()
    {
        return view('admin.divisions.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            
        ]);
        $divisions=new Division();
        $divisions->name=$request->name;
        $divisions->save();
        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
        return redirect('/admin/home/division')->with($notification);

    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $division=Division::findOrFail($id);
        return view('admin.divisions.edit',compact('division'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            
        ]);
        $division=Division::findOrFail($id);
        $division->name=$request->name;
        $division->update();
        
        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
           
       return redirect('admin/home/division')->with($notification);
    }
    public function destroy($id)
    {
        $division=Division::findOrFail($id);
        $division->delete();
        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
        return redirect()->route('division.index')->with($notification);
    }
}
