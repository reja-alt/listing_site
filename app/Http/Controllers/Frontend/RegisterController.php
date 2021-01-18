<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class RegisterController extends Controller
{
    public function register()
    {

        return view('frontend.register');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'image' => 'mimes:jpeg,png,gif',

        ]);
       
        $vendors=new User();
        $vendors->name=$request->name;
        $vendors->email=$request->email;
        // $vendors->image=$imageName;
        $vendors->phone_number=$request->phone_number;
        $vendors->password=Hash::make($request->password);
        $vendors->save();

        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );

        return redirect()->route('home')->with($notification);
    }
  

}
