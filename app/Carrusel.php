<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carrusel extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'category_id',
        'titulo',
        'resena',
        'linkref'
    ];
    protected $dates=['deleted_at'];
    protected $hidden = ['created_at','updated_at'];

    public function image()
    {
        return $this->morphOne('App\Imagen', 'imageable');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
