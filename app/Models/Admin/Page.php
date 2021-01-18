<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $table = 'posts';
 
    protected $fillable = [
        'name','title', 'slug', 'image', 'details', 'type', 'page_link',
         'page_color', 'page_title_color', 'customize'
    ];

}