@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-3 mt-2">
                <span class="fw-bold text-uppercase fs-4">
                    Carrito
                </span>
            </div>
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success m-3 alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-body">
                    @if (count(Cart::getContent()) > 0)
                    <table  class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th>ID</th>
                                <th>Pelicula</th>
                                <th>Precio</th>
                                {{-- <th>Cantidad</th> --}}
                                <th>Imagen</th>
                                <th>Accion</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::getContent() as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>S/. {{ number_format($item->price,2)  }}</td>
                                    {{-- <td>{{ $item->quantity }}</td> --}}
                                    <td><img src="{{ asset('img/peliculas/'.$item->attributes->urlfoto) }}" alt="imagen pelicula" width="50px"></td>
                                    <td>
                                        <form action="{{route('cart-removeitem')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$item->id}}"/>
                                            <button type="submit" class="btn btn-danger d-flex align-items-center justify-content-center">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                    <div class="text-end mb-2">
                        <span class="fw-bold text-uppercase fs-5">
                            Total: S/. {{ number_format(Cart::getTotal(),2) }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-around align-items-center col-md-12">
                        <form action="{{route('cart-clear')}}" method="post" class="col-6">
                            @csrf
                            <button type="submit" class="btn btn-danger col-10">Limpiar Carrito</button>
                        </form>
                        <a class="btn btn-primary col-5" href="{{ route('cliente-alquiler') }}">Alquilar</a>
                    </div>
                    @else
                    <table  class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Carrito Vacio</th>
                            </tr>
                        </thead>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
