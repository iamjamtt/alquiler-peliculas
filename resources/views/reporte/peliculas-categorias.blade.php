@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-3 mt-2">
                <span class="fw-bold text-uppercase fs-4">
                    Peliculas por tipo de pelicula
                </span>
            </div>
            <div class="card3">
                <div class="card-body">
                    <div class="w-100">
                        <canvas id="myChart" width="400" height="300"></canvas>
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
                                    label: 'Cantidad de Peliculas alquiladas por tipo de pelicula',
                                    data: cantidad,
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.7)',
                                        'rgba(54, 162, 235, 0.7)',
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

<script>
</script>
@endsection