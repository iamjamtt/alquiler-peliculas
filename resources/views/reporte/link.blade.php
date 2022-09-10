@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="mb-3 mt-2">
                <span class="fw-bold text-uppercase fs-4">
                    links dados de baja
                </span>
            </div>
            <div class="card">
                <div class="card-body">
                    <table  class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Pelicula</th>
                                <th>Fecha de Baja</th>
                                <th>Estado</th>
                                <th>Link</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($detalle as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->alquiler->tarjeta->cliente->cliente_nombre }} {{ $item->alquiler->tarjeta->cliente->cliente_apellido }}</td>
                                    <td>{{ $item->pelicula->pelicula_descripcion }}</td>
                                    <td>{{ $item->alquiler->alquiler_fecha_final->format('d/m/Y') }}</td>
                                    <td class="fw-bold text-danger">De baja</td>
                                    <td>{{ $item->detalle_link }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-3">
                {{ $detalle->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
