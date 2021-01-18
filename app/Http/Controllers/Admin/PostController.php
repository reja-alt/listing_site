<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;
use App\Models\Admin\Subcategory;
use DB;
use App\Models\User\Post;
use Image;
use Carbon\Carbon;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts=Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    public function create()
    {
        $categories=DB::table('categories')->get();
        $subcategories=DB::table('subcategories')->get();
        $users=DB::table('users')->get();
        return view('admin.posts.create',compact('categories','users','subcategories'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required',
            'subcategory_name' => 'required',
            'user_name' => 'required',
            'city' => 'required',
            'address' => 'required',
            'price' => 'required',
            'user_name' => 'required',
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
        $posts=new Post();
        $posts->category_id=$request->category_name;
        $posts->subcategory_id=$request->subcategory_name;
        $posts->user_id=$request->user_name;
        $posts->brand=$request->brand;
        $posts->model=$request->model;
        $posts->city=$request->city;
        $posts->address=$request->address;
        $posts->price=$request->price;
        $posts->price_type=$request->price_type;
        $posts->title=$request->title;
        $posts->description=$request->description;
        $posts->image=$imageName;
        $posts->published_date=$request->published_date;
        $posts->year=$request->model_year;
        $posts->slug=$slug;
        $posts->status=$request->status; 
        $posts->type=$request->type;   
        $posts->thumbnail_select=$request->thumbnail_select;
        $posts->save();

        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
            return redirect()->route('post.index')->with($notification);
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $post=Post::findOrFail($id);
        $categories=DB::table('categories')->get();
        $subcategories=DB::table('subcategories')->where('category_id',$post->category_id)->get();
        $users=DB::table('users')->get();
        return view('admin.posts.edit',compact('post','categories','users','subcategories'));
    }

 
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_name' => 'required',
            'subcategory_name' => 'required',
            'user_name' => 'required',
            'city' => 'required',
            'address' => 'required',
            'price' => 'required',
            'user_name' => 'required',
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
        $post=Post::findOrFail($id);
        $post->category_id=$request->category_name;
        $post->subcategory_id=$request->subcategory_name;
        $post->user_id=$request->user_name;
        $post->brand=$request->brand;
        $post->model=$request->model;
        $post->city=$request->city;
        $post->address=$request->address;
        $post->price=$request->price;
        $post->price_type=$request->price_type;
        $post->title=$request->title;
        $post->description=$request->description;
        $post->image=$imageName;
        $post->published_date=$request->published_date;
        $post->year=$request->model_year;
        $post->slug=$slug;
        $post->status=$request->status; 
        $post->type=$request->type;   
        $post->thumbnail_select=$request->thumbnail_select;
        $post->save();

        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
            return redirect()->route('post.index')->with($notification);
    }

 
    public function destroy($id)
    {
        $post=Post::findOrFail($id);
        $post->delete();
        $notification=array(
            'message'=>'Successfully Deleted',
            'alert-type'=>'success'
        );
     
        return redirect()->route('post.index')->with($notification);
    }
    public function filter_subcategory(Request $request){
        if($request->ajax())
        {
            $get_data = Subcategory::where('category_id',$request->id)->get();
            $data = view('admin.posts.select-ajax',compact('get_data'))->render();
            return response()->json(['options'=>$data]);
        }
    
    }
    public function filter_subcategory_edit(Request $request){
        if($request->ajax())
        {
            $get_data = Subcategory::where('category_id',$request->id)->get();
            $data = view('admin.posts.select-ajax',compact('get_data'))->render();
            return response()->json(['options'=>$data]);
        }
    
    }
}
