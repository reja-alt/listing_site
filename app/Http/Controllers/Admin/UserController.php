<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function user_index()
    {
        $users=User::where('is_admin', 0)->get();
        return view('admin.users.index',compact('users'));
    }
    public function show($id)
    {
        $id=User::where('id',$id)->Where('is_admin', 0)->first()->id;
        $user=User::where('id', $id)->get();



        return view('admin.users.show', compact('user'));
    }
}
