<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidato extends Model
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
}
