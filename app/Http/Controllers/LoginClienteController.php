<?php

namespace App\Http\Controllers;

use App\Models\Tarjeta;
use Illuminate\Http\Request;

class LoginClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vista-cliente.auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tarjeta'  =>  'required|numeric|digits:8',
            'password'  =>  'required',
        ]);

        $tarjeta = Tarjeta::where('tarjeta_numero',$request->tarjeta)->where('tarjeta_codigo',$request->password)->where('tarjeta_estado',1)->first();
        // dd($tarjeta);
        if(!$tarjeta){
            return back()->with('mensaje','Credenciales incorrectas');
        }
        
        auth('tarjetas')->login($tarjeta);

        if($tarjeta->tarjeta_saldo == 0){
            return redirect()->route('cliente-recarga');
        }else{
            return redirect()->route('home-cliente');
        }

    }

    public function logout(Request $request)
    {
        auth('tarjetas')->logout();

        return redirect()->route('login-cliente');
    }
}
