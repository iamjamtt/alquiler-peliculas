<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleAlquiler extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    protected $table = 'detalle_alquiler';
    
    protected $fillable = [
        'id',
        'detalle_estado',
        'detalle_link',
        'alquiler_id',
        'pelicula_id',
    ];

    public $timestamps = false;

    public function Pelicula(){
        return $this->belongsTo(Pelicula::class,
        'pelicula_id','id');
    }

    public function Alquiler(){
        return $this->belongsTo(Alquiler::class,
        'alquiler_id','id');
    }
}
