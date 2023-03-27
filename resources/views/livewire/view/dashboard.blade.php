@php
use App\Models\Ot;
use App\Models\Tikect;
use App\Models\Estado;

/*
Logica para calcular el porcentaje de inversion por cada estado
*/
$porList = Ot::select(DB::raw("sum(costo_preCli) as totales"), DB::raw("estado as estados"), DB::raw("color as colores"))
            ->where('tipoMantenimiento', 'MC')
            ->where('statusOts', 5)
            ->orderBy('estados', 'asc')
            ->groupBy(DB::raw("estado, color"))
            ->get();
$colores = $porList->pluck('colores');
$estados = $porList->pluck('estados');
$valores = $porList->pluck('totales');

/*
Logica para calcular el Nro. de tikects creados por estado
*/
$tikectList = Tikect::select(DB::raw("count(*) as tikects"), DB::raw("estado as estados"), DB::raw("color as colores"))
            ->orderBy('estados', 'asc')
            ->groupBy(DB::raw("estado, color"))
            ->get();
$colorTi = $tikectList->pluck('colores');
$estTi = $tikectList->pluck('estados');
$tikects = $tikectList->pluck('tikects');

/*
Logica para calcular el Nro. de Ots cerradas por estado
*/
$otsList = Ot::select(DB::raw("count(*) as ots"), DB::raw("estado as estados"), DB::raw("color as colores"))
            ->where('statusOts', 5)
            ->orderBy('estados', 'asc')
            ->groupBy(DB::raw("estado, color"))
            ->get();
$colorOts = $otsList->pluck('colores');
$estOts = $otsList->pluck('estados');
$ots = $otsList->pluck('ots');
// dd($otsList);

$estados = Estado::select(DB::raw("descripcion as estados"))
            ->orderBy('estados', 'asc')
            ->get();
$listaEstados = $estados->pluck('estados');


