<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Tarjeta;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        return view('cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'nombre' => ['required', 'string', 'max:200'],
            'apellidos' => ['required', 'string', 'max:200'],
            'dni' => ['required', 'numeric', 'digits:8', 'unique:cliente,cliente_dni'],
            'edad' => ['required', 'numeric'],
            'correo' => ['required', 'email', 'string', 'unique:cliente,cliente_correo'],
        ]);

        Cliente::create([
            'cliente_nombre' => $request->nombre,
            'cliente_apellido' => $request->apellidos,
            'cliente_dni' => $request->dni,
            'cliente_edad' => $request->edad,
            'cliente_correo' => $request->correo,
            'cliente_tarjeta' => 1,
            'cliente_estado' => 1,
        ]);

        return redirect()->route('clientes.index');
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
        $cliente = Cliente::find($id);
        return view('cliente.edit', compact('cliente'));
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
            'nombre' => ['required', 'string', 'max:200'],
            'apellidos' => ['required', 'string', 'max:200'],
            'dni' => ['required', 'numeric', 'digits:8'],
            'edad' => ['required', 'numeric'],
            'correo' => ['required', 'email', 'string'],
        ]);

        $cliente = Cliente::find($id);
        $cliente->cliente_nombre = $request->nombre;
        $cliente->cliente_apellido = $request->apellidos;
        $cliente->cliente_dni = $request->dni;
        $cliente->cliente_edad = $request->edad;
        $cliente->cliente_correo = $request->correo;
        $cliente->save();
        return redirect()->route('clientes.index');
    }

    public function updateEstado(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        $cliente->cliente_estado = 2;
        $cliente->save();

        $tarjeta = Tarjeta::where('cliente_id',$id)->first();
        $tarjeta->tarjeta_estado = 2;
        $tarjeta->save();
        
        return redirect()->route('clientes.index');
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
