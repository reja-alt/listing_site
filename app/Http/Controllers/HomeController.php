<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Admin\User;
use App\Models\Admin\Post;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $count_view=DB::table('posts')->increment('view');
        return view('home',compact('count_view'));
    }

    public function adminHome()
    {
        return view('admin.home');
    }
    public function vendorHome()
    {
        return view('vendor.home');
    }


}
