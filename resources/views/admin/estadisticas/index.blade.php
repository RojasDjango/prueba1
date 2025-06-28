@extends('tablar::page')
@section('title', 'capacitaciones/index')

@section('content')

<div class="row row-cards">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Mi Cumplimiento de Actividades</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div id="container-summary" style="min-width: 310px; height: 400px; margin: 0 auto;"></div>
                    </div>
                    <div class="col-md-6">
                        <div id="container-detailed" style="min-width: 310px; height: 400px; margin: 0 auto;"></div>
                    </div>
                </div>
                
                <div class="mt-4">
                    <h4>Resumen Estadístico:</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Actividad</th>
                                    <th>Cumplidas</th>
                                    <th>No Cumplidas</th>
                                    <th>Porcentaje</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $value)
                                <tr>
                                    <td>{{ ucfirst(str_replace('_', ' ', $key)) }}</td>
                                    <td>{{ $value }}</td>
                                    <td>{{ $actividadesCount - $value }}</td>
                                    <td>{{ round($value/$actividadesCount*100, 1) }}%</td>
                                </tr>
                                @endforeach
                                <tr class="table-primary">
                                    <td><strong>Total General</strong></td>
                                    <td><strong>{{ $totalCumple }}</strong></td>
                                    <td><strong>{{ $totalNoCumple }}</strong></td>
                                    <td><strong>{{ round($totalCumple/($totalCumple+$totalNoCumple)*100, 1) }}%</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





    {{-- <div class="row row-cards">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto; border: 2px solid red;"></div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@section('tablar_js')
@parent

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        try {
            // Gráfico resumen (cumple vs no cumple)
            Highcharts.chart('container-summary', {
                chart: {
                    type: 'pie',
                    backgroundColor: 'transparent'
                },
                title: {
                    text: 'Resumen de Cumplimiento',
                    style: {
                        fontSize: '16px',
                        fontWeight: 'bold'
                    }
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.y} ({point.percentage:.1f}%)</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f}%',
                            distance: -30,
                            style: {
                                fontWeight: 'bold',
                                color: '#fff'
                            }
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Actividades',
                    colorByPoint: true,
                    data: [
                        {
                            name: 'Cumplidas',
                            y: {{ $totalCumple }},
                            color: '#4CAF50'
                        }, 
                        {
                            name: 'No Cumplidas',
                            y: {{ $totalNoCumple }},
                            color: '#F44336'
                        }
                    ]
                }],
                credits: {
                    enabled: false
                }
            });

            // Gráfico detallado por tipo de actividad
            Highcharts.chart('container-detailed', {
                chart: {
                    type: 'column',
                    backgroundColor: 'transparent'
                },
                title: {
                    text: 'Cumplimiento por Actividad',
                    style: {
                        fontSize: '16px',
                        fontWeight: 'bold'
                    }
                },
                xAxis: {
                    type: 'category',
                    labels: {
                        rotation: -45,
                        style: {
                            fontSize: '12px'
                        }
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad de Cumplimientos'
                    }
                },
                legend: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: 'Cumplidas: <b>{point.y}</b>'
                },
                series: [{
                    name: 'Actividades',
                    colorByPoint: true,
                    data: [
                        @foreach($data as $key => $value)
                        {
                            name: '{{ ucfirst(str_replace('_', ' ', $key)) }}',
                            y: {{ $value }},
                            color: Highcharts.getOptions().colors[{{ $loop->index }}]
                        },
                        @endforeach
                    ]
                }],
                credits: {
                    enabled: false
                }
            });

            console.log("Gráficos creados con éxito");
        } catch (error) {
            console.error("Error al crear gráficos:", error);
        }
    });
</script>





{{-- <script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    // Esperar a que todo esté listo
    document.addEventListener('DOMContentLoaded', function() {
        // Crear gráfico circular
        try {
            Highcharts.chart('container', {
                chart: {
                    type: 'pie',
                    backgroundColor: '#f0f0f0' // Fondo gris claro
                },
                title: {
                    text: 'CUMPLIMIENTO A SUS ACTIVIDADES PARA EL PARTIDO'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                            style: {
                                color: '#000000' // Texto negro
                            }
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Porcentaje',
                    colorByPoint: true,
                    data: [{
                        name: 'Cumple',
                        y: {{ $totalCumple }},
                        color: '#3366ff' // Azul
                    }, {
                        name: 'No Cumple',
                        y: {{ $totalNoCumple }},
                        color: '#fafafc' // blanco
                    }
                    // , {
                    //     name: 'X',
                    //     y: 1,
                    //     color: '#33cc33' // Verde
                    // }, {
                    //     name: 'Kick',
                    //     y: 1,
                    //     color: '#cc33ff' // Morado
                    // },{
                    //     name: 'Evto_1',
                    //     y: 1,
                    //     color: '#ff3333' // Rojo
                    // },{
                    //     name: 'Evto_2',
                    //     y: 1,
                    //     color: '#ffe433' // Amarrillo
                    // },{
                    //     name: 'Evto_3',
                    //     y: 1,
                    //     color: '#33ddff' // Celeste
                    // },{
                    //     name: 'Evto_4',
                    //     y: 1,
                    //     color: '#ff3333' // Naranja
                    // },{
                    //     name: 'Evto_5',
                    //     y: 1,
                    //     color: '#99ff33' // medio verde
                    // }
                ]
                }],
                credits: {
                    enabled: false
                }
            });
            
            console.log("Gráfico circular creado con éxito");
        } catch (error) {
            console.error("Error al crear gráfico:", error);
        }
    });
</script> --}}
@endsection