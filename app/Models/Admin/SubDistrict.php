<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Division;
use App\Models\Admin\District;

class SubDistrict extends Model
{
    use HasFactory;
    protected $table = 'sub_districts';
 
    protected $fillable = [
        'district_id','name'
    ];

    public function divisions(){
        return $this->belongsTo('App\Models\Admin\Division','div_id');
    }
    public function district(){
        return $this->belongsTo('App\Models\Admin\District');
    }
}
