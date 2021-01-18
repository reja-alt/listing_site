<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Seo;

class SeoController extends Controller
{
    public function create()
    {
        return view('admin.settings.seo');
    
    }
    public function store(Request $request)
    {
        $data= new Seo();
        $data->meta_title= $request->meta_title;
        $data->meta_tag= $request->meta_tag;
        $data->meta_description= $request->meta_description;
        $data->meta_author= $request->meta_author;
        $data->google_analytics= $request->google_analytics;
        $data->google_verification= $request->google_verification;
        $data->bing_verification= $request->bing_verification;
        $data->alexa_analytics= $request->alexa_analytics;
        $data->save();
        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
        return redirect()->route('seo.create')->with($notification);

        ;
    }
}