@endphp
<x-app-layout>

    <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-4 mt-8">
        {{-- TOTAL INVERSION --}}
        <div class="p-2">
            <div class="flex-auto shadow-[0_2.8px_2.2px_rgba(0,_0,_0,_0.034),_0_6.7px_5.3px_rgba(0,_0,_0,_0.048),_0_12.5px_10px_rgba(0,_0,_0,_0.06),_0_22.3px_17.9px_rgba(0,_0,_0,_0.072),_0_41.8px_33.4px_rgba(0,_0,_0,_0.086),_0_100px_80px_rgba(0,_0,_0,_0.12)] bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-lg p-4 max-w-72 w-full h-auto" style="cursor: auto;">
                <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                            <p class="mb-0 font-sans font-bold leading-normal uppercase dark:text-white dark:opacity-60 text-2xl">TOTAL</p>
                            <p class="mb-0 font-sans font-sm leading-normal dark:text-white dark:opacity-60 text-sm">Inversion($) - Ordenes de trabajo Finalizadas</p>
                            <x-inversion />
                            
                        </div>
                    </div>
                    <x-ots_generadas />
                </div>
            </div>
        </div>
        {{-- TIKECT GENERADOS --}}
        <div class="p-2">
            <div class="flex-auto shadow-[0_2.8px_2.2px_rgba(0,_0,_0,_0.034),_0_6.7px_5.3px_rgba(0,_0,_0,_0.048),_0_12.5px_10px_rgba(0,_0,_0,_0.06),_0_22.3px_17.9px_rgba(0,_0,_0,_0.072),_0_41.8px_33.4px_rgba(0,_0,_0,_0.086),_0_100px_80px_rgba(0,_0,_0,_0.12)] bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-lg p-4 max-w-72 w-full h-auto" style="cursor: auto;">
                <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                            <p class="mb-0 font-sans font-bold leading-normal uppercase dark:text-white dark:opacity-60 text-2xl">TOTAL</p>
                            <p class="mb-0 font-sans font-sm leading-normal dark:text-white dark:opacity-60 text-sm">Tikects<br>Abiertos</p>
                            <x-porcen_tikects_abiertos />
                            
                        </div>
                    </div>
                    <x-tikects_abiertos />
                    
                </div>
            </div>
        </div>
        {{-- TIKECTS CERRADOS --}}
        <div class="p-2">
            <div class="flex-auto shadow-[0_2.8px_2.2px_rgba(0,_0,_0,_0.034),_0_6.7px_5.3px_rgba(0,_0,_0,_0.048),_0_12.5px_10px_rgba(0,_0,_0,_0.06),_0_22.3px_17.9px_rgba(0,_0,_0,_0.072),_0_41.8px_33.4px_rgba(0,_0,_0,_0.086),_0_100px_80px_rgba(0,_0,_0,_0.12)] bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-lg p-4 max-w-72 w-full h-auto" style="cursor: auto;">
                <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                            <p class="mb-0 font-sans font-bold leading-normal uppercase dark:text-white dark:opacity-60 text-2xl">TOTAL</p>
                            <p class="mb-0 font-sans font-sm leading-normal dark:text-white dark:opacity-60 text-sm">Tikects<br>Cerrados</p>
                            <x-porcen_tikects_cerrados />

                        </div>
                    </div>
                    <x-tikects_cerrados />
                </div>
            </div>
        </div>
        {{-- ORDENES DE TRABAJO CERRADAS --}}
        <div class="p-2">
            <div class="flex-auto shadow-[0_2.8px_2.2px_rgba(0,_0,_0,_0.034),_0_6.7px_5.3px_rgba(0,_0,_0,_0.048),_0_12.5px_10px_rgba(0,_0,_0,_0.06),_0_22.3px_17.9px_rgba(0,_0,_0,_0.072),_0_41.8px_33.4px_rgba(0,_0,_0,_0.086),_0_100px_80px_rgba(0,_0,_0,_0.12)] bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-lg p-4 max-w-72 w-full h-auto" style="cursor: auto;">
                <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                            <p class="mb-0 font-sans font-bold leading-normal uppercase dark:text-white dark:opacity-60 text-2xl">TOTAL</p>
                            <p class="mb-0 font-sans font-sm leading-normal dark:text-white dark:opacity-60 text-sm">Ordenes de Trabajo Finalizadas</p>
                            <x-porcen_ots_cerradas />

                        </div>
                    </div>
                    <x-ots_generadas />
                </div>
            </div>
        </div>
        {{-- ORDENES DE TRABAJO EN EJECUCION --}}
        <div class="p-2">
            <div class="flex-auto shadow-[0_2.8px_2.2px_rgba(0,_0,_0,_0.034),_0_6.7px_5.3px_rgba(0,_0,_0,_0.048),_0_12.5px_10px_rgba(0,_0,_0,_0.06),_0_22.3px_17.9px_rgba(0,_0,_0,_0.072),_0_41.8px_33.4px_rgba(0,_0,_0,_0.086),_0_100px_80px_rgba(0,_0,_0,_0.12)] bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-lg p-4 max-w-72 w-full h-auto" style="cursor: auto;">
                <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                            <p class="mb-0 font-sans font-bold leading-normal uppercase dark:text-white dark:opacity-60 text-2xl">TOTAL</p>
                            <p class="mb-0 font-sans font-sm leading-normal dark:text-white dark:opacity-60 text-sm">Ordenes de Trabajo en Ejecucion</p>
                            <x-porcen_ots_cerradas />
                            {{-- <p class="mb-0 dark:text-white dark:opacity-60">
                            <span class="font-bold leading-normal text-sm text-emerald-500">+55%</span>
                            since yesterday
                            </p> --}}
                        </div>
                    </div>
                    <x-ots_generadas />
                </div>
            </div>
        </div>
    </div>

    <div class="grafico-dona grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 mt-8">
        <div class="p-2 shadow-[rgba(13,_38,_76,_0.19)_0px_9px_20px] border border-gray-200  rounded-lg">
            <div class="flex flex-col items-center my-1 md:p-8 md:w-2/3 md:mx-32 min-[420px]:w-full min-[420px]:mx-0 min-[420px]:p-4">
                <p class="mb-0 font-sans font-bold leading-normal dark:text-white dark:opacity-60 text-2xl text-center">Inversion por estados</p>
                <canvas id="myChart2"></canvas>
                
            </div>
        </div>
        <div class="grafico-dona-leyenda p-2 shadow-[rgba(13,_38,_76,_0.19)_0px_9px_20px] border border-gray-200  rounded-lg">
            <div class="flex-none w-full px-3 my-8">
                <p class="mb-0 font-sans font-bold leading-normal dark:text-white dark:opacity-60 text-2xl text-center">Inversion($) Vs Porcentaje por estado</p>
                @livewire('view.tabla-leyenda')
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 mt-8">
        <div class="p-2 shadow-[rgba(13,_38,_76,_0.19)_0px_9px_20px] border border-gray-200  rounded-lg">
            {{-- Grafico de Barras 1 --}}
            <p class=" mt-4 mb-0 font-sans font-bold leading-normal dark:text-white dark:opacity-60 text-2xl text-center">Tickets creados por estado</p>
            <canvas id="myChart3" style="padding: 30px"></canvas>
            <article class="rounded-xl p-4 -mt-5">
                <ul class="">
                    <li>
                        <a href="#" class="block h-full rounded-lg border border-gray-200 p-4 hover:border-check-blue">
                            <strong class="font-medium text-black">Tickets creados</strong>
                            <p class="mt-1 text-xs font-medium text-gray-800">
                            Este grafico muestra la cantidad de ticket que han sido creados hasta la fecha.
                            </p>
                        </a>
                    </li>
                </ul>
            </article> 
        </div>
        
        <div class="p-2 shadow-[rgba(13,_38,_76,_0.19)_0px_9px_20px] border border-gray-200  rounded-lg">
            <div class="flex flex-col md:items-center my-1 min-[420px]:w-full min-[420px]:mx-0 min-[420px]:p-4">
                <p class="mb-0 font-sans font-bold leading-normal dark:text-white dark:opacity-60 text-2xl text-center">Ordenes de trabajo</p>
                <article class="rounded-xl p-8">
                    {{-- Grafico de Torta 2 --}}
                    <div class="flex justify-center items-center gap-4 md:w-8/12 md:mx-10 min-[420px]:w-full min-[420px]:mx-0 min-[420px]:p-4">
                        
                        <canvas id="myChart4" ></canvas> 
                            <div class="flex flex-wrap mt-0 -mx-3">
                                <div class="flex-none w-full max-w-full py-4 pl-0 pr-3 mt-0">
                                    @foreach ($otsList as $item)
                                    <div class="flex w-24 mb-2 ml-3">
                                        <div class="flex items-center justify-center w-5 h-5 mr-2 text-center bg-center rounded fill-current shadow-soft-2xl" style="background-color:{{ $item->colores }}">
                                            <svg width="60px" height="60px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            </svg>
                                        </div>
                                        <p class="mt-1 mb-0 font-xs leading-tight text-xs dark:opacity-60">{{ $item->estados }}: {{ $item->ots }}</p>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                    </div>
                    <ul class="mt-4 space-y-2">
                      <li>
                        <a href="#" class="block h-full rounded-lg border border-gray-200 p-4 hover:border-pink-600">
                          <strong class="font-medium text-black">Ordenes de trabajo</strong>
                          <p class="mt-1 text-xs font-medium text-gray-800">
                            Este grafico muestra la cantidad de ordenes de trabajo en estatus FINALIZADA por cada estado.
                          </p>
                        </a>
                      </li>
                    </ul>
                  </article>      
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mb-4 mt-8">
        <div class="p-2 shadow-[rgba(13,_38,_76,_0.19)_0px_9px_20px] border border-gray-200  rounded-lg min-[420px]:w-full min-[420px]:mx-0 min-[420px]:p-4">
            {{-- Grafico de barras 2 --}}
            <canvas id="myChart5" style="padding: 5% 10%"></canvas>
            <article class="rounded-xl p-4">
                <ul class="">
                    <li>
                        <a href="#" class="block h-full rounded-lg border border-gray-200 p-4 hover:border-check-blue">
                            <strong class="font-medium text-black">Tickets creados</strong>
                            <p class="mt-1 text-xs font-medium text-gray-800">
                            Este grafico muestra la cantidad de ticket que han sido creados hasta la fecha.
                            </p>
                        </a>
                    </li>
                </ul>
            </article>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script type="text/javascript">

        // Grafico de Dona
        var estados = @json($estados);
        var valores = @json($valores);
        var colores = @json($colores);
        const data = {
            // labels: estados,
            datasets: [{
                label: 'Inversion($)',
                data: valores,
                backgroundColor: colores,
                hoverOffset: 10
            }]
        };
        const config = {
            type: 'doughnut',
            data: data,
            // options: {}
        };
        new Chart(
            document.getElementById('myChart2'),
            config
        );

        // Grafico de barras
        var estTi = @json($estTi);
        var tikects = @json($tikects);
        var colorTi = @json($colorTi);
        console.log(colorTi);
        const labelsBar = estTi;
        const dataBar = {
        labels: labelsBar,
            datasets: [{
                data: tikects,
                backgroundColor: colorTi,
                borderColor: colorTi,
                borderWidth: 1
            }]
        };
        const configBar = {
            type: 'bar',
            data: dataBar,
                options: {
                    indexAxis: 'x',
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
        };
        new Chart(
            document.getElementById('myChart3'),
            configBar
        );

        // Grafico de torta
        var estOts = @json($estOts);
        var ots = @json($ots);
        var colorOts = @json($colorOts);
        const dataTorta = {
            // labels: estOts,
                data: ots,
            datasets: [{
                label: 'Ots Cerradas',
                data: ots,
                backgroundColor: colorOts,
                hoverOffset: 30
            }]
        };
        const configTorta = {
            type: 'pie',
            data: dataTorta,
            options: {
                plugins: {
                    legend: {
                        position: 'right',
                    }
                }

            }

        };
        new Chart(
            document.getElementById('myChart4'),
            configTorta
        );

        // Grafico Unido
        var estadosUnion = @json($listaEstados);
        var tikectsUnion = @json($tikects);
        var colorTiUnion = @json($colorTi);
        const labelsEstados = estadosUnion;
        const dataUnion = {
                labels: ['Amazonas', 'Bolivar', 'Distrito Capital', 'Merida', 'Monagas', 'Trujillo'],
                    datasets: [
                        {
                        type: 'bar',
                        label: 'Bar Dataset',
                        data: [5,1,2,1,8,9],
                        borderColor: 'rgb(255, 99, 132)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)'
                    }, {
                        type: 'line',
                        label: 'Line Dataset',
                        data: [2,1,3,1,2,7],
                        fill: false,
                        borderColor: 'rgb(54, 162, 235)'
                    }
                ]
            };
        const configBarUnion = {
            type: 'scatter',
            data: dataUnion,
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Custom Chart Title'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
            }
        };
        new Chart(
            document.getElementById('myChart5'),
            configBarUnion
        );

    </script>

</x-app-layout>

