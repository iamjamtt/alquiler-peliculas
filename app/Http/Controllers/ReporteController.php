<?php

namespace App\Http\Controllers;

use App\Models\DetalleAlquiler;
use App\Models\HistorialTarjeta;
use App\Models\TipoPelicula;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function link()
    {
        $detalle = DetalleAlquiler::where('detalle_estado', 2)->orderBy('id','DESC')->paginate(10);
        return view('reporte.link', compact('detalle'));
    }

    public function peliculasAlquiladas()
    {
        date_default_timezone_set("America/Lima");
        $fecha_inicio = null;
        $fecha_fin = null;
        $detalle = DetalleAlquiler::join('alquiler','alquiler.id','=','detalle_alquiler.alquiler_id')->whereDate('alquiler.alquiler_fecha','<=',today())->whereDate('alquiler.alquiler_fecha','>=',now()->subDays(30))->get();
        return view('reporte.peliculas-alquiladas', compact('detalle','fecha_inicio','fecha_fin'));
    }

    public function peliculasAlquiladasFiltro(Request $request)
    {
        date_default_timezone_set("America/Lima");

        $request->validate([
            'fecha_inicio' => ['required', 'date'],
            'fecha_fin' => ['required', 'date']
        ]);
        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;
        $detalle = DetalleAlquiler::join('alquiler','alquiler.id','=','detalle_alquiler.alquiler_id')->whereDate('alquiler.alquiler_fecha','<=',$request->fecha_fin)->whereDate('alquiler.alquiler_fecha','>=',$request->fecha_inicio)->get();
        return view('reporte.peliculas-alquiladas', compact('detalle','fecha_inicio','fecha_fin'));
    }

    public function peliculasTipo()
    {
        $tipo = TipoPelicula::all();
        foreach($tipo as $item){
            $count = DetalleAlquiler::join('pelicula','pelicula.id','=','detalle_alquiler.pelicula_id')->where('pelicula.tipo_id',$item->id)->count();
            $nombre = $item->tipo_descripcion;
            $count2[] = ['label' => $nombre, 'data' => $count];
        }

        // dd(json_encode($count2));

        return view('reporte.peliculas-categorias',['data' => json_encode($count2)]);
    }

    public function recargas()
    {
        date_default_timezone_set("America/Lima");
        $fecha = null;
        $historial = HistorialTarjeta::whereDate('historial_fecha',today())->get();
        return view('reporte.recargas', compact('historial','fecha'));
    }

    public function recargasFiltro(Request $request)
    {
        date_default_timezone_set("America/Lima");

        $request->validate([
            'fecha' => ['required', 'date'],
        ]);
        $fecha = $request->fecha;
        $historial = HistorialTarjeta::whereDate('historial_fecha',$request->fecha)->get();
        return view('reporte.recargas', compact('historial','fecha'));
    }

    public function masAlquiladas()
    {
        date_default_timezone_set("America/Lima");
        $fecha = null;
        $detalle = DetalleAlquiler::join('alquiler','alquiler.id','=','detalle_alquiler.alquiler_id')->select('detalle_alquiler.id','detalle_alquiler.pelicula_id',DetalleAlquiler::raw('count(detalle_alquiler.pelicula_id) as cantidad'))->whereDate('alquiler.alquiler_fecha','<=',today())->groupBy('detalle_alquiler.pelicula_id')->orderBy(DetalleAlquiler::raw('count(detalle_alquiler.pelicula_id)'),'DESC')->take(3)->skip(0)->get();
        foreach($detalle as $item){
            $count2[] = ['label' => $item->pelicula->pelicula_descripcion, 'data' => $item->cantidad];
        }
        // dd($count2);
        return view('reporte.mas-alquiladas', compact('detalle','fecha'),['data' => json_encode($count2)]);
    }

    public function masAlquiladasFiltro(Request $request)
    {
        date_default_timezone_set("America/Lima");

        $request->validate([
            'fecha' => ['required', 'date'],
        ]);
        $count2 = null;
        $fecha = $request->fecha;
        $detalle = DetalleAlquiler::join('alquiler','alquiler.id','=','detalle_alquiler.alquiler_id')->select('detalle_alquiler.id','detalle_alquiler.pelicula_id',DetalleAlquiler::raw('count(detalle_alquiler.pelicula_id) as cantidad'))->whereDate('alquiler.alquiler_fecha',$request->fecha)->groupBy('detalle_alquiler.pelicula_id')->orderBy(DetalleAlquiler::raw('count(detalle_alquiler.pelicula_id)'),'DESC')->take(3)->skip(0)->get();
        foreach($detalle as $item){
            $count2[] = ['label' => $item->pelicula->pelicula_descripcion, 'data' => $item->cantidad];
        }
        if($count2 == null){
            $count2[] = ['label' => 'no se encontro datos', 'data' => 0];
        }
        return view('reporte.mas-alquiladas', compact('detalle','fecha'),['data' => json_encode($count2)]);
    }

    public function menosAlquiladas()
    {
        date_default_timezone_set("America/Lima");
        $fecha = null;
        $detalle = DetalleAlquiler::join('alquiler','alquiler.id','=','detalle_alquiler.alquiler_id')->select('detalle_alquiler.id','detalle_alquiler.pelicula_id',DetalleAlquiler::raw('count(detalle_alquiler.pelicula_id) as cantidad'))->whereDate('alquiler.alquiler_fecha','<=',today())->groupBy('detalle_alquiler.pelicula_id')->orderBy(DetalleAlquiler::raw('count(detalle_alquiler.pelicula_id)'),'ASC')->take(3)->skip(0)->get();
        foreach($detalle as $item){
            $count2[] = ['label' => $item->pelicula->pelicula_descripcion, 'data' => $item->cantidad];
        }
        // dd($count2);
        return view('reporte.menos-alquiladas', compact('detalle','fecha'),['data' => json_encode($count2)]);
    }

    public function menosAlquiladasFiltro(Request $request)
    {
        date_default_timezone_set("America/Lima");

        $request->validate([
            'fecha' => ['required', 'date'],
        ]);
        $count2 = null;
        $fecha = $request->fecha;
        $detalle = DetalleAlquiler::join('alquiler','alquiler.id','=','detalle_alquiler.alquiler_id')->select('detalle_alquiler.id','detalle_alquiler.pelicula_id',DetalleAlquiler::raw('count(detalle_alquiler.pelicula_id) as cantidad'))->whereDate('alquiler.alquiler_fecha',$request->fecha)->groupBy('detalle_alquiler.pelicula_id')->orderBy(DetalleAlquiler::raw('count(detalle_alquiler.pelicula_id)'),'ASC')->take(3)->skip(0)->get();
        foreach($detalle as $item){
            $count2[] = ['label' => $item->pelicula->pelicula_descripcion, 'data' => $item->cantidad];
        }
        if($count2 == null){
            $count2[] = ['label' => 'no se encontro datos', 'data' => 0];
        }
        return view('reporte.menos-alquiladas', compact('detalle','fecha'),['data' => json_encode($count2)]);
    }
}
