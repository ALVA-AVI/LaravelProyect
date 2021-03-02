<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'name', 'departament_id'
    ];

    protected $dates=['deleted_at'];
    protected $hidden = ['created_at','updated_at'];

    public function distritos(){
        return $this->hasMany(District::class);
    }
    public function departamento()
    {
        return $this->belongsTo(Departament::class);
    }

    public function grupopolitico(){
        return $this->hasOne(GrupoPolitico::class, 'id', 'province_id');
    }
    
}
