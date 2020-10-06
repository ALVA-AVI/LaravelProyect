<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registro extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'category_id',
        'user_id',
        'titulo',
        'iso',
        'resumen',
        'contexto',
        'archivo',
        'fecha'
    ];
    protected $dates=['deleted_at'];
    protected $hidden = ['created_at','updated_at'];
    public function image(){
        return $this->morphOne('App\Imagen', 'imageable');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }

}
