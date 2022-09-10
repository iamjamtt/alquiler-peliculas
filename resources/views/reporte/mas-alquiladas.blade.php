@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-3 mt-2">
                <span class="fw-bold text-uppercase fs-4">
                    Top 3 Peliculas mas alquiladas
                </span>
            </div>
            <div class="my-3">
                <div class="col-md-6 m-auto">
                    <div class="card mb-3">
                        <div class="card-body">
                            <form action="{{ route('reporte-mas-alquiladas-filtro') }}" method="post" class="row g-1" novalidate>
                                @csrf
                                <div class="col-md-12">
                                    <label class="form-label">Fecha</label>
                                    <input class="form-control" type="date" name="fecha" value="{{old('fecha',$fecha)}}" max="{{now()->format('Y-m-d')}}">
                                    @error('fecha')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table  class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Nro</th>
                                <th>Pelicula</th>
                                <th>Duracion</th>
                                <th>Cantidad</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $con=1;
                                @endphp
                                @foreach ($detalle as $item)
                                <tr>
                                    <td>{{ $con }}</td>
                                    <td>{{ $item->pelicula->pelicula_descripcion }}</td>
                                    <td>{{ $item->pelicula->pelicula_duracion->format('g') }} hrs {{ $item->pelicula->pelicula_duracion->format('i') }} min</td>
                                    <td>{{ $item->cantidad }}</td>
                                </tr>
                                @php
                                    $con++;
                                @endphp
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="w-100">
                        <canvas id="myChart" width="400" height="200"></canvas>
                        <script>
                        cData = JSON.parse(`<?php echo $data; ?>`);
                        console.log(cData);
                        const nombre = cData.map(data => data.label);
                        const cantidad = cData.map(data => data.data);
                        console.log(nombre);
                        console.log(cantidad);
                        const ctx = document.getElementById('myChart').getContext('2d');
                        const myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: nombre,
                                datasets: [{
                                    label: 'Cantidad de Peliculas alquiladas',
                                    data: cantidad,
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.7)',
                                        'rgba(54, 162, 235, 0.7)',
                                        'rgba(54, 102, 205, 0.7)',
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
