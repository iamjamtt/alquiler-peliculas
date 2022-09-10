@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="mb-3 mt-2">
                <span class="fw-bold text-uppercase fs-4">
                    Peliculas 
                </span>
            </div>
            <div class="card">
                @if (session('error'))
                    <div class="alert alert-danger m-3 alert-dismissible fade show" role="alert">
                        <strong>{{ session('error') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success m-3 alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-body">
                    <div class="parent">
                        @foreach ($pelicula as $item)
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-6">
                                    <img src="{{asset('img/peliculas/'.$item->pelicula_imagen)}}" class="img-fluid rounded-start h-100" alt="iamegn pelicula">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body align-items-between">
                                        <h4 class="card-title">{{$item->pelicula_descripcion}}</h4>
                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                        @if ($item->tipo_id == 1)
                                        <p class="card-text text-primary fw-bold text-uppercase">{{$item->TipoPelicula->tipo_descripcion}}</p>
                                        @else
                                        <p class="card-text text-success fw-bold text-uppercase">{{$item->TipoPelicula->tipo_descripcion}}</p>
                                        @endif
                                        <h5 class="card-title">S/. {{$item->pelicula_monto}}</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{route('cart-add')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$item->id}}"/>
                                            <button type="submit" class="btn btn-info w-100 fw-bold d-flex align-items-center justify-content-center" @if (count(Cart::getContent())==3) disabled @endif>Agregar al carrito</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection