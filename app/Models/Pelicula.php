<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;
    
    protected $primaryKey = "id";

    protected $dates = ['pelicula_duracion'];

    protected $table = 'pelicula';
    
    protected $fillable = [
        'id',
        'pelicula_descripcion',
        'pelicula_monto',
        'pelicula_registro',
        'pelicula_imagen',
        'pelicula_duracion',
        'pelicula_estado',
        'categoria_id',
        'tipo_id',
    ];

    public $timestamps = false;

    public function Categoria(){
        return $this->belongsTo(Categoria::class,
        'categoria_id','id');
    }

    public function TipoPelicula(){
        return $this->belongsTo(TipoPelicula::class,
        'tipo_id','id');
    }
}
