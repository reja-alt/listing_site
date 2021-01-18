<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Division;
use App\Models\Admin\SubDistrict;

class District extends Model
{
    use HasFactory;
    protected $table = 'districts';
 
    protected $fillable = [
        'div_id','name'
    ];

    public function division(){
        return $this->belongsTo('App\Models\Admin\Division','div_id');
    }
    public function Subdistrict(){
        return $this->hasMany('App\Models\Admin\SubDistrict','div_id');
    }

}
