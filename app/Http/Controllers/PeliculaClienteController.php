<?php

namespace App\Http\Controllers;

use App\Models\Alquiler;
use App\Models\DetalleAlquiler;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaClienteController extends Controller
{
    public function index()
    {
        $a = Alquiler::all();
        foreach ($a as $item) {
            $alquiler_fecha_final = $item->alquiler_fecha_final->format('Y-m-d');
            if($alquiler_fecha_final <= now()){
                $alqui = Alquiler::find($item->id);
                $alqui->alquiler_estado = 2;
                $alqui->save();
                
                $detalle = DetalleAlquiler::where('alquiler_id', $item->id)->get();
                foreach ($detalle as $item) {
                    $de = DetalleAlquiler::find($item->id);
                    $de->detalle_estado = 2;
                    $de->save();
                }
            }
        }
        $pelicula = Pelicula::where('pelicula_estado',1)->get();
        return view('vista-cliente.peliculas.pelicula', compact('pelicula'));
    }
}
