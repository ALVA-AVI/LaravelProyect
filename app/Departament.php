<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departament extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'name'
    ];

    protected $dates=['deleted_at'];
    protected $hidden = ['created_at','updated_at'];
    public function provincias(){
        return $this->hasMany(Province::class);
    }
    public function distritos(){
        return $this->hasMany(District::class);
    }
    public function grupopolitico(){
        return $this->hasOne(GrupoPolitico::class,'departament_id');
    }
}
