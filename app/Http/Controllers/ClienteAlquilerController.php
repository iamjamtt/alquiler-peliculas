<?php

namespace App\Http\Controllers;

use App\Models\Alquiler;
use App\Models\DetalleAlquiler;
use App\Models\HistorialTarjeta;
use App\Models\Pelicula;
use App\Models\Tarjeta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Cart;

class ClienteAlquilerController extends Controller
{
    public function index()
    {
        return view('vista-cliente.alquiler.alquiler');
    }

    public function store(Request $request)
    {
        date_default_timezone_set("America/Lima");

        if(auth('tarjetas')->user()->tarjeta_saldo < $request->total){
            return redirect()->back()->with('error', 'Saldo insuficiente');
        }else{
            //creando la fecha final del alquiler
            $valor = '+ 3 days';
            $fecha_final = date('Y-m-d',strtotime(now().$valor));

            //generando el codigo del alquiler
            $id = Alquiler::max('id');
            $numero = Alquiler::select('alquiler_codigo')->where('id',$id)->first();
            $num = 0;
            if($numero == null){
                $codigo = 'ALQ-0001';
            }else{
                $dig1 = substr($numero->alquiler_codigo,4,4);
                $num = intval($dig1) + 1;
                if($num > 0 && $num < 10){
                    $codigo = 'ALQ-000' . $num;
                }else if($num > 9 && $num < 100){
                    $codigo = 'ALQ-00' . $num;
                }else if($num > 99 && $num < 1000){
                    $codigo = 'ALQ-0' . $num;
                }else if($num > 999 && $num < 10000){
                    $codigo = 'ALQ-' . $num;
                }
            }

            $alquiler = Alquiler::create([
                'alquiler_fecha' => now(),
                'alquiler_fecha_final' => $fecha_final,
                'alquiler_codigo' => $codigo,
                'alquiler_monto' => $request->total,
                'alquiler_estado' => 1,
                'tarjeta_id' => $request->tarjeta_id,
            ]);

            foreach ($request->pelicula_id as $key => $value) {
                //crear link de peliculas alquiladas    
                $pelicula = Pelicula::find($value);
                
                $link = "https://www.pucallpa-alquila.com/".strtolower(auth('tarjetas')->user()->cliente->cliente_nombre)."/pelicula/" . strtolower(str_replace(' ','-',$pelicula->pelicula_descripcion)) . "/" . $pelicula->pelicula_duracion->format('g') . "hrs"  . $pelicula->pelicula_duracion->format('i') . "min"  . "/"  . strtolower($pelicula->TipoPelicula->tipo_descripcion);

                $detalle = DetalleAlquiler::create([
                    'detalle_estado' => 1,
                    'detalle_link' => $link,
                    'alquiler_id' => $alquiler->id,
                    'pelicula_id' => $value,
                ]);
            }

            $montoNuevo = auth('tarjetas')->user()->tarjeta_saldo - $request->total;

            $tarjeta = Tarjeta::find($request->tarjeta_id);
            $tarjeta->tarjeta_saldo = $montoNuevo;
            $tarjeta->save();

            HistorialTarjeta::create([
                'historial_monto' => $request->total,
                'historial_fecha' => now(),
                'historial_modo' => 2,
                'tarjeta_id' => $request->tarjeta_id,
            ]);

            Cart::clear();

            return redirect()->route('cliente-email',$alquiler->id);
        }
    }

    public function mialquiler()
    {
        $a = Alquiler::all();
        foreach ($a as $item) {
            $alquiler_fecha_final = $item->alquiler_fecha_final->format('Y-m-d');
            if($alquiler_fecha_final <= now()){
                $alqui = Alquiler::find($item->id);
                $alqui->alquiler_estado = 2;
                $alqui->save();
            }
        }
        $alquiler = Alquiler::where('tarjeta_id',auth('tarjetas')->user()->id)->orderBy('id','DESC')->paginate(2);
        $count = Alquiler::where('tarjeta_id',auth('tarjetas')->user()->id)->count();
        $valor = null;

        return view('vista-cliente.alquiler.mis-alquileres', compact('alquiler','count','valor'));
    }

    public function filtrarmialquiler(Request $request)
    {
        $valor = 0;
        if($request->estado == null){
            $alquiler = Alquiler::where('tarjeta_id',auth('tarjetas')->user()->id)->orderBy('id','DESC')->paginate(2);
            $count = Alquiler::where('tarjeta_id',auth('tarjetas')->user()->id)->count();
            $valor = null;
        }else{
            $alquiler = Alquiler::where('tarjeta_id',auth('tarjetas')->user()->id)->where('alquiler_estado',$request->estado)->orderBy('id','DESC')->paginate(2);
            $count = Alquiler::where('tarjeta_id',auth('tarjetas')->user()->id)->where('alquiler_estado',$request->estado)->count();
            $valor =strval($request->estado);
        }
        return view('vista-cliente.alquiler.mis-alquileres', compact('alquiler','count','valor'));
    }
}
