@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-3 mt-2">
                <span class="fw-bold text-uppercase fs-4">
                    Recargas
                </span>
            </div>
            <div class="my-3">
                <div class="col-md-6 m-auto">
                    <div class="card mb-3">
                        <div class="card-body">
                            <form action="{{ route('reporte-recargas-filtro') }}" method="post" class="row g-1" novalidate>
                                @csrf
                                <div class="col-md-12">
                                    <label class="form-label">Fecha</label>
                                    <input class="form-control" type="date" name="fecha" value="{{old('fecha',$fecha)}}" max="{{now()->format('Y-m-d')}}">
                                    @error('fecha')
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
                                <th>Nro Tarjeta</th>
                                <th>Monto</th>
                                <th>Fecha</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($historial as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->tarjeta->tarjeta_numero }}</td>
                                    <td>{{ $item->historial_monto }}</td>
                                    <td>{{ $item->historial_fecha->format('d/m/Y') }}</td>
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
