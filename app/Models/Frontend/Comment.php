<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Blog;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
 
    protected $fillable = [
        'name','email','user_id', 'blog_id','website', 'comment'
    ];

    public function blog(){
        return $this->belongsTo('App\Models\Admin\Blog','blog_id');
    }

}
