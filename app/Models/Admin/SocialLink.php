<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    use HasFactory;
    protected $table = 'social_links';
 
    protected $fillable = [
        'facebook','twitter', 'linkedin' ,'pinterest','instagram'
    ]; 
}
