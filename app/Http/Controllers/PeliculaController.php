<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Pelicula;
use App\Models\TipoPelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
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
        $tipos = TipoPelicula::all();
        $categorias = Categoria::all();
        $peliculas = Pelicula::all();
        return view('pelicula.index', compact('tipos', 'categorias', 'peliculas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = TipoPelicula::all();
        $categorias = Categoria::all();
        return view('pelicula.create', compact('tipos', 'categorias'));
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
// dd($request);
        $request->validate([
            'categoria' => ['required', 'numeric'],
            'tipo_de_pelicula' => ['required', 'numeric'],
            'descripcion' => ['required', 'string'],
            'monto' => ['required', 'numeric'],
            'duracion' => ['required'],
            'imagen' => ['required', 'image', 'file'],
        ]);

        $nombre = $request->descripcion;
        $data = $request->file('imagen');
        $data = $filename = time().'_'.$nombre.'.'.$data->extension();
        $request->imagen->move(public_path('img/peliculas/'), $filename);

        Pelicula::create([
            'pelicula_descripcion' => $request->descripcion,
            'pelicula_monto' => $request->monto,
            'pelicula_registro' => date('Y-m-d'),
            'pelicula_imagen' => $filename,
            'pelicula_duracion' => $request->duracion,
            'pelicula_estado' => 1,
            'categoria_id' => $request->categoria,
            'tipo_id' => $request->tipo_de_pelicula,
        ]);

        return redirect()->route('peliculas.index');
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
        $tipos = TipoPelicula::all();
        $categorias = Categoria::all();
        $pelicula = Pelicula::find($id);
        return view('pelicula.edit', compact('tipos', 'categorias', 'pelicula'));
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
        // dd($request);
        $request->validate([
            'categoria' => ['required', 'numeric'],
            'tipo_de_pelicula' => ['required', 'numeric'],
            'descripcion' => ['required', 'string'],
            'duracion' => ['required'],
            'monto' => ['required', 'numeric'],
            'imagen_nueva' => ['nullable', 'image'],
        ]);

        $pelicula = Pelicula::find($id);
        $pelicula->pelicula_descripcion = $request->descripcion;
        $pelicula->pelicula_monto = $request->monto;
        $pelicula->pelicula_duracion = $request->duracion;
        $pelicula->pelicula_estado = $request->estado;
        $pelicula->categoria_id = $request->categoria;
        $pelicula->tipo_id = $request->tipo_de_pelicula;
        if($request->imagen_nueva){
            $nombre = $request->descripcion;
            $data = $request->file('imagen_nueva');
            $data = $filename = time().'_'.$nombre.'.'.$data->extension();
            $request->imagen_nueva->move(public_path('img/peliculas/'), $filename);
            $pelicula->pelicula_imagen = $filename;
        }
        $pelicula->save();
        return redirect()->route('peliculas.index');
    }

    public function updateEstado(Request $request, $id)
    {
        $pelicula = Pelicula::find($id);
        $pelicula->pelicula_estado = 2;
        $pelicula->save();
        return redirect()->route('peliculas.index');
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
