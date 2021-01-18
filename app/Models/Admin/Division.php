<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\District;
use App\Models\Admin\Post;
use App\Models\Admin\SubDistrict;

class Division extends Model
{
    use HasFactory;
    protected $table = 'divisions';
 
    protected $fillable = [
        'name'
    ];
    public function districts(){
        return $this->hasMany('App\Models\Admin\District','div_id');
    }

    public function subdistricts(){
        return $this->hasMany('App\Models\Admin\SubDistrict','div_id');
    }

    public function post(){
        return $this->hasMany('App\Models\Admin\Post','division_id');
    }
}
