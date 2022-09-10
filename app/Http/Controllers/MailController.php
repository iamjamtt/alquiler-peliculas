<?php

namespace App\Http\Controllers;

use App\Mail\Crendeciales;
use App\Mail\CrendecialesUpdate;
use App\Mail\TestMail;
use App\Models\Alquiler;
use App\Models\DetalleAlquiler;
use App\Models\Tarjeta;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail($id)
    {
        $alquiler = Alquiler::where('id', $id)->first();
        $nombre = $alquiler->tarjeta->cliente->cliente_nombre;
        $apellido = $alquiler->tarjeta->cliente->cliente_apellido;
        $total = $alquiler->alquiler_monto;
        $fecha_inicio = $alquiler->alquiler_fecha;
        $fecha_fin = $alquiler->alquiler_fecha_final;

        $detalle = [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'fecha_inicio' => $fecha_inicio->format('d/m/Y'),
            'fecha_fin' => $fecha_fin->format('d/m/Y'),
            'total' => $total,
            'detalle' => DetalleAlquiler::where('alquiler_id', $alquiler->id)->get()
        ];

        Mail::to($alquiler->tarjeta->cliente->cliente_correo)->send(new TestMail($detalle));

        return redirect()->route('home-cliente')->with('success', 'Se ha enviado el correo con exito');
    }

    public function sendEmailCredenciales($id)
    {
        $tarjeta = Tarjeta::where('id', $id)->first();
        $nombre = $tarjeta->cliente->cliente_nombre;
        $apellido = $tarjeta->cliente->cliente_apellido;
        $saldo = $tarjeta->tarjeta_saldo;
        $numero = $tarjeta->tarjeta_numero;
        $codigo = $tarjeta->tarjeta_codigo;

        $detalle = [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'saldo' => $saldo,
            'numero' => $numero,
            'codigo' => $codigo,
        ];

        Mail::to($tarjeta->cliente->cliente_correo)->send(new Crendeciales($detalle));

        return redirect()->route('tarjetas.index')->with('success', 'Se ha enviado el correo con exito');
    }
    
    public function sendEmailCredencialesUpdate($id)
    {
        $tarjeta = Tarjeta::where('id', $id)->first();
        $nombre = $tarjeta->cliente->cliente_nombre;
        $apellido = $tarjeta->cliente->cliente_apellido;
        $saldo = $tarjeta->tarjeta_saldo;
        $numero = $tarjeta->tarjeta_numero;
        $codigo = $tarjeta->tarjeta_codigo;

        $detalle = [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'saldo' => $saldo,
            'numero' => $numero,
            'codigo' => $codigo,
        ];

        Mail::to($tarjeta->cliente->cliente_correo)->send(new CrendecialesUpdate($detalle));

        return redirect()->route('tarjetas.index')->with('success', 'Se ha enviado el correo con exito');
    }
}
