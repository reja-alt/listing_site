<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Subcategory;
use App\Models\Admin\Blog;
use App\Models\Admin\Post;
use App\Models\Admin\Faq;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
 
    protected $fillable = [
        'name' , 'slug','status'
    ];
 
    public function subcategories(){
        return $this->hasMany('App\Models\Admin\Subcategory','category_id');
    }
    public function blog(){
        return $this->hasMany('App\Models\Admin\Blog','cat_id');
    }
    public function post(){
        return $this->hasMany('App\Models\Admin\Post','category_id');
    }

    public function faq(){
        return $this->hasMany('App\Models\Admin\Faq','category_id');
    }
}
