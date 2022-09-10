@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mb-3 mt-2">
                <span class="fw-bold text-uppercase fs-4">
                    Clientes
                </span>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-end align-items-center">
                    <a name="" id="" class="btn btn-primary" href="{{ route('clientes.create') }}" role="button">Agregar</a>
                </div>

                <div class="card-body">
                    <table  class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Dni</th>
                                <th>Correo</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->cliente_nombre }} {{ $item->cliente_apellido }}</td>
                                    <td>{{ $item->cliente_dni }}</td>
                                    <td>{{ $item->cliente_correo }}</td>
                                    @php
                                        $tarjeta = App\Models\Tarjeta::where('cliente_id',$item->id)->first();
                                    @endphp 
                                    @if ($tarjeta == null)
                                    <td>No cuenta con tarjeta</td>
                                    @else
                                    <td>Con tajerta</td>
                                    @endif
                                    <td class="d-flex gap-1">
                                        <a name="" id="" class="btn btn-success" href="{{ route('clientes.edit', $item->id) }}" role="button">Editar</a>
                                        
                                        <form action="{{ route('clientes.updateEstado',$item->id) }}" method="post">
                                            {{ method_field('PUT') }}
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
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
