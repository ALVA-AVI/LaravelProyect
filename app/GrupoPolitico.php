<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrupoPolitico extends Model
{
    //
    use SoftDeletes;
    protected $filable=[
        'departament_id',
        'province_id',
        'district_id',
        'titulo',
        'descripcion',
        'articulo',
        'fecha'
    ];
    protected $dates=['deleted_at'];
    protected $hidden = ['created_at','updated_at'];

    public function departament(){
        return $this->belongsTo(Departament::class,'id');
    }
    /*public function provincia()
    {
        return $this->belongsTo(Province::class,'id');
    }*//*
    public function distrito(){
        return $this->belongsTo(District::class,'id');
    }*/
    
}
