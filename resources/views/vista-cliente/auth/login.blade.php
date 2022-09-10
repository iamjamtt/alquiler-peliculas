@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
            <div class="card">
                <div class="card-header fw-bold text-uppercase text-center fs-5">{{ __('Inicie Sesión - Tarjeta') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login-cliente.store') }}">
                        @csrf

                        @if (session('mensaje'))
                            <div class="alert alert-danger mt-1 mb-3">{{ session('mensaje') }}</div>
                        @endif

                        <div class="row mb-3">
                            <label for="tarjeta" class="col-md-3 col-form-label text-md-end">{{ __('Codigo Tarjeta') }}</label>

                            <div class="col-md-9">
                                <input id="tarjeta" type="text" class="form-control @error('tarjeta') is-invalid @enderror" name="tarjeta" value="{{ old('tarjeta') }}" required autocomplete="tarjeta" autofocus>

                                @error('tarjeta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-3 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                            <div class="col-md-9">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary uppercase fw-bold text-uppercase w-100 fs-6">
                                    {{ __('Inicie Sesión') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
