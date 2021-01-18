<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\SocialPage;

class SocialPageController extends Controller
{
    public function create()
    {
       return view('admin.settings.social_page');
    }
    public function store(Request $request)
    {
        $data= new SocialPage();
        $data->facebook_page= $request->facebook_page;
        $data->facebook_status= $request->fb_status;
        $data->youtube_page= $request->youtube_page;
        $data->youtube_status= $request->yt_status;
     
        $data->save();
        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
        return redirect()->route('social_page.create')->with($notification);
    }
}
