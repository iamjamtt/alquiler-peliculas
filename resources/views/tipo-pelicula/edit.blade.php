@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mb-3 mt-2">
                <span class="fw-bold text-uppercase fs-4">
                    Editar Tipo de Peliculas
                </span>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('tipos-peliculas.update', $tipo->id) }}" method="post" class="row g-3" novalidate>
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="col-md-12">
                            <label class="form-label">Descripcion *</label>
                            <input type="text" class="form-control" name="descripcion" value="{{$tipo->tipo_descripcion}}">
                            @error('descripcion')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary w-100">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
