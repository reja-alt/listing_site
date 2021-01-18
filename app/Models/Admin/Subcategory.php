<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Category;
use App\Models\Admin\Blog;
use App\Models\Admin\Post;


class Subcategory extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsTo('App\Models\Admin\Category');
    }
    public function blog(){
        return $this->hasMany('App\Models\Admin\Blog');
    }
    public function post(){
        return $this->hasMany('App\Models\Admin\Post','subcategory_id');
    }
}
