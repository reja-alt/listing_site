<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\User\Post;

class Review extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo('App\Models\Admin\User','user_id');
    }

    public function post(){
        return $this->belongsTo('App\Models\Admin\Post','post_id');
    }
}
