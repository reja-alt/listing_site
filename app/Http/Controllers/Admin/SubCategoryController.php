<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Subcategory;
use App\Models\Admin\Category;
use Validator;
use Str;


class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories=Subcategory::all();
        return view('admin.subcategories.index',compact('subcategories'));
    }

    public function create()
    {
       $categories=Category::all();
       return view('admin.subcategories.create',compact('categories'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $data= new Subcategory();
        $slug = Str::of($request->name)->slug('-');
        $data->category_id= $request->cat_name;
        $data->name= $request->name;
        $data->slug= $slug;
        $data->status= $request->status;
        $data->save();
        $notification=array(
            'message'=>'Successfully Created',
            'alert-type'=>'success'
    );
        return redirect('/admin/home/subcategory')->with('success', 'Contact saved!')->with($notification);
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $notification=array(
            'message'=>'Successfully Deleted',
            'alert-type'=>'success'
        );
        $subcategory=Subcategory::findOrfail($id);
        $categories= Category::all();
        return view('admin.subcategories.edit',compact('subcategory','categories'))->with($notification);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $data= Subcategory::findOrfail($id);
        $slug = Str::of($request->name)->slug('-');
        $data->category_id= $request->cat_name;
        $data->name= $request->name;
        $data->slug= $slug;
        $data->status= $request->status;
        $data->save();

        $notification=array(
            'message'=>'Successfully Updated',
            'alert-type'=>'success'
    );
        return redirect('/admin/home/subcategory')->with($notification);
    }
    public function destroy($id)
    {
        $notification=array(
            'message'=>'Successfully Deleted',
            'alert-type'=>'success'
        );
        $user=Subcategory::findOrFail($id);
        $user->delete();
        return redirect()->route('subcategory.index')->with($notification);
    
    }
}
