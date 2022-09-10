<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    protected $dates = ['alquiler_fecha', 'alquiler_fecha_final'];

    protected $table = 'alquiler';
    
    protected $fillable = [
        'id',
        'alquiler_fecha',
        'alquiler_fecha_final',
        'alquiler_codigo',
        'alquiler_monto',
        'alquiler_estado',
        'tarjeta_id',
    ];

    public $timestamps = false;

    public function Tarjeta(){
        return $this->belongsTo(Tarjeta::class,
        'tarjeta_id','id');
    }
}
