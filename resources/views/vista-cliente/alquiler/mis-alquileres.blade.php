@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mb-3 mt-2 text-center">
                <span class="fw-bold text-uppercase fs-4">
                    Mis Alquileres
                </span>
            </div>
            <div class="col-md-6 m-auto">
                <div class="card mb-3">
                    <div class="card-body">
                        <form action="{{ route('cliente-mis-alquileres-filtrar') }}" method="post" class="row" novalidate>
                            @csrf
                            <div class="col-md-12">
                                <label class="form-label">Estado</label>
                                <select class="form-control" name="estado">
                                    <option value="" selected>Todos</option>
                                    <option value="1" {{'1' === $valor ? 'selectec' : ''}}>Activos</option>
                                    <option value="2" {{'2' === $valor ? 'selectec' : ''}}>Inactivos</option>
                                </select>
                                @error('estado')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label"></label>
                                <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if ($count > 0)
                <div class="parent2">
                @foreach ($alquiler as $item)
                    <div class="card">
                        <div class="card-header">
                            <h4>Codigo de alquiler: <strong>{{$item->alquiler_codigo}}</strong></h4>
                        </div>
                        <div class="d-flex col-md-12">
                            <div class="card-body col-4">
                                @if ($item->alquiler_estado == 1)
                                <span>Estado: <strong class="text-primary fs-5">Activo</strong></span>
                                @else
                                <span>Estado: <strong class="text-danger fs-5">Inactivo</strong></span>
                                @endif
                                <br>
                                <span>Fecha Inicio: <strong>{{$item->alquiler_fecha->format('d/m/Y')}}</strong></span>
                                <br>
                                <span>Fecha Fin: <strong>{{$item->alquiler_fecha_final->format('d/m/Y')}}</strong></span>
                            </div>
                            <div class="card-body col-8">
                                <span class="fs-5"><strong>Peliculas</strong></span>
                                <br>
                                @php
                                    $detalle = App\Models\DetalleAlquiler::where('alquiler_id',$item->id)->get();
                                @endphp
                                @foreach ($detalle as $item2)
                                    <span><strong>{{$item2->pelicula->pelicula_descripcion}}</strong></span>
                                    <br>
                                    <span>link: {{$item2->detalle_link}}</span>
                                    <br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
                <div class="mt-4">
                    {{ $alquiler->links() }}
                </div>
            @else
                <div class="card">
                    <div class="card-body text-center">
                        <span>No tiene alquileres</span>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
