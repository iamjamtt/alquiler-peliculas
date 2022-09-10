@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mb-3 mt-2">
                <span class="fw-bold text-uppercase fs-4">
                    Historial de Recargas
                </span>
            </div>
            <div class="card">
                {{-- <div class="card-header d-flex justify-content-end align-items-center">
                    <a name="" id="" class="btn btn-primary" href="{{ route('clientes.create') }}" role="button">Agregar</a>
                </div> --}}

                <div class="card-body">
                    <table  class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th>ID</th>
                                <th>Tarjeta</th>
                                <th>Propietario</th>
                                <th>DNI</th>
                                <th>Monto</th>
                                <th>Fecha</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($historial as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->tarjeta->tarjeta_numero }}</td>
                                    <td>{{ $item->tarjeta->cliente->cliente_nombre }} {{ $item->tarjeta->cliente->cliente_apellido }}</td>
                                    <td>{{ $item->tarjeta->cliente->cliente_dni }}</td>
                                    <td>S/. {{ $item->historial_monto }}</td>
                                    <td>{{ $item->historial_fecha->format('d/m/Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                    {{ $historial->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
