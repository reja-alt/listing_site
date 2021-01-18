<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Advertisement;
use Image;
use Carbon\Carbon;
use Str;
use DB;


class AdvertisementController extends Controller
{
    
    public function index()
    {
        $advertises=DB::table('advertisements')->get();
        return view('admin.advertisements.index',compact('advertises'));
    }

    public function create()
    {
        return view('admin.advertisements.create');
    }

    public function store(Request $request)
    {
        $image = $request->file('ads_image');
       
        if(isset($image))
        {

            $currentDate = Carbon::now()->toDateString();
            $imageName  = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!file_exists('uploads/post'))
            {
                mkdir('uploads/post',0777,true);
            }
            Image::make($image)->resize(900, 100)->save('uploads/post/'.$imageName);

        } else {
            $imageName = "default.png";
        }
        $advertises=new Advertisement();
        $advertises->ads_type=$request->ads_type;
        $advertises->ads_code=$request->ads_code;
        $advertises->ads_image= $imageName;
        $advertises->ads_link=$request->ads_link;
        $advertises->ads_status=$request->status;
        $advertises->save();

        $notification=[
            'message'=>'Created Successfully',
            'alert-type'=>'success',
        ];

        return redirect()->route('advertisement.index')->with($notification);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $advertise=DB::table('advertisements')->where('id',$id)->first();
        return view('admin.advertisements.edit',compact('advertise'));
    }

    public function update(Request $request, $id)
    {
        $image = $request->file('ads_image');
       
        if(isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!file_exists('uploads/post'))
            {
                mkdir('uploads/post',0777,true);
            }
            Image::make($image)->resize(900, 100)->save('uploads/post/'.$imageName);

        } else {
            $imageName = "default.png";
        }
        $advertise=Advertisement::findOrFail($id);
        $advertise->ads_type=$request->ads_type;
        $advertise->ads_code=$request->ads_code;
        $advertise->ads_image= $imageName;
        $advertise->ads_link=$request->ads_link;
        $advertise->ads_status=$request->status;
        $advertise->save();

        $notification=[
            'message'=>'Created Successfully',
            'alert-type'=>'success',
        ];

        return redirect('/advertisement')->with($notification);
    }


    public function destroy($id)
    {
        DB::table('advertisements')->where('id',$id)->delete();
        $notification=array(
            'message'=>'Successfully Deleted',
            'alert-type'=>'success'
        );
     
        return redirect()->route('advertisement.index')->with($notification);
    }
}
