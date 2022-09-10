@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('mensaje-recarga'))
                <div class="alert alert-success my-3 alert-dismissible fade show" role="alert">
                    <strong>{{ session('mensaje-recarga') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Bienvenido') }} <strong>{{ auth('tarjetas')->user()->cliente->cliente_nombre }}</strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Tu iniciaste sesión!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
