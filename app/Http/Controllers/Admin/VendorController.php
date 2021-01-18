<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Image;
use Str;
use Carbon\Carbon;

class VendorController extends Controller
{
    
    public function index()
    {
        $vendors=User::where('is_admin', 3)->get();
        return view('admin.vendors.index',compact('vendors'));
    }
 
    public function create()
    {
        return view('admin.vendors.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'image' => 'mimes:jpeg,png,gif',

        ]);
        $image = $request->file('image');
        $slug = Str::of($request->title)->slug('-');
        if(isset($image))
        {
            
            $imageName  = $slug.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!file_exists('uploads/blog'))
            {
                mkdir('uploads/blog',0777,true);
            }
            Image::make($image)->resize(900, 500)->save('uploads/blog/'.$imageName);

        } else {
            $imageName = "default.png";
           
        }
        $vendors=new User();
        $vendors->name=$request->name;
        $vendors->email=$request->email;
        $vendors->address=$request->address;
        $vendors->image=$imageName;
        $vendors->phone_number=$request->phone_number;
        $vendors->is_admin=$request->is_admin;
        $vendors->password=Hash::make($request->password);
        $vendors->save();

        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
            return redirect()->route('vendor.index')->with($notification);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $vendor=User::FindOrFail($id);
        return view('admin.vendors.edit',compact('vendor'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'image' => 'mimes:jpeg,png,gif',

        ]);
        $image = $request->file('image');
        $slug = Str::of($request->title)->slug('-');
        if(isset($image))
        {
            
            $imageName  = $slug.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!file_exists('uploads/blog'))
            {
                mkdir('uploads/blog',0777,true);
            }
            Image::make($image)->resize(900, 500)->save('uploads/blog/'.$imageName);

        } else {
            $imageName = "default.png";
           
        }
        $vendor=User::FindOrFail($id);
        $vendor->name=$request->name;
        $vendor->email=$request->email;
        $vendor->address=$request->address;
        $vendor->image=$imageName;
        $vendor->phone_number=$request->phone_number;
        $vendor->is_admin=$request->is_admin;
        $vendor->save();

        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
            return redirect()->route('vendor.index')->with($notification);
    }

    public function destroy($id)
    {
        $vendor=User::findOrFail($id);
        $vendor->delete();
        $notification = array(
            'message' => 'Created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('vendor.index')->with($notification);
    }
}
