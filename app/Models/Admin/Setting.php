<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';
 
    protected $fillable = [
        'title','facebook_page','youtube_channel', 'address' ,'phone_number','email_address','logo'
    ];
}
