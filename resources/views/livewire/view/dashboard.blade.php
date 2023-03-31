@php
use App\Models\Ot;
use App\Models\Tikect;
use App\Models\Estado;

/*
Logica para calcular el Nro. de Ots finalizadas por estado
GRAFICO DE DONA
GRAFICO Nro. 1
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

/*
Logica para calcular el porcentaje de inversion por cada estado
GRAFICO DE DONA
GRAFICO Nro. 2
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
GRAFICO DE DONA
GRAFICO Nro. 3
*/
$tikectList = Tikect::select(DB::raw("count(*) as tikects"), DB::raw("estado as estados"), DB::raw("color as colores"))
            ->orderBy('estados', 'asc')
            ->groupBy(DB::raw("estado, color"))
            ->get();
$colorTi = $tikectList->pluck('colores');
$estTi = $tikectList->pluck('estados');
$tikects = $tikectList->pluck('tikects');

@endphp
<x-app-layout>
    <div class="flex flex-wrap">
        {{-- Total Ots --}}
        <div class="w-full md:w-3/12 lg:w-6/12 xl:w-3/12 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                            <h5 class="text-blueGray-400 uppercase font-bold text-xs">Total<br>inversion($)</h5><x-inversion />
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                            <div class="text-white text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full ">
                                <img src="{{ asset('images/dolar.png') }}" class="w-36" alt="">
                                {{-- <i class="far fa-chart-bar"></i> --}}
                            </div>
                        </div>
                    </div>
                    <p class="text-sm text-blueGray-400 mt-4">
                        <x-porInver_ots_cerradas/>
                        <span class="whitespace-nowrap"></span></p>
                </div>
            </div>
        </div>
        {{-- Total Tickets --}}
        <div class="w-full md:w-3/12 lg:w-6/12 xl:w-3/12 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                            <h5 class="text-blueGray-400 uppercase font-bold text-xs">Total<br> tickets</h5>
                            <x-tikects_abiertos />
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                            <div class="text-white text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full ">
                                <img src="{{ asset('images/mantenimiento.png') }}" class="w-36" alt="">
                                {{-- <i class="far fa-chart-bar"></i> --}}
                            </div>
                        </div>
                    </div>
                    <p class="text-sm text-blueGray-400 mt-4">
                        <x-porcen_tikects_cerrados />
                        <span class="whitespace-nowrap"></span></p>
                </div>
            </div>
        </div>
        {{-- Ots Finalizadas --}}
        <div class="w-full md:w-3/12 lg:w-6/12 xl:w-3/12 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                            <h5 class="text-blueGray-400 uppercase font-bold text-xs">Ordenes de trabajo<br> finalizadas</h5>
                            <x-ots_finalizadas />
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                            <div class="text-white text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full ">
                                <img src="{{ asset('images/check_icon.png') }}" class="w-36" alt="">
                                {{-- <i class="far fa-chart-bar"></i> --}}
                            </div>
                        </div>
                    </div>
                    <p class="text-sm text-blueGray-400 mt-4">
                        <span class="text-orange-500 mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                        <span class="whitespace-nowrap"></span></p>
                </div>
            </div>
        </div>
        {{-- Ots en ejecucion --}}
        <div class="w-full md:w-3/12 lg:w-6/12 xl:w-3/12 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                            <h5 class="text-blueGray-400 uppercase font-bold text-xs">Orden de trabajo <br> en ejecucion</h5>
                            <x-total_ots_ejecucion />
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                            <div class="text-white text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full ">
                                <img src="{{ asset('images/ejecucion.png') }}" class="w-36" alt="">
                                {{-- <i class="far fa-chart-bar"></i> --}}
                            </div>
                        </div>
                    </div>
                    <p class="text-sm text-blueGray-400 mt-4">
                        <x-porcen_ots_ejecucion />
                        <span class="whitespace-nowrap"></span></p>
                </div>
            </div>
        </div>
    </div>

    {{-- prueba --}}
    <section class="bg-white dark:bg-gray-900">
        <div class=" px-5 py-10 mx-auto">
            <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-12 xl:gap-12 sm:grid-cols-3 xl:grid-cols-3 lg:grid-cols-3">
                <div class="w-full ">
                    <h1 class="w-full text-center px-8 py-4 rounded-lg dark:bg-gray-700">
                        Ordenes de trabajo finalizadas por estado
                    </h1>
                    <style>
                        .mobile{
                            padding-left: 0;
                            padding-right: 0;
                            margin-left: auto;
                            margin-right: auto;
                            margin-bottom: 10px;
                            display: block;
                            width: auto;
                        }
                        @media only screen and (max-width: 768px){
                                .mobile 
                                {
                                    padding-left: 0;
                                    padding-right: 0;
                                    margin-left: auto;
                                    margin-right: auto;
                                    margin-bottom: 10px;
                                    display: block;
                                    width: 80%;
                                    height: auto;
                                }
                        }
                        @media only screen and (max-width: 320px){
                                .mobile 
                                {
                                    padding-left: 0;
                                    padding-right: 0;
                                    margin-left: auto;
                                    margin-right: auto;
                                    margin-bottom: 10px;
                                    display: block;
                                    width: 80%;
                                    height: auto;
                                }
                        }
                    </style>
                    <div class="w-full shadow-[rgba(13,_38,_76,_0.19)_0px_9px_20px] border border-gray-200 rounded-lg dark:bg-gray-600 py-4">
                        <canvas id="myChart4" class="mobile"></canvas>
                    </div>
                    {{-- <button id="pdf" onclick="downloadPDF()">PDF</button> --}}
                    <div class="mx-auto mt-8 w-52 sm:w-auto px-4 divide-y">
                        @foreach($otsList as $item)
                        <div class="flex items-center">
                            <div class="w-3 h-3 mr-3 rounded-full" style="background-color:{{ $item->colores }}"></div>
                            <span class="text-xs">{{ $item->estados }}</span>
                            <span class="ml-auto text-xs">{{ $item->ots }}</span>
                        </div>
                        @endforeach
                    </div>
                    
                </div>
    
                <div class="w-full ">
                    <h1 class="w-full text-center px-8 py-4 rounded-lg dark:bg-gray-700">
                        Inversión por estados
                    </h1>
                    <div class="w-full shadow-[rgba(13,_38,_76,_0.19)_0px_9px_20px] border border-gray-200 rounded-lg dark:bg-gray-600 pt-4 pb-6">
                        <canvas id="myChart2" class="mobile"</canvas>
                    </div>
                    <div class="mx-auto mt-8 w-52 sm:w-auto px-4 divide-y">
                        @foreach($porList as $item)
                        <div class="flex items-center">
                            <div class="w-3 h-3 mr-3 rounded-full" style="background-color:{{ $item->colores }}"></div>
                            <span class="text-xs">{{ $item->estados }}</span>
                            <span class="ml-auto text-xs">{{ number_format($item->totales, 2, ',', '.') }}$ - {{ app('App\Http\Controllers\UtilsController')->porcenInverPorEstado($item->totales) }}%</span>
                        </div>
                        @endforeach
                    </div>
                </div>
    
                <div class="w-full ">
                    <h1 class="w-full text-center px-8 py-4 rounded-lg dark:bg-gray-700">
                        Tickets generados
                    </h1>
                    <div class="w-full shadow-[rgba(13,_38,_76,_0.19)_0px_9px_20px] border border-gray-200 rounded-lg dark:bg-gray-600 pt-4 pb-6">
                        <canvas id="chartDoughnut" class="mobile"></canvas>
                    </div>
                    <div class="mx-auto mt-8 w-52 sm:w-auto px-4 divide-y">
                        @foreach($tikectList as $item)
                        <div class="flex items-center">
                            <div class="w-3 h-3 mr-3 rounded-full" style="background-color:{{ $item->colores }}"></div>
                            <span class="text-xs">{{ $item->estados }}</span>
                            <span class="ml-auto text-xs">{{ $item->tikects }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    
        <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mb-4 mt-8">
            <div class="p-2 shadow-[rgba(13,_38,_76,_0.19)_0px_9px_20px] border border-gray-200  rounded-lg min-[420px]:w-full min-[420px]:mx-0 min-[420px]:p-4">
                {{-- Grafico de barras 2 --}}
                {{-- <p class=" mt-5 mb-0 font-sans font-bold leading-normal dark:text-white dark:opacity-60 text-2xl text-center">Ordenes de trabajo(Ots) vs Tickets cerrados por estado</p> --}}
                <canvas id="myChart5" style="padding: 4% 10%"></canvas>
            </div>
        </div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js" integrity="sha512-ml/QKfG3+Yes6TwOzQb7aCNtJF4PUyha6R3w8pSTo/VJSywl7ZreYvvtUso7fKevpsI+pYVVwnu82YO0q3V6eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

<script type="text/javascript">

        // **************************************Grafico de torta 1

        var estOts = @json($estOts);
        var ots = @json($ots);
        var colorOts = @json($colorOts);
        const dataTorta = {
            // labels: estOts,
            data: ots
            , datasets: [{
                label: 'Ots Cerradas'
                , data: ots
                , backgroundColor: colorOts
                , hoverOffset: 30
            }]
        };
       
        const configTorta = {
            type: 'pie',
            // plugins: [plugin], 
            data: dataTorta, 
            options: {
                // plugins:{
                //     datalabels:{
                //         formatter:((context, args) => {
                //             const index = args.dataIndex;
                //             // console.log(estOts)
                //             return estOts[index];
                //         })
                //     }
                // }

            },
            plugins: [ChartDataLabels]

        };
        new Chart(
            document.getElementById('myChart4')
            , configTorta
        );

        //************************************FIN GRAFICO DE TORTA


        // **************************************Grafico de DONA 2
        var estados = @json($estados);
        var valores = @json($valores);
        var colores = @json($colores);
        const data = {
            //labels: estados,
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
            document.getElementById('myChart2')
            , config
        );



        // **************************************Grafico de DONA 3
        var estTi = @json($estTi);
        var tikects = @json($tikects);
        var colorTi = @json($colorTi);
        const labelsBar = estTi;
        const dataDona = {
            labels: labelsBar
            , datasets: [{
                data: tikects
                , backgroundColor: colorTi
                , borderColor: colorTi
                , borderWidth: 1
            }]
        };
        const configBar = {
            type: 'doughnut', 
            data: dataDona,

        };
        new Chart(
            document.getElementById('myChart3')
            , configBar
        );





        // Grafico Unido
        var estadosUnion = @json($listaEstados);
        var tikectsUnion = @json($tikects);
        var colorTiUnion = @json($colorTi);
        const labelsEstados = estadosUnion;
        const dataUnion = {
            labels: ['Amazonas', 'Bolivar', 'Distrito Capital', 'Merida', 'Monagas', 'Trujillo']
            , datasets: [{
                type: 'bar'
                , label: 'Bar Dataset'
                , data: [5, 1, 2, 1, 8, 9]
                , borderColor: 'rgb(255, 99, 132)'
                , backgroundColor: 'rgba(255, 99, 132, 0.2)'
            }, {
                type: 'line'
                , label: 'Line Dataset'
                , data: [2, 1, 3, 1, 2, 7]
                , fill: false
                , borderColor: 'rgb(54, 162, 235)'
            }]
        };
        const configBarUnion = {
            type: 'scatter'
            , data: dataUnion
            , options: {
                plugins: {
                    title: {
                        display: true
                        , text: 'Custom Chart Title'
                    }
                }
                , scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        new Chart(
            document.getElementById('myChart5')
            , configBarUnion
        );








        //prueba
        var estTi = @json($estTi);
        var tikects = @json($tikects);
        var colorTi = @json($colorTi);
        const dataDoughnut = {
            datasets: [{
                label: "Total ticket"
                , data: tikects
                , backgroundColor: colorTi
                , hoverOffset: 4
            , }, ]
        , };

        const configDoughnut = {
            type: "doughnut"
            , data: dataDoughnut
            , options: {}
        , };

        var chartBar = new Chart(
            document.getElementById("chartDoughnut")
            , configDoughnut
        );

</script>
</x-app-layout>

