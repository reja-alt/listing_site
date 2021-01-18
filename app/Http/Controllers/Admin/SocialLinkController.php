<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\SocialLink;

class SocialLinkController extends Controller
{
    public function create()
    {
        
       return view('admin.settings.social_link');
    }
    public function store(Request $request)
    {
        $data= new SocialLink();
        $data->facebook= $request->facebook;
        $data->youtube= $request->youtube;
        $data->twitter= $request->twitter;
        $data->linkedin= $request->linkedin;
        $data->pinterest= $request->pinterest;
        $data->instagram= $request->instagram;
        
        $data->save();
        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
        return redirect()->route('social_link.create')->with($notification);
    }
}
