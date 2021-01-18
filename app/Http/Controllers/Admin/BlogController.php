<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Admin\Category;
use App\Models\Admin\Subcategory;
use App\Models\Admin\Blog;
use DB;
use Image;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogs.index',compact('blogs'));
    }

    public function create()
    {
        $categories=Category::all();
        $subcategories=Subcategory::all();
        return view('admin.blogs.create',compact('categories','subcategories'));
    }
    

    public function store(Request $request)
    {
        $this->validate($request, [
            'cat_name' => 'required',
            'title' => 'required',
            'image' => 'mimes:jpeg,png,gif', 
        ]);
        $image = $request->file('image');
        $slug = Str::of($request->title)->slug('-');
        if(isset($image))
        {
            
            $imageName  = $slug.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!file_exists('uploads/blog'))
            {
                mkdir('uploads/blog',0777,true);
            }
            Image::make($image)->resize(900, 500)->save('uploads/blog/'.$imageName);

        } else {
            $imageName = "default.png";
           
        }
        $blogs=new Blog();
        $blogs->cat_id=$request->cat_name;
        $blogs->subcategory_id=$request->subcategory_name;
        $blogs->title=$request->title;
        $blogs->image=$imageName;
        $blogs->details=$request->details;
        $blogs->tags=$request->tags;
        $blogs->slug=$slug;
        $blogs->status=$request->status;   
        $blogs->thumbnail_select=$request->thumbnail_select;
        $blogs->save();

        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
            return redirect()->route('blog.index')->with($notification);
    }

 
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $categories=DB::table('categories')->get();
        $subcategories=Subcategory::all();
        $blog=Blog::findorFail($id);
        return view('admin.blogs.edit',compact('blog','categories','subcategories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'cat_name' => 'required',
            'title' => 'required',
            'image' => 'mimes:jpeg,png,gif', 
        ]);
        
        $image = $request->file('image');
        $slug = Str::of($request->title)->slug('-');
        if(isset($image))
        {
            
            $imageName  = $slug.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!file_exists('uploads/blog'))
            {
                mkdir('uploads/blog',0777,true);
            }
            Image::make($image)->resize(900, 500)->save('uploads/blog/'.$imageName);

        } else {
            $imageName = "default.png";
           
        }
        $blogs=Blog::findorFail($id);
        $blogs->cat_id=$request->cat_name;
        $blogs->subcategory_id=$request->subcategory_name;
        $blogs->title=$request->title;
        $blogs->image=$imageName;
        $blogs->details=$request->details;
        $blogs->tags=$request->tags;
        $blogs->slug=$slug;
        $blogs->status=$request->status;   
        $blogs->thumbnail_select=$request->thumbnail_select;
        $blogs->save();

        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
            return redirect()->route('blog.index')->with($notification);
    }

 
    public function destroy($id)
    {
        $blog=Blog::findOrFail($id);
        $blog->delete();
        $notification=array(
            'message'=>'Successfully Deleted',
            'alert-type'=>'success'
        );
     
        return redirect()->route('blog.index')->with($notification);
    }

    public function filter_subcategory(Request $request){
        if($request->ajax())
        {
            $get_data = Subcategory::where('category_id',$request->id)->get();
            $data = view('admin.blogs.select-ajax',compact('get_data'))->render();
            return response()->json(['options'=>$data]);
        }
    
    }
    public function filter_subcategory_edit(Request $request){
        if($request->ajax())
        {
            $get_data = Subcategory::where('category_id',$request->id)->get();
            $data = view('admin.blogs.select-ajax',compact('get_data'))->render();
            return response()->json(['options'=>$data]);
        }
    
    }
}
