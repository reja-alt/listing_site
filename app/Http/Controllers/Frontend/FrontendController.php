<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use App\Models\Admin\Division;
use App\Models\Admin\District;
use App\Models\Admin\Post;
use App\Models\Admin\Faq;
use \Illuminate\Support\Str;
use Carbon\Carbon;

class FrontendController extends Controller
{
    public function index()
    {

        $categories = Category::with(['post'])->orderBy('id','DESC')->get();
        $count_view=DB::table('posts')->increment('view');
        return view('frontend.index',compact('categories','count_view'));
    }

    public function category_posts($slug)
    {
        $categories=Category::all();
        $divisions=Division::orderBy('id','DESC')->get();
        $cat=Category::where('slug',$slug)->first();
        $category_posts=Post::where('category_id',$cat->id)->get();
        return view('frontend.posts.category_all_posts',compact('category_posts','categories','divisions'));
    }

    public function subcategory_posts($slug)
    {
        $categories=Category::all();
        $divisions=Division::orderBy('id','DESC')->get();
        $subcat=Subcategory::where('slug',$slug)->first();
        $subcategory_posts=Post::where('subcategory_id',$subcat->id)->get();
        return view('frontend.posts.subcategory_all_posts',compact('subcategory_posts','categories','divisions'));
    }

    public function division_posts($slug)
    {
        $categories=Category::all();
        $divisions=Division::orderBy('id','DESC')->get();
        $div=Division::where('slug',$slug)->first();
        $division_posts=Post::where('division_id',$div->id)->get();
        return view('frontend.posts.division_all_posts',compact('division_posts','categories','divisions'));
    }

    public function district_posts($slug)
    {
        $categories=Category::all();
        $divisions=Division::orderBy('id','DESC')->get();
        $dis=District::where('slug',$slug)->first();
        $district_posts=Post::where('district_id',$dis->id)->get();
        return view('frontend.posts.district_all_posts',compact('district_posts','categories','divisions'));
    }
    public function all_posts()
    {
        $all_posts=Post::orderBy('id','DESC')->get();
        $categories=Category::all();
        $divisions=Division::orderBy('id','DESC')->get();
        return view('frontend.posts.all_posts',compact('all_posts','divisions','categories'));
    }

    public function faqs()
    {
     
        $faqs=Faq::orderBy('id','DESC')->get();
        $categories=Category::all();
        return view('frontend.faqs.index',compact('faqs','categories'));
    }

    
    

}
