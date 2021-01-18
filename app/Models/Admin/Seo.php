<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;
    protected $table = 'seos';
 
    protected $fillable = [
        'meta_title','meta_tag', 'meta_description' ,'meta_author','google_analytics','google_verification','bing_verification','alexa_analytics'
    ];
}
