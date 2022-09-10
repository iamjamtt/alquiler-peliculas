<?php

namespace App\Http\Controllers;

use App\Models\Alquiler;
use App\Models\DetalleAlquiler;
use Illuminate\Http\Request;

class AlquilerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alquiler = Alquiler::orderBy('id','DESC')->get();
        foreach ($alquiler as $item) {
            $alquiler_fecha_final = $item->alquiler_fecha_final->format('Y-m-d');
            // dd($alquiler_fecha_final);
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

        return view('alquiler.index', compact('alquiler'));
    }

    public function show($id)
    {
        $alquiler = Alquiler::find($id);
        $detalle = DetalleAlquiler::where('alquiler_id', $id)->get();
        return view('alquiler.show', compact('alquiler', 'detalle'));
    }
}
