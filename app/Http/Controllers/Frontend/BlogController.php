<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Blog;
use App\Models\Admin\Category;

class BlogController extends Controller
{
    public function show($slug)
    {
        $id = Blog::where('slug',$slug)->first()->id;
        $blog=Blog::where('id',$id)->first();
        $count_view=Blog::where('id', $id)->increment('view');
        $related_blogs = Blog::where('cat_id', '=', $blog->cat_id)->where('id', '!=',$blog->id)->get();
        $categories=Category::orderBy('id','DESC')->get();
        return view('frontend.blogs.single_blog',compact('blog','count_view','related_blogs','categories'));
    }

    public function index()
    {
     
        return view('frontend.blogs.blog_index');
    }

    public function category_blogs($id)
    {
        $category_blogs=Blog::with(['category'])->orderBy('id','DESC')->where('cat_id',$id)->get();
        return view('frontend.blogs.category_blog_show',compact('category_blogs'));
    }
}
