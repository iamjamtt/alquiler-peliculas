@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mb-3 mt-2">
                <span class="fw-bold text-uppercase fs-4">
                    Recarga
                </span>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('cliente-recarga') }}" method="post" class="row g-3 formulario" onsubmit="return recargar(this)" novalidate>
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label">Tarjerta</label>
                            <input type="text" class="form-control" value="{{auth('tarjetas')->user()->tarjeta_numero}}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">DNI</label>
                            <input type="text" class="form-control" value="{{auth('tarjetas')->user()->cliente->cliente_dni}}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Propietario</label>
                            <input type="text" class="form-control" value="{{auth('tarjetas')->user()->cliente->cliente_nombre}} {{auth('tarjetas')->user()->cliente->cliente_apellido}}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Monto</label>
                            <input type="text" class="form-control" value="{{auth('tarjetas')->user()->tarjeta_saldo}}" disabled>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Monto a recargar</label>
                            <input type="number" class="form-control" name="monto" value="{{old('monto')}}">
                            @error('monto')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="hidden" name="id" value="{{auth('tarjetas')->user()->id}}">
                        <input type="hidden" name="saldo_antiguo" value="{{auth('tarjetas')->user()->tarjeta_saldo}}">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary w-100 recargar">Recargar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function recargar(form){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Recarga exitosa!',
            showConfirmButton: false,
            timer: 700
        });
        form.submit();
    };
</script>
@endsection
