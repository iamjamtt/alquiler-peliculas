@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mb-3 mt-2">
                <span class="fw-bold text-uppercase fs-4">
                    Tarjetas
                </span>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-end align-items-center">
                    <a name="" id="" class="btn btn-primary" href="{{ route('tarjetas.create') }}" role="button">Agregar</a>
                </div>

                <div class="card-body">
                    <table  class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th>ID</th>
                                <th>Nro Tarjeta</th>
                                <th>Cliente</th>
                                <th>Saldo</th>
                                <th>Fecha Registro</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($tarjetas as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->tarjeta_numero }}</td>
                                    <td>{{ $item->cliente->cliente_nombre }}</td>
                                    <td>{{ $item->tarjeta_saldo }}</td>
                                    <td>{{ $item->tarjeta_registro->format('j F Y') }}</td>
                                    <td class="d-flex gap-1">
                                        <a name="" id="" class="btn btn-success" href="{{ route('tarjetas.edit', $item->id) }}" role="button">Editar</a>
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
