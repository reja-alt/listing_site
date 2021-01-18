<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Category;
use App\Models\Admin\Subcategory;
use App\Models\Frontend\Comment;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
 
    protected $fillable = [
        'cat_id','subcategory_id','title', 'image','details', 'tags', 'slug', 'big_thumbnail','status','thumbnail_select'
    ];

    public function category(){
        return $this->belongsTo('App\Models\Admin\Category','cat_id');
    }

    public function subcategory(){
        return $this->belongsTo('App\Models\Admin\Subcategory','subcategory_id');
    }
    
    public function comment(){
        return $this->hasMany('App\Models\Admin\Comment');
    }

}
