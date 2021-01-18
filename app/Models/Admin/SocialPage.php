<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialPage extends Model
{
    use HasFactory;
    protected $table = 'social_pages';
 
    protected $fillable = [
        'facebook_page','facebook_status', 'youtube_page' ,'youtube_status'
    ];
}
