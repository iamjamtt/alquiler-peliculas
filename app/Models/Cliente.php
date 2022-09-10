<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    protected $table = 'cliente';
    
    protected $fillable = [
        'id',
        'cliente_nombre',
        'cliente_apellido',
        'cliente_dni',
        'cliente_edad',
        'cliente_correo',
        'cliente_tarjeta',
        'cliente_estado',
    ];

    public $timestamps = false;
}
