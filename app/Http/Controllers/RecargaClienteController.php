<?php

namespace App\Http\Controllers;

use App\Models\Alquiler;
use App\Models\DetalleAlquiler;
use App\Models\HistorialTarjeta;
use App\Models\Tarjeta;
use Illuminate\Http\Request;

class RecargaClienteController extends Controller
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
                    $de->detalle_estado = 1;
                    $de->save();
                }
            }
        }
        return view('vista-cliente.recarga.recarga');
    }

    public function historial($id)
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
        $historial = HistorialTarjeta::where('tarjeta_id',$id)->where('historial_modo',1)->orderBy('id','DESC')->paginate(10);
        return view('vista-cliente.recarga.historial', compact('historial'));
    }

    public function movimientos($id)
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
        $historial = HistorialTarjeta::where('tarjeta_id',$id)->orderBy('id','DESC')->paginate(10);
        return view('vista-cliente.recarga.saldo', compact('historial'));
    }

    public function recargar(Request $request)
    {
        date_default_timezone_set("America/Lima");

        $request->validate([
            'monto'  =>  'required|numeric',
        ]);

        // dd($request);
        $montoNuevo = $request->saldo_antiguo + $request->monto;

        $tarjeta = Tarjeta::find($request->id);
        $tarjeta->tarjeta_saldo = $montoNuevo;
        $tarjeta->save();

        HistorialTarjeta::create([
            'historial_monto' => $request->monto,
            'historial_fecha' => now(),
            'historial_modo' => 1,
            'tarjeta_id' => $request->id,
        ]);
        
        return redirect()->route('home-cliente')->with('mensaje-recarga','Recarga Exitosa!');
    }

}
