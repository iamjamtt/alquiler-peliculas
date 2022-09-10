@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mb-3 mt-2">
                <span class="fw-bold text-uppercase fs-4">
                    Peliculas
                </span>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-end align-items-center">
                    <a name="" id="" class="btn btn-primary" href="{{ route('peliculas.create') }}" role="button">Agregar</a>
                </div>

                <div class="card-body">
                    <table  class="table table-striped table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th>ID</th>
                                <th>Pelicula</th>
                                <th>Categoria</th>
                                <th>Tipo de Pelicula</th>
                                <th>Duracion</th>
                                <th>Precio</th>
                                <th>Imagen</th>
                                <th>Estado</th>
                                <th class="col-md-2">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($peliculas as $item)
                                <tr class="h-auto">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->pelicula_descripcion }}</td>
                                    <td>{{ $item->categoria->categoria_descripcion }}</td>
                                    <td>{{ $item->tipopelicula->tipo_descripcion }}</td>
                                    <td>{{ $item->pelicula_duracion->format('g') }} hrs {{ $item->pelicula_duracion->format('i') }} min</td>
                                    <td>S/. {{ $item->pelicula_monto }}</td>
                                    <td><img src="{{ asset('img/peliculas/'.$item->pelicula_imagen) }}" alt="imagen pelicula" width="25px"></td>
                                    @if ($item->pelicula_estado == 1)
                                    <td class="text-success fw-bold">Disponible</td>
                                    @else
                                    <td class="text-danger fw-bold">Desabilitado</td>
                                    @endif
                                    <td class="d-flex gap-1 h-auto">
                                        <a name="" id="" class="btn btn-success" href="{{ route('peliculas.edit', $item->id) }}" role="button">Editar</a>
                                        <form action="{{ route('peliculas.updateEstado',$item->id) }}" method="post">
                                            {{ method_field('PUT') }}
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Desabilitar</button>
                                        </form>
                                    </td>
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
