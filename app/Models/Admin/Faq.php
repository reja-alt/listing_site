<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Faq;

class Faq extends Model
{
    use HasFactory;
    protected $table = 'faqs';
 
    protected $fillable = [
        'category_id','question','answer','status'
    ];

    public function category(){
        return $this->belongsTo('App\Models\Admin\Category','category_id');
    }
}
