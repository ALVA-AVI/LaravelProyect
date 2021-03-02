<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'name', 'province_id', 'departament_id',
    ];

    protected $dates=['deleted_at'];
    protected $hidden = ['created_at','updated_at'];
    public function provincia()
    {
        return $this->belongsTo(Province::class,'province_id');
    }
    public function region()
    {
        return $this->belongsTo(Departament::class,'departament_id');
    }
    /*public function grupopolitico(){
        return $this->hasOne(GrupoPolitico::class,'district_id');
    }*/
}
