@php
use App\Models\Ot;
use App\Models\Tikect;
$rrr = [];
$datosOts = Ot::all(['costo_preCli'])->toArray();
$count = count($datosOts);
for ($i=0; $i < $count; $i++) { 
    $rrr[] = $datosOts[$i]['costo_preCli'];
}
$res = [30,40,45,50,49,60,70,91,125];
$r = 4;


// Prueba grafico de torta

$ti23 = Tikect::select(DB::raw("COUNT(*) as totales"), DB::raw("estado as estados"))
                    ->groupBy(DB::raw("estado"))->get();
$ti2 = Tikect::select(DB::raw("COUNT(*) as totales"), DB::raw("estado as estados"))
                    ->groupBy(DB::raw("estado"))
                    ->pluck('totales', 'estados');
                    // dd($ti2, $ti23);
    $labels4 = $ti2->keys();
    $data4 = $ti2->values();
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

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4 mt-8">
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
                    <div class="px-3 text-right basis-1/3">
                        5.596
                    </div>
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
                            <p class="mb-0 font-sans font-sm leading-normal dark:text-white dark:opacity-60 text-sm">Tikects Abiertos</p>
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
                            <p class="mb-0 font-sans font-sm leading-normal dark:text-white dark:opacity-60 text-sm">Tikects Cerrados</p>
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
                            <p class="mb-0 font-sans font-sm leading-normal dark:text-white dark:opacity-60 text-sm">Ordenes de Trabajo Cerradas</p>
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
        <div class="flex p-2 w-1/2 h-auto">
                <canvas id="myChart2" style="display: block; box-sizing: border-box; height: auto; width: 55%;"></canvas>
                <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                        <p class="mb-0 font-sans font-bold leading-normal uppercase dark:text-white dark:opacity-60 text-2xl">TOTAL</p>
                        <p class="mb-0 font-sans font-sm leading-normal dark:text-white dark:opacity-60 text-sm">Ordenes de Trabajo Cerradas</p>
                        <x-porcen_ots_cerradas />
                        <p class="mb-0 dark:text-white dark:opacity-60">
                        <span class="font-bold leading-normal text-sm text-emerald-500">+55%</span>
                        since yesterday
                        </p>
                        <p class="mb-0 font-sans font-bold leading-normal uppercase dark:text-white dark:opacity-60 text-2xl">TOTAL</p>
                        <p class="mb-0 font-sans font-sm leading-normal dark:text-white dark:opacity-60 text-sm">Ordenes de Trabajo Cerradas</p>
                        <x-porcen_ots_cerradas />
                        <p class="mb-0 dark:text-white dark:opacity-60">
                        <span class="font-bold leading-normal text-sm text-emerald-500">+55%</span>
                        since yesterday
                        </p>
                        <p class="mb-0 font-sans font-bold leading-normal uppercase dark:text-white dark:opacity-60 text-2xl">TOTAL</p>
                        <p class="mb-0 font-sans font-sm leading-normal dark:text-white dark:opacity-60 text-sm">Ordenes de Trabajo Cerradas</p>
                        <x-porcen_ots_cerradas />
                        <p class="mb-0 dark:text-white dark:opacity-60">
                        <span class="font-bold leading-normal text-sm text-emerald-500">+55%</span>
                        since yesterday
                        </p>
                    </div>
                </div>
        </div>
        <div class="flex-none w-2/3 max-w-full px-3">
            <div>
                <p class="mb-0 font-sans font-bold leading-normal uppercase dark:text-white dark:opacity-60 text-2xl">TOTAL</p>
                <p class="mb-0 font-sans font-sm leading-normal dark:text-white dark:opacity-60 text-sm">Ordenes de Trabajo Cerradas</p>
                <x-porcen_ots_cerradas />
                <p class="mb-0 dark:text-white dark:opacity-60">
                <span class="font-bold leading-normal text-sm text-emerald-500">+55%</span>
                since yesterday
                </p>
                <p class="mb-0 font-sans font-bold leading-normal uppercase dark:text-white dark:opacity-60 text-2xl">TOTAL</p>
                <p class="mb-0 font-sans font-sm leading-normal dark:text-white dark:opacity-60 text-sm">Ordenes de Trabajo Cerradas</p>
                <x-porcen_ots_cerradas />
                <p class="mb-0 dark:text-white dark:opacity-60">
                <span class="font-bold leading-normal text-sm text-emerald-500">+55%</span>
                since yesterday
                </p>
            </div>
        </div>

    </div>
    
    

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script type="text/javascript">
        var da = @json($rrr);
        var t1 = @json($labels4);
        var t2 = @json($data4);
        // var da2 = @json($datosOts);
        console.log({{ $r }}, da);

        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['ene', 'f', 'm', 'a', 'm', 'j', 'f', 'm', 'a', 'm', 'j'],
                    datasets: [{
                        label: '# of Votes',
                        data: da,
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

        const labels = [
            'enero',
            'febrero',
            'marzo',
        ];

        const data = {
            // labels: t1,
            datasets: [{
                label: 'Nro. de Tikects',
                data: t2,
                backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgb(255, 245, 26)',
                'rgb(231,126,49)',
                'rgb(107,178,140)',
                'rgb(64,67,153)',

                ],
                hoverOffset: 4
            }]
            // datasets: [{
            //     label: 'My First dataset',
            //     backgroundColor: 'rgb(255, 99, 132)',
            //     borderColor: 'rgb(255, 99, 132)',
            //     data: [0, 10, 5, 2, 20, 30, 45],
            // }]
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

        const labelsBar = ['e','e','e','e','e','e','e'];
        const dataBar = {
        labels: labelsBar,
            datasets: [{
                label: 'My First Dataset',
                data: [65, 59, 80, 81, 56, 55, 40],
                backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
                ],
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
    </script>

</x-app-layout>

