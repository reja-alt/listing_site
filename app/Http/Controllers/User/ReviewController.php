<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User\Review;
use Auth;

class ReviewController extends Controller
{
    public function show($id)
    {
        return view('frontend.posts.single_post');
    }
    public function store(Request $request)
    {
       
        $profiles=new Review();
        $profiles->name=$request->name;
        $profiles->email=$request->email;
        $profiles->post_id=$request->post_id;
        $profiles->user_id=$request->user_id;
        $profiles->rating=$request->rating;
        $profiles->comment=$request->comment;
        $profiles->save();
        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
            return redirect()->back()->with($notification);
      
    }
}
