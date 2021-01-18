<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use Validator;
use Str;
use DB;
use Image;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
        $categories=Category::all();
        return view('admin.categories.index',compact('categories'));
        
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            
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
            Image::make($image)->resize(100, 100)->save('uploads/blog/'.$imageName);

        } else {
            $imageName = "default.png";
           
        }
        $categories= new Category();
        $slug = Str::of($request->name)->slug('-');
        $categories->name= $request->name;
        $categories->slug= $slug;
        $categories->show_on_header= $request->show_on_header;
        $categories->icon=  $imageName ;
        $categories->status= $request->status;
        $categories->save();

        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
            return redirect('/admin/home/category')->with( $notification);
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    { 
        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
        $category=Category::findOrfail($id);
        return view('admin.categories.edit',compact('category'))->with($notification);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            
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
            Image::make($image)->resize(100, 100)->save('uploads/blog/'.$imageName);

        } else {
            $imageName = "default.png";
           
        }
        $categories = Category::findOrFail($id); 
        $slug = Str::of($request->name)->slug('-');
        $categories->name= $request->name;
        $categories->slug= $slug;
        $categories->show_on_header= $request->show_on_header;
        $categories->icon=  $imageName ;
        $categories->status= $request->status;
        $categories->save();
        
        $notification=array(
            'message'=>'Successfully Updated',
            'alert-type'=>'info'
        );
        return redirect('/admin/home/category')->with($notification);
    }

    public function destroy($id)
    {
        DB::table('categories')->where('id',$id)->delete();
        $notification=array(
            'message'=>'Successfully Deleted',
            'alert-type'=>'success'
        );
     
        return redirect()->route('category.index')->with($notification);
    }
}
