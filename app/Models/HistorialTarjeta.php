<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialTarjeta extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    protected $dates = ['historial_fecha'];

    protected $table = 'historial_tarjeta';
    
    protected $fillable = [
        'id',
        'historial_monto',
        'historial_fecha',
        'historial_modo',
        'tarjeta_id',
    ];

    public $timestamps = false;

    public function Tarjeta(){
        return $this->belongsTo(Tarjeta::class,
        'tarjeta_id','id');
    }
}
