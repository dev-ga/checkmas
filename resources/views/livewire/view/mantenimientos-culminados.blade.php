<div class="p-5">
    <h1 class="text-xl mb-4">Memoria Fotográfica</h1>
    <div class="py-5 mt-4">
        <div class="flex justify-between">
            <input wire:model="buscar" type="search" name="buscar" class="border-b border-gray-200 py-2 text-sm rounded-full sm:w-1/3 md:w-1/4 shadow-lg focus:ring-check-blue focus:border-check-blue" placeholder="Buscar..." autocomplete="off">
        </div>
    </div>
    <div class="overflow-auto rounded-lg shadow hidden md:block">
        <table class="w-full">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <div class="flex items-center gap-x-3">
                            <img class="object-cover w-7 h-7 rounded-full" src="{{ asset('images/orden-de-trabajo.png') }}" alt="">
                            <button class="flex items-center gap-x-2">
                                <span>@lang('messages.tablas.ot')</span>
                                <svg class="h-3" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.13347 0.0999756H2.98516L5.01902 4.79058H3.86226L3.45549 3.79907H1.63772L1.24366 4.79058H0.0996094L2.13347 0.0999756ZM2.54025 1.46012L1.96822 2.92196H3.11227L2.54025 1.46012Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                    <path d="M0.722656 9.60832L3.09974 6.78633H0.811638V5.87109H4.35819V6.78633L2.01925 9.60832H4.43446V10.5617H0.722656V9.60832Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                    <path d="M8.45558 7.25664V7.40664H8.60558H9.66065C9.72481 7.40664 9.74667 7.42274 9.75141 7.42691C9.75148 7.42808 9.75146 7.42993 9.75116 7.43262C9.75001 7.44265 9.74458 7.46304 9.72525 7.49314C9.72522 7.4932 9.72518 7.49326 9.72514 7.49332L7.86959 10.3529L7.86924 10.3534C7.83227 10.4109 7.79863 10.418 7.78568 10.418C7.77272 10.418 7.73908 10.4109 7.70211 10.3534L7.70177 10.3529L5.84621 7.49332C5.84617 7.49325 5.84612 7.49318 5.84608 7.49311C5.82677 7.46302 5.82135 7.44264 5.8202 7.43262C5.81989 7.42993 5.81987 7.42808 5.81994 7.42691C5.82469 7.42274 5.84655 7.40664 5.91071 7.40664H6.96578H7.11578V7.25664V0.633865C7.11578 0.42434 7.29014 0.249976 7.49967 0.249976H8.07169C8.28121 0.249976 8.45558 0.42434 8.45558 0.633865V7.25664Z" fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                </svg>
                            </button>
                        </div>
                    </th>
                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        Ubicacion
                    </th>
                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        Fotos Antes
                    </th>
                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        Fotos Despues
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                @foreach ($data as $item)
                <tr>
                    {{-- Orden de trabajo --}}
                    <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap">
                        <div class="flex items-center gap-x-2 mr-8">
                            <img class="object-cover w-7 h-7 rounded-full" src="{{ asset('images/orden-de-trabajo.png') }}" alt="">
                            <div>
                                <h2 class="text-sm font-medium text-gray-800 dark:text-white ">{{ $item->nro_ot }}</h2>
                            </div>
                        </div>
                    </td>

                    {{-- Ubicacion --}}
                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                        <div class="flex items-center gap-x-2 mr-8">
                            <img class="object-cover w-7 h-7 rounded-full" src="{{ asset('images/admi.png') }}" alt="">
                            <div>
                                <h2 class="text-sm font-medium text-gray-800 dark:text-gray-400">Agencia: {{ $item->agencia }}</h2>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Estado: {{ $item->estado }}</p>
                            </div>
                        </div>
                    </td>

                    {{-- antes --}}
                    <td class="px-4 py-4 text-sm font-medium text-gray-700">
                        <div class="flex items-center gap-x-2">
                            <a class="p-2" href="{{ asset('/storage/'.$item->foto1_antes) }}" target="_blank">
                                <img src="{{ asset('/storage/'.$item->foto1_antes) }}" class="w-16 h-16" />
                            </a>
                            <a class="p-2" href="{{ asset('/storage/'.$item->foto2_antes) }}" target="_blank">
                                <img src="{{ asset('/storage/'.$item->foto2_antes) }}" class="w-16 h-16" />
                            </a>
                        </div>
                        
                    </td>

                    {{-- despues --}}
                    <td class="px-4 py-4 text-sm font-medium text-gray-700">
                        <div class="flex items-center gap-x-2">
                            <a class="p-2" href="{{ asset('/storage/'.$item->foto1_despues) }}" target="_blank">
                                <img src="{{ asset('/storage/'.$item->foto1_despues) }}" class="w-16 h-16" />
                            </a>
                            <a class="p-2" href="{{ asset('/storage/'.$item->foto2_despues) }}" target="_blank">
                                <img src="{{ asset('/storage/'.$item->foto2_despues) }}" class="w-16 h-16" />
                            </a>
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Div para la paginacion --}}
        <div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
            {{-- Paginacion --}}
            {{ $data->links('vendor.livewire.tailwind') }}
        </div>
        {{-- Fin Div paginacion --}}
    </div>
        {{-- Tabla Responsive para movil --}}
        <div class="grid grid-cols-1 sm:grid-cols-1 gap-4 md:hidden">
            @foreach ($data as $item)
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="mb-3">
                    <h2 class="text-sm font-bold text-gray-800 dark:text-white ">@lang('messages.tablas.nro') {{ $item->nro_ot }}</h2>
                </div>
                {{-- card imagenes --}}
                <div class="flex justify-between items-center gap-x-2">
                    <img class="object-cover w-7 h-7 rounded-full" src="{{ asset('images/orden-de-trabajo.png') }}" alt="">
                    <div>
                        <p class="text-xs font-normal text-gray-600 dark:text-gray-400">Agencia: {{ $item->agencia }}</p>
                        <p class="text-xs font-normal text-gray-600 dark:text-gray-400">Estado: {{ $item->estado }}</p>
                    </div>

                    <div>
                        <div class="flex items-center gap-x-1 justify-end">
                            <p class="text-xs font-normal text-gray-600 dark:text-gray-400">Antes</p>
                            <a class="p-2" href="{{ asset('/storage/'.$item->foto1_antes) }}" target="_blank">
                                <img src="{{ asset('/storage/'.$item->foto1_antes) }}" class="w-8 h-8" />
                            </a>
                            <a class="p-2" href="{{ asset('/storage/'.$item->foto2_antes) }}" target="_blank">
                                <img src="{{ asset('/storage/'.$item->foto2_antes) }}" class="w-8 h-8" />
                            </a>
                        </div>
                        <div class="flex items-center gap-x-1 justify-end">
                            <p class="text-xs font-normal text-gray-600 dark:text-gray-400">Despues</p>
                            <a class="p-2" href="{{ asset('/storage/'.$item->foto1_despues) }}" target="_blank">
                                <img src="{{ asset('/storage/'.$item->foto1_despues) }}" class="w-8 h-8" />
                            </a>
                            <a class="p-2" href="{{ asset('/storage/'.$item->foto2_despues) }}" target="_blank">
                                <img src="{{ asset('/storage/'.$item->foto2_despues) }}" class="w-8 h-8" />
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
            <div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
                {{-- Paginacion --}}
                {{ $data->links() }}
            </div>
        </div>
</div>

