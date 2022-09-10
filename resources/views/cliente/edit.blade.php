@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mb-3 mt-2">
                <span class="fw-bold text-uppercase fs-4">
                    Editar Clientes
                </span>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('clientes.update', $cliente->id) }}" method="post" class="row g-3" novalidate>
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label">Nombre *</label>
                            <input type="text" class="form-control" name="nombre" value="{{$cliente->cliente_nombre}}">
                            @error('nombre')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Apellidos *</label>
                            <input type="text" class="form-control" name="apellidos" value="{{$cliente->cliente_apellido}}">
                            @error('apellidos')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">DNI *</label>
                            <input type="text" class="form-control" name="dni" value="{{$cliente->cliente_dni}}">
                            @error('dni')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Edad *</label>
                            <input type="number" class="form-control" name="edad" value="{{$cliente->cliente_edad}}">
                            @error('edad')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Correo *</label>
                            <input type="email" class="form-control" name="correo" value="{{$cliente->cliente_correo}}">
                            @error('correo')
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
