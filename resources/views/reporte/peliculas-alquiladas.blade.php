@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-3 mt-2">
                <span class="fw-bold text-uppercase fs-4">
                    Peliculas alquiladas por fecha
                </span>
            </div>
            <div class="my-3">
                <div class="col-md-6 m-auto">
                    <div class="card mb-3">
                        <div class="card-body">
                            <form action="{{ route('reporte-peliculas-filtro') }}" method="post" class="row g-1" novalidate>
                                @csrf
                                <div class="col-md-6">
                                    <label class="form-label">Fecha Inicio</label>
                                    <input class="form-control" type="date" name="fecha_inicio" value="{{old('fecha_inicio',$fecha_inicio)}}" max="{{now()->format('Y-m-d')}}">
                                    @error('fecha_inicio')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label">Fecha Fin</label>
                                    <input class="form-control" type="date" name="fecha_fin" value="{{old('fecha_fin',$fecha_fin)}}" max="{{now()->format('Y-m-d')}}">
                                    @error('fecha_fin')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table  class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th>ID</th>
                                <th>Pelicula</th>
                                <th>Categoria</th>
                                <th>Tipo de Pelicula</th>
                                <th>Fecha Alquilada</th>
                                <th>Duracion</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($detalle as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->pelicula->pelicula_descripcion }}</td>
                                    <td>{{ $item->pelicula->categoria->categoria_descripcion }}</td>
                                    <td>{{ $item->pelicula->TipoPelicula->tipo_descripcion }}</td>
                                    <td>{{ $item->alquiler->alquiler_fecha->format('d/m/Y') }}</td>
                                    <td>{{ $item->pelicula->pelicula_duracion->format('g') }} hrs {{ $item->pelicula->pelicula_duracion->format('i') }} min</td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
