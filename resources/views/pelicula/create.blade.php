@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mb-3 mt-2">
                <span class="fw-bold text-uppercase fs-4">
                    Agregar Peliculas
                </span>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('peliculas.store') }}" method="post" class="row g-3" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label">Categoria *</label>
                            <select class="form-control" name="categoria">
                                <option value="" selected>Seleccione</option>
                                @foreach ($categorias as $item)
                                <option value="{{$item->id}}" {{$item->id == old('categoria') ? 'selected' : ''}}>{{$item->categoria_descripcion}}</option>
                                @endforeach
                            </select>
                            @error('categoria')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tipo de Pelicula *</label>
                            <select class="form-control" name="tipo_de_pelicula">
                                <option value="" selected>Seleccione</option>
                                @foreach ($tipos as $item)
                                <option value="{{$item->id}}" {{$item->id == old('tipo_de_pelicula') ? 'selected' : ''}}>{{$item->tipo_descripcion}}</option>
                                @endforeach
                            </select>
                            @error('tipo_de_pelicula')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Descripcion *</label>
                            <input type="text" class="form-control" name="descripcion" value="{{old('descripcion')}}">
                            @error('descripcion')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Monto *</label>
                            <input type="number" class="form-control" name="monto" value="{{old('monto')}}">
                            @error('monto')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Duracion *</label>
                            <input type="time" class="form-control" name="duracion" value="{{old('duracion')}}">
                            @error('duracion')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Imagen *</label>
                            <input type="file" class="form-control" name="imagen" value="{{old('imagen')}}">
                            @error('imagen')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 ">
                            <button type="submit" class="btn btn-primary w-100">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
