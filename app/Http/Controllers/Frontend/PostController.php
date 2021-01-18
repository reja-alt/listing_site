<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Subcategory;
use App\Models\Admin\District;
use App\Models\User;
use App\Models\Admin\Category;
use App\Models\Admin\Division;
use App\Models\Admin\SubDistrict;
use App\Models\Admin\Post;
use Image;
use Str;
use DB;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;



class PostController extends Controller
{

    public function create()
    {
        return view('frontend.posts.create');
    }

    public function vendor_post($id)
    {
        $id=User::where('is_admin',$id)->first();
        $post=Post::where('user_id',$id)->get();
        return $post;
        // $post=Post::where('category_id',$cat->id)->get();
        return view('frontend.vendors.post_show',compact('post'));
    }


    public function store(Request $request)
    {
        
    //   return $request;
    //   {"_token":"8P5xZpPlrj32tJkl5c4ppvkMZNuuGpQ5un6IqDGN","ads_type":"0","category_name":"---Select a category---","title":null,"price_type":"1","price":null,"brand":"0","description":null,"feature_description":null,"division_name":"---Select Division---","district_name":"---Select District---","subdistrict_name":"---Select Sub District---","zipcode":null,"address":null,"phone_number":null,"whatsapp":null,"email":null,"images":[{}]}      
        // $this->validate($request, [
        //     'category_name' => 'required',
        //     'subcategory_name' => 'required',
        //     'user_name' => 'required',
        //     'city' => 'required',
        //     'address' => 'required',
        //     'price' => 'required',
        //     'user_name' => 'required',
        //     'title' => 'required',
        //     'image' => 'mimes:jpeg,png,gif', 
        // ]);
        $posts=new Post();
        $slug = Str::of($request->title)->slug('-');
        $images = array();
        if($request->hasFile('images')){
            foreach ($request->file('images') as $key => $image) {

                $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(800,500)->save('uploads/blog/'.$image_one_name);
                $uploadname='uploads/blog/'.$image_one_name;


                array_push($images, $uploadname);
            }
            $posts->thumbnail = json_encode($images);
        }

        
        $posts->category_id=$request->category_name;
        $posts->subcategory_id=$request->subcategory_name;
        $posts->user_id=Auth::user()->id;
        $posts->division_id=$request->division_name;
        $posts->district_id=$request->district_name;
        $posts->subdistrict_id=$request->subdistrict_name;
        $posts->ads_type=$request->ads_type;
        $posts->title=$request->title;
        $posts->price_type=$request->price_type;
        $posts->price=$request->price;
        $posts->condition_type=$request->condition_type;
        $posts->brand=$request->brand;
        $posts->zipcode=$request->zipcode;
        $posts->feature=$request->feature;
        $posts->feature_description=$request->feature_description;
        $posts->authenticaty=$request->authenticaty;
        $posts->address=$request->address;
        $posts->description=$request->description;
        $posts->email=$request->email;
        $posts->phone_number=$request->phone_number;
        $posts->whatsapp=$request->whatsapp;
        // $posts->published_date=$request->published_date;
        // $posts->year=$request->model_year;
        $posts->slug=$slug;
        // $posts->status=$request->status;  
        // $posts->thumbnail_select=$request->thumbnail_select;
        $posts->save();

        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
        
            return redirect()->route('home')->with($notification);
    }

    public function edit($id)
    {
        $post=Post::findOrFail($id);
        return view('frontend.posts.edit',compact('post'));
    }

    public function show($slug)
    {
        $id = Post::where('slug',$slug)->first()->id;
        $post=Post::where('id',$id)->first();
        $count_view=Post::where('id', $id)->increment('view');
        $related_posts = Post::where('category_id', '=', $post->category_id)->where('id', '!=',$post->id)->get();
        return view('frontend.posts.single_post',compact('post','count_view','related_posts'));
    }

    public function update(Request $request, $id)
    {
        
        // $this->validate($request, [
        //     'category_name' => 'required',
        //     'subcategory_name' => 'required',
        //     'user_name' => 'required',
        //     'city' => 'required',
        //     'address' => 'required',
        //     'price' => 'required',
        //     'user_name' => 'required',
        //     'title' => 'required',
        //     'image' => 'mimes:jpeg,png,gif', 
        // ]);
        $post=Post::findOrFail($id);
        $slug = Str::of($request->title)->slug('-');
      
        $images = array();
        if($request->hasFile('images')){
            foreach ($request->file('images') as $key => $image) {

                $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(800,500)->save('uploads/blog/'.$image_one_name);
                $uploadname='uploads/blog/'.$image_one_name;


                array_push($images, $uploadname);
            }
            $post->thumbnail = json_encode($images);
        }

        
        $post->category_id=$request->category_name;
        $post->subcategory_id=$request->subcategory_name;
        $post->user_id=Auth::user()->id;
        $post->division_id=$request->division_name;
        $post->district_id=$request->district_name;
        $post->subdistrict_id=$request->subdistrict_name;
        $post->ads_type=$request->ads_type;
        $post->title=$request->title;
        $post->price_type=$request->price_type;
        $post->price=$request->price;
        $post->condition_type=$request->condition_type;
        $post->brand=$request->brand;
        $post->zipcode=$request->zipcode;
        $post->feature=$request->feature;
        $post->feature_description=$request->feature_description;
        $post->authenticaty=$request->authenticaty;
        $post->address=$request->address;
        $post->description=$request->description;
        $post->email=$request->email;
        $post->phone_number=$request->phone_number;
        $post->whatsapp=$request->whatsapp;
        // $posts->published_date=$request->published_date;
        // $posts->year=$request->model_year;
        $post->slug=$slug;
        // $posts->status=$request->status;  
        // $posts->thumbnail_select=$request->thumbnail_select;
        $post->save();

        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
        
            return redirect()->route('home')->with($notification);
    }


    public function filter_subcategory(Request $request){
        if($request->ajax())
        {
            $get_data = Subcategory::where('category_id',$request->id)->get();
            $data = view('frontend.posts.select-ajax',compact('get_data'))->render();
            return response()->json(['options'=>$data]);
        }
    
    }

    public function filter_district(Request $request){
        if($request->ajax())
        {
            $get_data = District::where('div_id',$request->id)->get();
            $data = view('frontend.posts.select-ajax',compact('get_data'))->render();
            return response()->json(['options'=>$data]);
        }
    
    }

    public function filter_subdistrict(Request $request){
        if($request->ajax())
        {
            $get_data = SubDistrict::where('district_id',$request->id)->get();
            $data = view('frontend.posts.filter-subdistrict',compact('get_data'))->render();
            return response()->json(['options'=>$data]);
        }
    
    }

    public function destroy($id)
    {
        $post=Post::findOrFail($id);
        $post->delete();
        $notification=array(
            'message'=>'Successfully Deleted',
            'alert-type'=>'success'
        );
     
        return redirect()->back()->with($notification);
    }


}
