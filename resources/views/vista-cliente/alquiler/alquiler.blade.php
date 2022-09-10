@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="mb-3 mt-2">
                <span class="fw-bold text-uppercase fs-4">
                    Alquilar 
                </span>
            </div>
            
            @if (session('error'))
                <div class="alert alert-danger my-3 alert-dismissible fade show" role="alert">
                    <strong>{{ session('error') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('cliente-alquiler-store') }}" method="post" class="row g-2 formulario" novalidate>
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
                            <label class="form-label">Saldo</label>
                            <input type="text" class="form-control" value="{{auth('tarjetas')->user()->tarjeta_saldo}}" disabled>
                        </div>
                        <input type="hidden" name="tarjeta_id" value="{{auth('tarjetas')->user()->id}}">
                        @if (count(Cart::getContent()) > 0)
                        <div class="">
                            <table  class="table table-striped table-inverse table-responsive">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>ID</th>
                                        <th>Pelicula</th>
                                        <th>Precio</th>
                                        <th>Imagen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Cart::getContent() as $item)
                                    <tr>
                                        <td>
                                            {{ $item->id }}
                                            <input type="hidden" name="pelicula_id[]" value="{{ $item->id }}">
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>S/. {{ number_format($item->price,2)  }}</td>
                                        <td><img src="{{ asset('img/peliculas/'.$item->attributes->urlfoto) }}" alt="imagen pelicula" width="50px"></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="text-end mb-2">
                            <span class="fw-bold text-uppercase fs-5">
                                Total: S/. {{ number_format(Cart::getTotal(),2) }}
                                <input type="hidden" name="total" value="{{Cart::getTotal()}}">
                            </span>
                        </div>
                        @endif
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success col-12">Alquilar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection