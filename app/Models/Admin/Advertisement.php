<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    protected $table = 'advertisements';
 
    protected $fillable = [
        'ads_type', 'ads_code' , 'ads_image', 'ads_link','ads_status'
    ];
}
