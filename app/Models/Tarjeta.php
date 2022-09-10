<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Tarjeta extends Authenticatable
{
    use HasFactory;
        
    protected $primaryKey = "id";

    protected $dates = ['tarjeta_registro'];

    protected $table = 'tarjeta';
    
    protected $fillable = [
        'id',
        'tarjeta_numero',
        'tarjeta_codigo',
        'tarjeta_saldo',
        'tarjeta_registro',
        'tarjeta_estado',
        'cliente_id',
    ];

    public $timestamps = false;

    public function Cliente(){
        return $this->belongsTo(Cliente::class,
        'cliente_id','id');
    }
}
