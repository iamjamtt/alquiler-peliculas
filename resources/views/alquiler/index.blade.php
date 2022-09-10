@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mb-3 mt-2">
                <span class="fw-bold text-uppercase fs-4">
                    Alquiler
                </span>
            </div>
            <div class="card">
                <div class="card-body">
                    <table  class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th>ID</th>
                                <th>Codigo</th>
                                <th>Cliente</th>
                                <th>Monto</th>
                                <th>Fecha Alquiler</th>
                                <th>Fecha Fin</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($alquiler as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->alquiler_codigo }}</td>
                                    <td>{{ $item->tarjeta->cliente->cliente_nombre }} {{ $item->tarjeta->cliente->cliente_apellido }}</td>
                                    <td>{{ $item->alquiler_monto }}</td>
                                    <td>{{ $item->alquiler_fecha->format('d/m/Y') }}</td>
                                    <td>{{ $item->alquiler_fecha_final->format('d/m/Y') }}</td>
                                    @if ($item->alquiler_estado == 1)
                                    <td class="text-success fw-bold">Activo</td>
                                    @else
                                    <td class="text-danger fw-bold">Inactivo</td>
                                    @endif
                                    <td class="d-flex gap-1">
                                        <a name="" id="" class="btn btn-info" href="{{ route('alquiler.show', $item->id) }}" role="button">Detalle</a>
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
