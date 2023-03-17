@php
use App\Models\Ot;
use App\Models\Tikect;

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

@endphp
<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
    </h2>
    </x-slot> --}}

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                   
            </div>
        </div>
    </div> --}}
    <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-4 mt-8">
        {{-- TOTAL INVERSION --}}
        <div class="p-2">
            <div class="flex-auto shadow-[0_2.8px_2.2px_rgba(0,_0,_0,_0.034),_0_6.7px_5.3px_rgba(0,_0,_0,_0.048),_0_12.5px_10px_rgba(0,_0,_0,_0.06),_0_22.3px_17.9px_rgba(0,_0,_0,_0.072),_0_41.8px_33.4px_rgba(0,_0,_0,_0.086),_0_100px_80px_rgba(0,_0,_0,_0.12)] bg-gradient-to-r from-sky-400 to-cyan-300 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-lg p-4 max-w-72 w-full h-auto" style="cursor: auto;">
                <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                            <p class="mb-0 font-sans font-bold leading-normal uppercase dark:text-white dark:opacity-60 text-2xl">TOTAL</p>
                            <p class="mb-0 font-sans font-sm leading-normal dark:text-white dark:opacity-60 text-sm">Inversion($) - Ordenes de trabajo Finalizadas</p>
                            <x-inversion />
                            <p class="mb-0 dark:text-white dark:opacity-60">
                            <span class="font-bold leading-normal text-sm text-emerald-500">+55%</span>
                            since yesterday
                            </p>
                        </div>
                    </div>
                    <x-ots_generadas />
                </div>
            </div>
        </div>
        {{-- TIKECT GENERADOS --}}
        <div class="p-2">
            <div class="flex-auto shadow-[0_2.8px_2.2px_rgba(0,_0,_0,_0.034),_0_6.7px_5.3px_rgba(0,_0,_0,_0.048),_0_12.5px_10px_rgba(0,_0,_0,_0.06),_0_22.3px_17.9px_rgba(0,_0,_0,_0.072),_0_41.8px_33.4px_rgba(0,_0,_0,_0.086),_0_100px_80px_rgba(0,_0,_0,_0.12)] bg-gradient-to-r from-sky-400 to-cyan-300 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-lg p-4 max-w-72 w-full h-auto" style="cursor: auto;">
                <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                            <p class="mb-0 font-sans font-bold leading-normal uppercase dark:text-white dark:opacity-60 text-2xl">TOTAL</p>
                            <p class="mb-0 font-sans font-sm leading-normal dark:text-white dark:opacity-60 text-sm">Tikects<br>Abiertos</p>
                            <x-porcen_tikects_abiertos />
                            <p class="mb-0 dark:text-white dark:opacity-60">
                            <span class="font-bold leading-normal text-sm text-emerald-500">+55%</span>
                            since yesterday
                            </p>
                        </div>
                    </div>
                    <x-tikects_abiertos />
                    
                </div>
            </div>
        </div>
        {{-- <div class="p-2">  
            <div class="flex-auto p-4 shadow-[0_2.8px_2.2px_rgba(0,_0,_0,_0.034),_0_6.7px_5.3px_rgba(0,_0,_0,_0.048),_0_12.5px_10px_rgba(0,_0,_0,_0.06),_0_22.3px_17.9px_rgba(0,_0,_0,_0.072),_0_41.8px_33.4px_rgba(0,_0,_0,_0.086),_0_100px_80px_rgba(0,_0,_0,_0.12)] bg-gradient-to-r from-sky-400 to-cyan-300 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-lg max-w-72 w-full h-auto" 
            style="
            background-image: url('https://images.unsplash.com/photo-1578836537282-3171d77f8632?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80');
            background-repeat: no-repat;
            background-size: cover;
            background-blend-mode: multiply;
            ">
                <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                            <p class="mb-0 font-sans font-semibold leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Today's Money</p>
                            <h5 class="mb-2 font-bold dark:text-white">$53,000</h5>
                            <p class="mb-0 dark:text-white dark:opacity-60">
                            <span class="font-bold leading-normal text-sm text-emerald-500">+55%</span>
                            since yesterday
                            </p>
                        </div>
                    </div>
                    
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-1/4 h-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                          </svg>
                          
                    
                </div>
            </div>
        </div> --}}
        {{-- TIKECTS CERRADOS --}}
        <div class="p-2">
            <div class="flex-auto shadow-[0_2.8px_2.2px_rgba(0,_0,_0,_0.034),_0_6.7px_5.3px_rgba(0,_0,_0,_0.048),_0_12.5px_10px_rgba(0,_0,_0,_0.06),_0_22.3px_17.9px_rgba(0,_0,_0,_0.072),_0_41.8px_33.4px_rgba(0,_0,_0,_0.086),_0_100px_80px_rgba(0,_0,_0,_0.12)] bg-gradient-to-r from-sky-400 to-cyan-300 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-lg p-4 max-w-72 w-full h-auto" style="cursor: auto;">
                <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                            <p class="mb-0 font-sans font-bold leading-normal uppercase dark:text-white dark:opacity-60 text-2xl">TOTAL</p>
                            <p class="mb-0 font-sans font-sm leading-normal dark:text-white dark:opacity-60 text-sm">Tikects<br>Cerrados</p>
                            <x-porcen_tikects_cerrados />
                            <p class="mb-0 dark:text-white dark:opacity-60">
                            <span class="font-bold leading-normal text-sm text-emerald-500">+55%</span>
                            since yesterday
                            </p>
                        </div>
                    </div>
                    <x-tikects_cerrados />
                </div>
            </div>
        </div>
        {{-- ORDENES DE TRABAJO CERRADAS --}}
        <div class="p-2">
            <div class="flex-auto shadow-[0_2.8px_2.2px_rgba(0,_0,_0,_0.034),_0_6.7px_5.3px_rgba(0,_0,_0,_0.048),_0_12.5px_10px_rgba(0,_0,_0,_0.06),_0_22.3px_17.9px_rgba(0,_0,_0,_0.072),_0_41.8px_33.4px_rgba(0,_0,_0,_0.086),_0_100px_80px_rgba(0,_0,_0,_0.12)] bg-gradient-to-r from-sky-400 to-cyan-300 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-lg p-4 max-w-72 w-full h-auto" style="cursor: auto;">
                <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                            <p class="mb-0 font-sans font-bold leading-normal uppercase dark:text-white dark:opacity-60 text-2xl">TOTAL</p>
                            <p class="mb-0 font-sans font-sm leading-normal dark:text-white dark:opacity-60 text-sm">Ordenes de Trabajo Finalizadas</p>
                            <x-porcen_ots_cerradas />
                            <p class="mb-0 dark:text-white dark:opacity-60">
                            <span class="font-bold leading-normal text-sm text-emerald-500">+55%</span>
                            since yesterday
                            </p>
                        </div>
                    </div>
                    <x-ots_generadas />
                </div>
            </div>
        </div>
        {{-- ORDENES DE TRABAJO EN EJECUCION --}}
        <div class="p-2">
            <div class="flex-auto shadow-[0_2.8px_2.2px_rgba(0,_0,_0,_0.034),_0_6.7px_5.3px_rgba(0,_0,_0,_0.048),_0_12.5px_10px_rgba(0,_0,_0,_0.06),_0_22.3px_17.9px_rgba(0,_0,_0,_0.072),_0_41.8px_33.4px_rgba(0,_0,_0,_0.086),_0_100px_80px_rgba(0,_0,_0,_0.12)] bg-gradient-to-r from-sky-400 to-cyan-300 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-lg p-4 max-w-72 w-full h-auto" style="cursor: auto;">
                <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                            <p class="mb-0 font-sans font-bold leading-normal uppercase dark:text-white dark:opacity-60 text-2xl">TOTAL</p>
                            <p class="mb-0 font-sans font-sm leading-normal dark:text-white dark:opacity-60 text-sm">Ordenes de Trabajo en Ejecucion</p>
                            <x-porcen_ots_cerradas />
                            <p class="mb-0 dark:text-white dark:opacity-60">
                            <span class="font-bold leading-normal text-sm text-emerald-500">+55%</span>
                            since yesterday
                            </p>
                        </div>
                    </div>
                    <x-ots_generadas />
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 mt-8">
        <div class="flex flex-col p-8 w-2/3 mx-32 items-center my-1">
            <p class="mb-0 font-sans font-bold leading-normal uppercase dark:text-white dark:opacity-60 text-2xl text-center">Inversion por Estados</p>
            <canvas id="myChart2"></canvas> 
        </div>
        <div class="flex-none w-full px-3 my-8">
            <p class="mb-0 font-sans font-bold leading-normal uppercase dark:text-white dark:opacity-60 text-2xl text-center">Detalle</p>
            @livewire('view.tabla-leyenda')
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 mt-8">
        <div class="flex flex-col p-14 w-full h-auto items-center my-1">
            <p class="font-sans font-bold leading-normal uppercase dark:text-white dark:opacity-60 text-2xl text-center mb-6">Top Tikects</p>
            <canvas id="myChart3"></canvas> 
        </div>
        <div class="flex flex-col p-14 w-2/3 mx-24 items-center my-1">
            <p class="mb-0 font-sans font-bold leading-normal uppercase dark:text-white dark:opacity-60 text-2xl text-center">Top Ordenes de Trabajo</p>
            <canvas id="myChart4" ></canvas> 
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
                label: 'Tikects Creados',
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
                    indexAxis: 'y',
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
            labels: estOts,
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
    </script>

</x-app-layout>

