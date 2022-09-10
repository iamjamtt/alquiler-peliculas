@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="mb-3 mt-2">
                <span class="fw-bold text-uppercase fs-4">
                    PERFIL 
                </span>
            </div>
            <div class="card">
                <div class="card-body">
                    <form class="row g-3 formulario" novalidate>
                        @csrf
                        <div class="col-md-12">
                            <label class="form-label">Tarjerta</label>
                            <input type="text" class="form-control" value="{{auth('tarjetas')->user()->tarjeta_numero}}" disabled>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">DNI</label>
                            <input type="text" class="form-control" value="{{auth('tarjetas')->user()->cliente->cliente_dni}}" disabled>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Propietario</label>
                            <input type="text" class="form-control" value="{{auth('tarjetas')->user()->cliente->cliente_nombre}} {{auth('tarjetas')->user()->cliente->cliente_apellido}}" disabled>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Saldo</label>
                            <input type="text" class="form-control" value="{{auth('tarjetas')->user()->tarjeta_saldo}}" disabled>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection