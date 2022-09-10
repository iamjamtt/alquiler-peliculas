@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mb-3 mt-2">
                <span class="fw-bold text-uppercase fs-4">
                    Agregar Categorias de Peliculas
                </span>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('categorias.store') }}" method="post" class="row g-3" novalidate>
                        @csrf
                        <div class="col-md-12">
                            <label class="form-label">Descripcion *</label>
                            <input type="text" class="form-control" name="descripcion" value="{{old('descripcion')}}">
                            @error('descripcion')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary w-100">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
