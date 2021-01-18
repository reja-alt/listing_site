<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Category;
use App\Models\Admin\Subcategory;
use App\Models\Admin\Division;
use App\Models\Admin\Post;
use App\Models\Usre\Review;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
 
    protected $fillable = [
        'category_id', 'subcategory_id', 'user_id', 'division_id' ,'district_id', 'subdistrict_id', 'title', 'slug', 'ads_type','image', 'description', 'brand', 'model', 'zipcode', 'price', 'price_type',
         'whatsapp', 'address', 'name', 'phone_number','email' ,'published_date','thumbnail','status','month','year','view'
    ];

    public function category(){
        return $this->belongsTo('App\Models\Admin\Category','category_id');
    }

    public function subcategory(){
        return $this->belongsTo('App\Models\Admin\Subcategory','subcategory_id');
    }

    public function division(){
        return $this->belongsTo('App\Models\Admin\Division','division_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function review(){
        return $this->hasMany('App\Models\Admin\Review');
    }

}