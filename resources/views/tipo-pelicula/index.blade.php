@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mb-3 mt-2">
                <span class="fw-bold text-uppercase fs-4">
                    Tipo de Peliculas
                </span>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-end align-items-center">
                    <a name="" id="" class="btn btn-primary" href="{{ route('tipos-peliculas.create') }}" role="button">Agregar</a>
                </div>

                <div class="card-body">
                    <table  class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th class="col-md-2">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($tipos as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->tipo_descripcion }}</td>
                                    <td class="d-flex gap-1">
                                        <a name="" id="" class="btn btn-success" href="{{ route('tipos-peliculas.edit', $item->id) }}" role="button">Editar</a>
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
