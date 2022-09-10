@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mb-3 mt-2">
                <span class="fw-bold text-uppercase fs-4">
                    Editar Tarjetas
                </span>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('tarjetas.update', $tarjeta->id) }}" method="post" class="row g-3" novalidate>
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="col-md-12">
                            <label class="form-label">Cliente *</label>
                            <select class="form-control" name="cliente">
                                <option value="" selected>Seleccione</option>
                                @foreach ($clientes as $item)
                                <option value="{{$item->id}}" {{$item->id == $tarjeta->cliente_id ? 'selected' : ''}}>{{$item->cliente_nombre}} {{$item->cliente_apellido}}</option>
                                @endforeach
                            </select>
                            @error('cliente')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Numero *</label>
                            <input type="text" class="form-control" name="numero" value="{{$tarjeta->tarjeta_numero}}" readonly>
                            @error('numero')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Codigo *</label>
                            <input type="text" class="form-control" name="codigo" value="{{$tarjeta->tarjeta_codigo}}">
                            @error('codigo')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Monto *</label>
                            <input type="number" class="form-control" name="monto" value="{{$tarjeta->tarjeta_saldo}}">
                            @error('monto')
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
