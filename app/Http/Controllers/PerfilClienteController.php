<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vista-cliente.perfil.index');
    }
}
