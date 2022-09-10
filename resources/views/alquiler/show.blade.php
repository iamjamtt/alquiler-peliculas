@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mb-3 mt-2">
                <span class="fw-bold text-uppercase fs-4">
                    Detalle Alquiler - {{ $alquiler->alquiler_codigo }}
                </span>
            </div>
            @foreach ($detalle as $item)
            <div class="card mb-3">
                <div class="card-body row">
                    <div class="col-md-10">
                        <form action="" method="post" class="row g-2">
                            <div class="col-md-12">
                                <label class="form-label">Pelicula</label>
                                <input type="text" class="form-control" value="{{$item->pelicula->pelicula_descripcion}}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Precio</label>
                                <input type="text" class="form-control" value="S/. {{$item->pelicula->pelicula_monto}}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Duracion</label>
                                <input type="text" class="form-control" value="{{ $item->pelicula->pelicula_duracion->format('g') }} hrs {{ $item->pelicula->pelicula_duracion->format('i') }} min" disabled>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Link</label>
                                <input type="text" class="form-control" value="{{$item->detalle_link}}" disabled>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2">
                        <img src="{{asset('img/peliculas/'.$item->pelicula->pelicula_imagen)}}" alt="imagen pelicula" class="w-100">
                    </div>
                </div>
            </div>
            @endforeach
            <div class="mt-3">
                <a href="{{ route('alquiler.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection
