<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Tarjeta;
use Illuminate\Http\Request;

class TarjetaController extends Controller
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
        $clientes = Cliente::where('cliente_estado',1)->get();
        $tarjetas = Tarjeta::where('tarjeta_estado',1)->get();
        return view('tarjeta.index', compact('clientes', 'tarjetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::where('cliente_estado',1)->where('cliente_tarjeta',1)->get();
        $id = Tarjeta::max('id');
        $numero = Tarjeta::select('tarjeta_numero')->where('id',$id)->first();
        $num = 0;
        $num = intval($numero->tarjeta_numero) + 1;
        if($num > 0 && $num < 10){
            $codigo = '0000000' . $num;
        }else if($num > 9 && $num < 100){
            $codigo = '000000' . $num;
        }else if($num > 99 && $num < 1000){
            $codigo = '00000' . $num;
        }else if($num > 999 && $num < 10000){
            $codigo = '0000' . $num;
        }
        return view('tarjeta.create', compact('clientes', 'codigo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set("America/Lima");

        $request->validate([
            'cliente' => ['required', 'numeric'],
            'numero' => ['required', 'unique:tarjeta,tarjeta_numero'],
            'codigo' => ['required', 'numeric'],
            'monto' => ['required', 'numeric'],
        ]);

        $tarjeta = Tarjeta::create([
            'tarjeta_numero' => $request->numero,
            'tarjeta_codigo' => $request->codigo,
            'tarjeta_saldo' => $request->monto,
            'tarjeta_registro' => date('Y-m-d'),
            'tarjeta_estado' => 1,
            'cliente_id' => $request->cliente,
        ]);

        $cli = Cliente::find($request->cliente);
        $cli->cliente_tarjeta = 2;
        $cli->save();
        
        return redirect()->route('cliente-email-credenciales',$tarjeta->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarjeta = Tarjeta::find($id);
        $clientes = Cliente::where('cliente_estado',1)->get();
        return view('tarjeta.edit', compact('tarjeta','clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cliente' => ['required', 'numeric'],
            'numero' => ['required'],
            'codigo' => ['required', 'numeric'],
            'monto' => ['required', 'numeric'],
        ]);

        $tarjeta = Tarjeta::find($id);
        $tarjeta->tarjeta_numero = $request->numero;
        $tarjeta->tarjeta_codigo = $request->codigo;
        $tarjeta->tarjeta_saldo = $request->monto;
        $tarjeta->cliente_id = $request->cliente;
        $tarjeta->save();

        return redirect()->route('cliente-email-credenciales-update',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
