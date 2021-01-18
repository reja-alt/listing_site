<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Image;

class ProfileController extends Controller
{
    public function create()
    {
        return view('user.profile.create');
    }
    public function store(Request $request)
    {
        $image = $request->file('image');
        if(isset($image))
        {
            
            $imageName  = uniqid().'.'.$image->getClientOriginalExtension();

            if (!file_exists('uploads/blog'))
            {
                mkdir('uploads/blog',0777,true);
            }
            Image::make($image)->resize(900, 500)->save('uploads/blog/'.$imageName);

        } else {
            $imageName = "default.png";
        }
        $profiles=new User();
        $profiles->name=$request->name;
        $profiles->email=$request->email;
        $profiles->password= Hash::make($request['password']);
        $profiles->image=$imageName;
        $profiles->save();
        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
            return redirect()->route('profile.create')->with($notification);
      
    }
}
