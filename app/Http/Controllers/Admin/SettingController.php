<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Setting;
use Image;
use Str;
use Carbon\Carbon;

class SettingController extends Controller
{
    public function create()
    {
        return view('admin.settings.setting');
    }

    public function store(Request $request)
    {
        $image = $request->file('frontend_logo');
       
        if(isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $frontend_imageName  = $currentDate.'-'.$image->getClientOriginalExtension();

            if (!file_exists('uploads/post'))
            {
                mkdir('uploads/post',0777,true);
            }

            Image::make($image)->resize(170, 50)->save('uploads/post/'.$frontend_imageName);

        } else {
            $frontend_imageName = "default.png";
        }
        
        
        $image = $request->file('backend_logo');
       
        if(isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $backend_imageName  = $currentDate.'-'.$image->getClientOriginalExtension();

            if (!file_exists('uploads/post'))
            {
                mkdir('uploads/post',0777,true);
            }

            Image::make($image)->resize(170, 50)->save('uploads/post/'.$backend_imageName);

        } else {
            $backend_imageName = "default.png";
        }

        $data= new Setting();
        $data->autherity_name= $request->autherity_name;
        $data->title= $request->title;
        $data->facebook_page= $request->facebook_page;
        $data->youtube_channel= $request->youtube_channel;
        $data->address= $request->address;
        $data->phone_number= $request->phone_number;
        $data->email_address= $request->email_address;
        $data->frontend_logo= $frontend_imageName;
        $data->backend_logo= $backend_imageName;
        // $data->fab_icon= $fab_imageName;
        $data->save();
        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
        return redirect()->route('setting.create')->with($notification);
    }
}
