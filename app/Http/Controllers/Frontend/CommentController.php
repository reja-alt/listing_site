<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontend\Comment;


class CommentController extends Controller
{
    // public function show($id)
    // {
    //     return view('frontend.blogs.single-blog');
    // }
    public function store(Request $request)
    {
        $comments=new Comment();
        $comments->name=$request->name;
        $comments->email=$request->email;
        $comments->website=$request->website;
        $comments->blog_id=$request->blog_id;
        $comments->user_id=$request->user_id;
        $comments->comment=$request->comment;
        $comments->save();

        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
            return redirect()->route('single.blog')->with($notification);
   
    }
}
