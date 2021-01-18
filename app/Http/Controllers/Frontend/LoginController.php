<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

class LoginController extends Controller
{
    public function login()
    {
        
        return view('frontend.accounts.login');
    }
   
   

}
