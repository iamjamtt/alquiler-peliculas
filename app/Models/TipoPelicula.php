<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPelicula extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    protected $table = 'tipo_pelicula';
    
    protected $fillable = [
        'id',
        'tipo_descripcion',
    ];

    public $timestamps = false;
}
